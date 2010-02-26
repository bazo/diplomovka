<?php
class Admin_SchoolModel
{
	private function _prepareDepartments() {
		db::connect();
		dibi::addSubst('table', 'departments');
	}
	
	private function _prepareRooms() {
		db::connect();
		dibi::addSubst('table', 'rooms');
	}
	
	private function _prepareLearningTimes() {
		db::connect();
		dibi::addSubst('table', 'learning_times');
	}
	
	public function getDepartments() 
	{
		$this->_prepareDepartments();
		return db::select('*')->from(':table:')->fetchPairs('id', 'name');
	}
	
	public function getRooms() 
	{
		$this->_prepareRooms();
		return db::select('*')->from(':table:')->fetchPairs();
	}
	
	public function getLearningTimes() 
	{
		$this->_prepareLearningTimes();
		return db::select('*')->from(':table:')->orderBy('id')->fetchPairs();
	}
	
	public function getLearningTime($id) 
	{
		$this->_prepareLearningTimes();
		return db::select('*')->from(':table:')->where('id = %i', $id)->fetch();
	}
	
	public function saveNewDepartment($values) 
	{
		$this->_prepareDepartments();
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
	
	public function saveNewRoom($values) 
	{
		$this->_prepareRooms();
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
	
	public function saveNewLearningTime($values) 
	{
		$this->_prepareLearningTimes();
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