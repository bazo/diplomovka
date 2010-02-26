<?php
class Admin_StudentsModel
{
	public function getAll()
	{
		return array();
	}
	private function _prepare() {
		db::connect();
		dibi::addSubst('table', 'students');
		dibi::addSubst('courses_students', 'courses_students');
		dibi::addSubst('courses', 'courses');
	}
	
	public function removeCourse($student_id, $course_id)
	{
		$this->_prepare();
		$sql = 'DELETE FROM `courses_students` WHERE student_id = %i AND course_id = %i';
		db::query($sql,$student_id, $course_id );
		//db::delete(':courses_students:')->where('student_id = %i', $student_id)->and('course_id = %i', $course_id)->execute();
	}
	
	public function addCourse($student_id, $course_id)
	{
		$this->_prepare();
		$values = array('course_id' => (int)$course_id, 'student_id' => (int)$student_id);
		db::insert(':courses_students:', $values)->execute();
	}
	public function getStudentsByYear($year) {
		$this->_prepare();
		return (array)db::select('*')->from(':table:')->where('year = %s', $year)->fetchPairs('id', 'full_name');
	}
	
	public function getAssignedCourses($id)
	{
		$this->_prepare();
		return (array)db::select(':courses:.id as `course_id`')->select('CONCAT_WS( " - " ,:courses:.name,:courses:.time) as `course_name`')->from(':courses_students:')->join(':courses:')
		->on(':courses_students:.course_id = :courses:.id ')->where(':courses_students:.student_id = %i', $id)->fetchPairs('course_id', 'course_name');
	}
	
	public function getStudent($id)
	{
		$this->_prepare();
		return db::select('*')->from('[:table:]')->where('id =', $id)->fetch();
	}
	
	public function save($values)
	{
		$this->_prepare();
		$values['email'] = String::lower($values['name'].'.'.$values['surname'].'@st.fm.uniba.sk');
		if (!isset($values['id'])) $values['password'] = String::lower($values['name'].$values['surname']);
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