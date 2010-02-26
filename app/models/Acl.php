<?php
class Acl extends Permission
{
	public function __construct() {
		
		$this->addRole('admin');
		$this->addRole('student');
		$this->addRole('teacher');
		$this->addRole('guest');
		
		$this->addResource('Student');
		$this->addResource('Teacher');
		$this->addResource('Admin');
		$this->addResource('Default');
		
		$this->allow('admin', 'Admin');
		$this->allow('student', 'Student');
		$this->allow('teacher', 'Teacher');
		$this->allow('guest', 'Default','Select');
		
		$this->allow('admin', 'Default');
		$this->allow('student', 'Default');
		$this->allow('teacher', 'Default');
		
	}
}