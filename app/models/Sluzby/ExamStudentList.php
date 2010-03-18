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

    public function isStudentOnList($student_id)
    {
        $values = array(
          'student_id' => (int)$student_id,
          'exam_id' => (int)$this->exam_id
        );
        $row = db::select('COUNT(*) count')->from('students_exams')->where($values)->fetch();
        return (bool)$row->count;
    }

    public function isFull($max_students)
    {
        $row = db::select('COUNT(*) count')->from('students_exams')->where('exam_id = %i', (int)$this->exam_id)->fetch();
        return (int)$row->count == $max_students;
    }

    public function addStudent($student_id)
    {
        $values = array(
          'student_id' => (int)$student_id,
          'exam_id' => (int)$this->exam_id
        );
        db::insert('students_exams', $values)->execute();
    }

    public function removeStudent($student_id)
    {
        $values = array(
          'student_id' => (int)$student_id,
          'exam_id' => (int)$this->exam_id
        );
        //'student_id = %i and exam_id = %i', 
        db::delete('students_exams')->where($values)->execute();
    }
}
?>
