<?php
class Teacher_CoursesPresenter extends Teacher_BasePresenter
{
	public function actionCourseDetails($course)
	{
		$course_id = $course;
		$course_details = $this->model('courses')->getCourse($course_id);
		$students = $this->model('courses')->getCourseStudents($course_id);
		dump($students);
		$this->template->course = $course_details;
		$this->template->students  = $students;
	}
}
?>