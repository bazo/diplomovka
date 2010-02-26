<?php
class Admin_AssignPresenter extends Admin_BasePresenter
{
	/** @persistent */
	public $year;
	/** @persistent */
	public $student_id; 
	/** @persistent */
	public $teacher_id; 
	
	public function actionTeachersAndCourses()
	{
		$this->view = 'assign_courses_teachers';
	}
	
	public function actionStudentsAndCourses()
	{
		$this->view = 'assign_courses_students';
	}

        public function createComponentFormYearSelect($name)
	{
		$form = new LiveForm($this, $name);
		$years = $this->model('courses')->getYears();
		$y = array('Choose a year');
		$years = array_merge($y, $years);
		$form->addSelect('year', 'year', $years)->skipFirst()->addCondition(FORM::FILLED);
		$form->addSubmit('btn_submit', 'Select');
		$form->onSubmit[] = array($this, 'formYearSelectSubmitted');
		$year = $this->year;
		if ($year != null) {
			$form->setDefaults(array('year' => $year));
		}
		return $form;
	}

	public function formYearSelectSubmitted($form)
	{
		$values = $form->getValues();
		$this->year = $values['year'];
		if($this->isAjax())
		{
			$this->invalidateControl('flash');
			$this->invalidateControl('form');
		}
		else $this->redirect($this->backlink());
	}

	public function createComponentFormStudentChooser()
	{
		$year = $this->year;
		$entities = $this->model('students')->getStudentsByYear($year);
		$entities = array_merge(array('Choose a student'), $entities);
		$student_id = $this->student_id;
		$form = new LiveForm();
		$form->addProtection();
		$form->addHidden('year')->setValue($year);
		$form->addSelect('student_id', 'student', $entities)->skipFirst()->addCondition(FORM::FILLED);
		$form->addSubmit('btnSubmit', 'OK');
		$form->onSubmit[] = array($this, 'formStudentChooserSubmitted');
		$form->setDefaults( array('year'=> $year, 'student_id' => $student_id) );
		return $form;
	}
	
	public function formStudentChooserSubmitted($form)
	{
		$values = $form->getValues();
		$year = $this->year;
		$this->student_id = $values['student_id'];
		if($this->isAjax()) 
		{
			$this->invalidateControl('flash');
			$this->invalidateControl('form');
		}
		else $this->redirect($this->backlink());
	}
	
	public function createComponentFormStudentsCourses($name)
	{
		$year = $this->year;
		$student_id = $this->student_id;
		if($student_id != null) $assigned_courses = $this->model('students')->getAssignedCourses($student_id);
		else $assigned_courses = array();
		
		$form = new LiveForm();
		$form->addProtection();
		$form->addHidden('year')->setValue($year);
		$form->addHidden('student_id')->setValue($student_id);
		$form->addSelect('course_id', 'Assigned courses', $assigned_courses, 10);
		$form->addSubmit('btnSubmitRemove', 'Remove');
		$form->onSubmit[] = array($this, 'removeCourseFromStudent');
		
		return $form;
	}
	
	public function createComponentCoursesForm()
	{
		$year = $this->year;
                if($this->teacher_id !== null)
                    $courses = $this->model('courses')->getCoursesByYearAndTeacher($year, $this->teacher_id);
                else $courses = $this->model('courses')->getCoursesByYear($year);
		$form = new LiveForm();
		$form->addHidden('year')->setValue($year);
		$form->addSelect('course_id', 'Available courses', $courses, 10);
		$form->addSubmit('btnSubmit', 'Add');
		if($this->getAction() == 'studentsAndCourses')
		{
			$student_id = $this->student_id;
			$form->addHidden('student_id')->setValue($student_id);
			$form->onSubmit[] = array($this, 'addCourseToStudent');
		}
		if($this->getAction() == 'teachersAndCourses')
		{
			$teacher_id = $this->teacher_id;
			$form->addHidden('teacher_id')->setValue($teacher_id);
			$form->onSubmit[] = array($this, 'addCourseToTeacher');
		}
		return $form;
	}
	
	public function addCourseToStudent($form)
	{
		$values = $form->getValues();
		$student_id = $values['student_id'];
		$course_id = $values['course_id'];
		try{
			$this->model('students')->addCourse($student_id, $course_id);
		}
		catch(Exception $e)
		{
			$this->flashMessage('Course already added');
		}
		if($this->isAjax()) 
		{
			$this->invalidateControl('flash');
			$this->invalidateControl('form');
		}
		else $this->redirect($this->backlink());
	}
	
	public function removeCourseFromStudent($form)
	{
		$values = $form->getValues();
		$course_id = $values['course_id'];
		$student_id = $values['student_id'];
		$this->model('students')->removeCourse($student_id, $course_id);
		if($this->isAjax()) 
		{
			$this->invalidateControl('flash');
			$this->invalidateControl('form');
		}
		else $this->redirect($this->backlink());
	}
	
	public function createComponentFormTeacherChooser()
	{
		$entities = $this->model('teachers')->getAll();
		$entities = array_merge(array('Choose a teacher'), $entities);
		$teacher_id = $this->teacher_id;
		$form = new LiveForm();
		$form->addProtection();
		$form->addSelect('teacher_id', 'teacher', $entities)->skipFirst()->addCondition(FORM::FILLED);
		$form->addSubmit('btnSubmit', 'OK');
		$form->onSubmit[] = array($this, 'formTeacherChooserSubmitted');
		$form->setDefaults( array('teacher_id' => $teacher_id) );
		return $form;
	}
	
	public function formTeacherChooserSubmitted($form)
	{
		$values = $form->getValues();
		$year = $this->year;
		$this->teacher_id = $values['teacher_id'];
		if($this->isAjax()) 
		{
			$this->invalidateControl('flash');
			$this->invalidateControl('form');
		}
		else $this->redirect($this->backlink());
	}
	
	public function createComponentFormTeachersCourses($name)
	{
		$teacher_id = $this->teacher_id;
		if($teacher_id != null) $assigned_courses = $this->model('teachers')->getAssignedCourses($teacher_id);
		else $assigned_courses = array();
		
		$form = new LiveForm();
		$form->addProtection();
		$form->addHidden('teacher_id')->setValue($teacher_id);
		$form->addSelect('course_id', 'Assigned courses', $assigned_courses, 10);
		$form->addSubmit('btnSubmitRemove', 'Remove');
		$form->onSubmit[] = array($this, 'removeCourseFromTeacher');
		
		return $form;
	}
	
	public function addCourseToTeacher($form)
	{
		$values = $form->getValues();
		$teacher_id = $values['teacher_id'];
		$course_id = $values['course_id'];
		try{
			$this->model('teachers')->addCourse($teacher_id, $course_id);
		}
		catch(Exception $e)
		{
			$this->flashMessage('Course already added');
		}
		if($this->isAjax()) 
		{
			$this->invalidateControl('flash');
			$this->invalidateControl('form');
		}
		else $this->redirect($this->backlink());
	}
	
	public function removeCourseFromTeacher($form)
	{
		$values = $form->getValues();
		$course_id = $values['course_id'];
		$teacher_id = $values['teacher_id'];
		$this->model('teachers')->removeCourse($teacher_id, $course_id);
		if($this->isAjax()) 
		{
			$this->invalidateControl('flash');
			$this->invalidateControl('form');
		}
		else $this->redirect($this->backlink());
	}
}
?>