<?php
class Student_BasePresenter extends SecurePresenter
{
        /** @var Identity */
	protected $student;

	public function startup()
	{
		parent::startup();
		$this->student = Environment::getUser()->getIdentity();
	}
	public function createComponentMenu()
	{
		$navigation = parent::createComponentMenu();
					
		$navigation->add('Dashboard', $this->link('Default:default'));
		$navigation->add('My courses', $this->link('MyCourses:default'));
		return $navigation;
	}
}
?>