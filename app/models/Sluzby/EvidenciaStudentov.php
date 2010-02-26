<?php
/**
 * Description of EvidenciaStudentov
 *
 * @author Martin
 */
class EvidenciaStudentov
{
    public static function verifyStudent(Student $student)
    {
        $row = db::select('*')->from('students')->where('email = %s', $student->email)->fetch();
        if(!$row) throw new AuthenticationException('Teacher is not registered.');
        else
        {
            foreach ($row as $key => $value) {
                if(is_numeric($value)) $value = (int)$value;
                $student->$key = $value;
            }
            return $student;
        }
    }

    public static function getStudentCourses(Student $student)
    {
        return db::select('courses.id, courses.name, years.year, courses.semester')->from('courses_students')->join('(courses, years)')->on('courses.id = courses_students.course_id and years.id = courses.year')
                       ->where('courses_students.student_id = %i', $student->id)->fetchAll();
    }

    public static function studentDetails($student_id)
    {
        
    }
}
?>
