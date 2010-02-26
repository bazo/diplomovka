<?php
class Admin_TeachersModel
{
	
	private function _prepare() {
		dibi::addSubst('table', 'teachers');
		dibi::addSubst('assigned_courses', 'courses_teachers');
		dibi::addSubst('courses', 'courses');
	}
	
	public function getAll()
	{
		$this->_prepare();
		return db::select('*')->from('[:table:]')->fetchPairs('id', 'full_name');
	}
	
	public function getAssignedCourses($id)
	{
		$this->_prepare();
		return (array)db::select(':courses:.id as `course_id`')->select('CONCAT_WS( " - " ,:courses:.name,years.year) as `course_name`')->from(':assigned_courses:')->join('( courses , years)')
		->on('(:assigned_courses:.course_id = :courses:.id AND :courses:.year = years.id)')->where(':assigned_courses:.teacher_id = %i', $id)->fetchPairs('course_id', 'course_name');
	}
	
	public function getCoursesDetails($id)
	{
		$this->_prepare();
		return (array)db::select('*')->select('CONCAT_WS( " - " ,:courses:.name,:courses:.time) as `course_name`')->from(':assigned_courses:')->join(':courses:')
		->on(':assigned_courses:.course_id = :courses:.id ')->where(':assigned_courses:.teacher_id = %i', $id)->fetchAll();
	}
	
	public function removeCourse($teacher_id, $course_id)
	{
		$this->_prepare();
		db::delete(':assigned_courses:')->where('teacher_id = %i', $teacher_id)->and('course_id = %i', $course_id)->execute();
	}
	
	public function addCourse($teacher_id, $course_id)
	{
		$this->_prepare();
		$values = array('course_id' => (int)$course_id, 'teacher_id' => (int)$teacher_id);
		db::insert(':assigned_courses:', $values)->execute();
	}
	public function getteachersByYear($year) {
		$this->_prepare();
		return (array)db::select('*')->from(':table:')->where('year = %s', $year)->fetchPairs('id', 'full_name');
	}
	
	public function getTeacher($id)
	{
		$this->_prepare();
		return db::select('*')->from('[:table:]')->where('id =%i', $id)->fetch();
	}
		
	public function save($values)
	{
		$this->_prepare();
		$values['email'] = String::lower($values['name'].'.'.$values['surname'].'@fm.uniba.sk');
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