<?php
/**
 * Description of ExamTerms
 *
 * @author Martin
 */
class ExamTerms {
    
    public static function getTermsListOfTeacher($course_id, $teacher_id)
    {
       $rows = db::select('*')->from('exam_terms')->where('course_id = %i and teacher_id = %i', $course_id, $teacher_id)->fetchAll();
       return $rows;
    }

    public static function getTermsList($course_id)
    {
       $rows = db::select('*')->from('exam_terms')->where('course_id = %i', $course_id)->fetchAll();
       return $rows;
    }

    public static function add($values)
    {
        db::insert('exam_terms', $values)->execute();
    }
}
?>
