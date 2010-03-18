<?php
class Teacher_BasePresenter extends SecurePresenter
{
        /** @var Identity */
	protected $teacher;

	public function startup()
	{
		parent::startup();
		$this->teacher = Environment::getUser()->getIdentity();
	}

	public function createComponentMenu()
	{
		$navigation = parent::createComponentMenu();
					
		$navigation->add('Dashboard', $this->link('Default:default'))
		           /*->add('Courses', $this->link('Courses:default'))*/
                           ->add('Exam terms', $this->link('ExamTerms:default'));

                /*
		foreach ($this->teacher->courses as $course) {
			$navigation->get('Courses')->add($course->name, $this->link('Courses:courseDetails', array('course' => $course->id)));
		}
                 
                 */
		return $navigation;
	}
}
?>