<?php
class Admin_CoursesModel
{
	private function _prepare() {
		dibi::addSubst('table', 'courses');
		dibi::addSubst('students', 'students');
		dibi::addSubst('courses_students', 'courses_students');
	}
	
	public function getAll()
	{
		$sql = 'SELECT id, name FROM [courses]';
		$result = db::query($sql)->fetchPairs('id', 'name');
		return $result;
	}
	
	public function getCoursesByYearAndTeacher($year, $teacher_id)
	{
                $department_id = (int)db::select('*')->from('teachers')->where('id = %i', $teacher_id)->fetch()->department;
		$this->_prepare();
		return db::select('*')->from(':table:')->where('year = %i and department = %i', $year, $department_id)->fetchPairs('id', 'name');
	}

        public function getCoursesByYear($year)
	{
		$this->_prepare();
		return db::select('*')->from(':table:')->where('year = %i', $year)->fetchPairs('id', 'name');
	}
	
	public function getYears()
	{
            return db::select('*')->from('years')->fetchPairs('id', 'year');
	}
	
	public function getCourse($id)
	{
		$this->_prepare();
		return db::select('*')->from('[:table:]')->where('id =%i', $id)->fetch();
	}
	
	public function getCourseStudents($course_id)
	{
		$this->_prepare();
		return db::select('*')->from('[:courses_students:]')->join(':students:')->on(':students:.id = :courses_students:.student_id')->where('course_id =%i', $course_id)->fetchAll();
	}
	
	public function save($values)
	{
		$this->_prepare();
		if (isset($values['id'])) {
			$id = $values['id'];
			unset($values['id']);
			db::update(':table:', $values)
        	->where('id = %i', $id)
        	->execute();
		}
		else
		{
			$sql = 'INSERT INTO [:table:]';
			$result = db::query($sql, $values);
		}
	}
}
?>