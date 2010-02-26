<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EvidenciaVyucujucich
 *
 * @author Martin
 */
class EvidenciaVyucujucich
{
    public static function verifyTeacher(Teacher $teacher)
    {
        $row = db::select('*')->from('teachers')->where('email = %s', $teacher->email)->fetch();
        if(!$row) throw new AuthenticationException('Teacher is not registered.');
        else
        {
            foreach ($row as $key => $value) {
                if(is_numeric($value)) $value = (int)$value;
                $teacher->$key = $value;
            }
            return $teacher;
        }
    }

    public static function getTeacherCourses(Teacher $teacher)
    {
        return db::select('courses.id, courses.name, years.year, courses.semester')->from('courses_teachers')->join('(courses, years)')->on('courses.id = courses_teachers.course_id and years.id = courses.year')
                       ->where('courses_teachers.teacher_id = %i', $teacher->id)->fetchAll();
    }
}
?>
