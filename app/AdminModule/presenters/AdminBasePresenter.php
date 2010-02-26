<?php
class Admin_BasePresenter extends SecurePresenter
{
	protected $tables;
	
	public function createComponentMenu($name)
	{
		$navigation = parent::createComponentMenu($name);
		$navigation->add('Tables', $this->link('Tables:default'))
					->add('Assign', $this->link('Assign:assign'))
		           ->add('Settings', $this->link('Settings:default'));
		
		$tables = $this->model('tables')->getAllTables();
		foreach ($tables as $table) {
			$navigation->get('Tables')
                   ->add(String::capitalize($table), $this->link('Tables:', array('table' => $table)));
		}
		$navigation->get('Assign')->add('Teachers and courses',$this->link('Assign:TeachersAndCourses'))
								  ->add('Students and courses',$this->link('Assign:StudentsAndCourses'));
		return $navigation;
	}

        protected function model($model_name)
  {
    static $model_instances;
	$model_class = 'Admin_'.ucfirst($model_name).'Model';
	if (!isset($model_instances[$model_class]))
	{
		$model_instances[$model_name] = new $model_class();
	}
	return $model_instances[$model_name];
  }
}
?>