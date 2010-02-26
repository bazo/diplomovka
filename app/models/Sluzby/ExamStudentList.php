<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExamStudentList
 *
 * @author Martin
 */
class ExamStudentList {

    /**
     * 
     * @var ArrayList of @var Student
     */
    public $students;
    public $exam_id, $student_count;
    /**
     *
     * @var DibiDataSource
     */
    public $dataSource;

    public function  __construct()
    {
        $this->students = new ArrayList();
    }

    public function addStudent($student_id)
    {
        $values = array(
          'student_id' => (int)$student_id,
          'exam_id' => (int)$this->exam_id
        );
        db::insert('students_exams', $values)->execute();
    }
}
?>
