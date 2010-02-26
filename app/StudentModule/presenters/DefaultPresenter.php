<?php
class Student_DefaultPresenter extends Student_BasePresenter
{
    public function actionDefault()
    {

    }

    public function createComponentStudentsGrid($name)
    {
        $grid = new DataGrid($this, $name);
        $examStudentList = ExamStudentListManager::getList(2);
        $grid->bindDataTable($examStudentList->dataSource);
        return $grid;
    }
}
?>