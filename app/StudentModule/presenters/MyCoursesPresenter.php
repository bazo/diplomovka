<?php
/* 
 * 
 * 
 */

/**
 * Description of MyCourses
 *
 * @author Martin
 */
class Student_MyCoursesPresenter extends Student_BasePresenter
{
    /**
     *
     * @var ExamStudentList
     */
    private $exam_id;

    public function actionDefault()
    {
        $this->template->courses = $this->student->courses;
    }

    public function actionListTerms($course_id, $course)
    {
        $course_id = (int)$course_id;
        if(!in_array($course_id, (array)$this->student->allowed_courses)) throw new BadRequestException("You're not allowedd to do this");
        $terms = ExamTerms::getTermsList($course_id, null);
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
    }

    public function handleApplyForExam($exam_id)
    {
        $exam_id = (int)$exam_id;
        $this->exam_id = $exam_id;
        $this->template->exam_id = $exam_id;
        $this->template->show_popup = true;
        $examStudentList = ExamStudentListManager::getList($exam_id);
        $examStudentList->addStudent($this->student->id);
        $this->redirect('this',array('do' => 'showDetail', 'exam_id' => $exam_id));
    }

    public function createComponentStudentsGrid($name)
    {
        $grid = new DataGrid($this, $name);
        $examStudentList = ExamStudentListManager::getList($this->exam_id);
        $grid->bindDataTable($examStudentList->dataSource);
        return $grid;
    }

    public function createComponentForm($name)
    {
        $form = new AppForm();
        $form->addText('dd','dd');
        return $form;
    }
}
?>