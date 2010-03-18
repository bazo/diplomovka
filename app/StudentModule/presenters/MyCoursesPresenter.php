<?php
/**
 * Description of MyCourses
 *
 * @author Martin
 */
class Student_MyCoursesPresenter extends Student_BasePresenter
{
    /**
     *
     * @var integer
     */
    private $exam_id, $course_id;
    
    public function actionDefault()
    {
        $this->template->courses = $this->student->courses;
    }

    public function actionListTerms($course_id, $course)
    {
        $course_id = (int)$course_id;
        $this->course_id = $course_id;
        if(!in_array($course_id, (array)$this->student->allowed_courses)) throw new BadRequestException("You're not allowedd to do this");
        $terms = ExamManager::getExamsList($course_id, $this->getUser()->id);
        $this->template->terms = $terms;
        $this->template->course = $course;
        $this->template->courses = $this->student->courses;
    }

    public function handleShowDetail($exam_id)
    {
        $exam_id = (int)$exam_id;
        $this->exam_id = $exam_id;
        $this->template->show_popup = true;
        $this->template->exam_id = $exam_id;
        $this->template->exam = ExamManager::getExam($exam_id);
        $examStudentList = ExamStudentListManager::getList($exam_id);
        $this->template->isStudentOnList = $examStudentList->isStudentOnList($this->student->id);
        $this->invalidateControl('popup');
    }

    public function handleApplyForExam($exam_id, $popup = true)
    {
        $exam_id = (int)$exam_id;
        $this->exam_id = $exam_id;
        $this->template->exam_id = $exam_id;
        $this->template->show_popup = $popup;
        $exam = ExamManager::getExam($exam_id);
        $examStudentList = ExamStudentListManager::getList($exam_id);
        if(!$examStudentList->isFull($exam->max_students))
        {
            $examStudentList->addStudent($this->student->id);
            $this->flashMessage('You have applied for this exam.', 'success');
        }
        else ($this->flashMessage('Exam is already full', 'warning'));
        $this->template->isStudentOnList = $examStudentList->isStudentOnList($this->student->id);
        if(!$this->isAjax()) $this->redirect('this',array('do' => 'showDetail', 'exam_id' => $exam_id));
        else
        {
            $terms = ExamManager::getExamsList($this->course_id, $this->student->id);
            $this->template->terms = $terms;
            if($popup == true)$this->invalidateControl('popup');
            $this->invalidateControl('terms');
            $this->invalidateControl('flash');
        }
    }

    public function handleCancelApplication($exam_id, $popup = true)
    {
        $exam_id = (int)$exam_id;
        $this->exam_id = $exam_id;
        $this->template->exam_id = $exam_id;
        $this->template->show_popup = $popup;
        $examStudentList = ExamStudentListManager::getList($exam_id);
        $examStudentList->removeStudent($this->student->id);
        $this->template->isStudentOnList = $examStudentList->isStudentOnList($this->student->id);
        if(!$this->isAjax()) $this->redirect('this',array('do' => 'showDetail', 'exam_id' => $exam_id));
        else
        {
            $terms = ExamManager::getExamsList($this->course_id, $this->student->id);
            $this->template->terms = $terms;
            if($popup == true)$this->invalidateControl('popup');
            $this->invalidateControl('terms');
            $this->flashMessage('You have canceled your application.', 'success');
            $this->invalidateControl('flash');
        }
    }

    public function createComponentStudentsGrid($name)
    {
        $grid = new DataGrid($this, $name);
        $examStudentList = ExamStudentListManager::getList($this->exam_id);
        $grid->bindDataTable($examStudentList->dataSource);
        $grid->addNumericColumn('id', 'Num');
        $pos = 0;
        $grid['id']->formatCallback[] = function($value, DibiRow $data) use(&$pos){
          return $pos = $pos + 1;
        };
        $grid->addColumn('name', 'Name');
        $grid['name']->formatCallback[] = function($value, DibiRow $data){
            return $data->surname.' '.$data->name;
        };
        return $grid;
    }
}
?>