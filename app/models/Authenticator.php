<?php 
class Authenticator implements IAuthenticator
{
    public function authenticate(array $credentials)
    {
        $email = $credentials['username'];
        $password = $credentials['password'];
        $role = String::lower($credentials['extra']);


        switch ($role)
        {
            case 'student':
                $student = new Student();
                $student->email = $email;
                $student->password = $password;
                $student = StudentRegistry::verifyStudent($student);
                $student->courses = StudentRegistry::getStudentCourses($student);
                foreach ($student->courses as $course)
                {
                    $student->allowed_courses[] = (int)$course->id;
                }
                $identity = new Identity($student->id, $role, $student);
                $identity->student = $student;
            break;
            case 'teacher':
                $teacher = new Teacher();
                $teacher->email = $email;
                $teacher->password = $password;
                $teacher = TeacherRegistry::verifyTeacher($teacher);
                $teacher->courses = TeacherRegistry::getTeacherCourses($teacher);
                $identity = new Identity($teacher->id, $role, $teacher);
                $identity->teacher = $teacher;
            break;
            case 'admin':
                $identity = new Identity('admin', $role);
            break;
        }
        return $identity; // vrátíme identitu
    }
} 