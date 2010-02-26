<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExamStudentListManager
 *
 * @author Martin
 */
class ExamStudentListManager {
    //put your code here
    /**
     * @param integer $term_id
     * @return ExamStudentList 
     */
    public static function getList($exam_id)
    {
        $exam_id = (int)$exam_id;
        $sql = db::select('students.*')->from('students_exams')->join('students')->on('students_exams.student_id = students.id')->where('students_exams.exam_id = %i', $exam_id);
        $rows = $sql->fetchAll();
        $list = new ExamStudentList();
        $list->dataSource = $sql->toDataSource();
        foreach($rows as $row)
        {
            $student = new Student();
            foreach($row as $key => $value)
            {
                $student->$key = $value;
            }
            $list->students[] = $student;
        }
        $list->exam_id = $exam_id;
        $list->student_count = count($list->students);
        return $list;
     }
}
?>
