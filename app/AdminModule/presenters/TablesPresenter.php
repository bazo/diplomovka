<?php
class Admin_TablesPresenter extends Admin_BasePresenter
{
	private $table;
	/** @persistent */
	public $year, $student_id; 
	
	public function beforeRender()
	{
		$this->template->tables = $this->model('tables')->getAllTables();
	}
	
	public function actionDefault($table = null)
	{
		$this->template->selected_table = $table;
		$this->view = 'tables';
		$this->table = $table;
		$session = Environment::getSession();
		$namespace = $session->getNamespace('table');
		$namespace->table = $this->table;
	}
	
	public function createComponentGrid()
	{
		$grid = new DataGrid;
                $ds = $this->model('tables')->getTableDS($this->table);
                $grid->bindDataTable($ds);
		
		$grid->keyName = 'id';

		// přidáme sloupec pro akce
		$grid->addActionColumn('Actions');
		
		// a naplníme datagrid akcemi pomocí továrničky
		$grid->addAction('Edit', 'editEntry', null, $useAjax = TRUE);
		$grid->addAction('Delete', 'deleteEntry', null, $useAjax = TRUE);
        return $grid;
	}
	
	public function actionAddEntry($table)
	{
		$this->template->editForm = $this->createComponentEditForm($table);
		
	}
	
	public function actionEditEntry($id)
	{
		$session = Environment::getSession();
		$namespace = $session->getNamespace('table');
		$table = $namespace->table;
		$this->template->editForm = $this->createComponentEditForm($table, $id);
		$this->view = 'AddEntry';
		
	}
	
	public function actionDeleteEntry($id)
	{
		$session = Environment::getSession();
		$namespace = $session->getNamespace('table');
		$table = $namespace->table;		
	}
	
	public function createComponentEditForm($table, $id = null)
	{
		$form = new AppForm($this, $table.'EditForm');
		$form->addProtection();
		if ($id != null) {
			$form->addHidden('id')->setValue($id);
		}
		switch ($table) {
			case 'students':
				$years = $this->model('courses')->getYears();
				$form->addText('name', 'Name');
				$form->addText('surname','Surname');
				$form->addSelect('year', 'year'.':', $years);
				if ($id != null) $values = $this->model('students')->getStudent($id);
			break;
			
			case 'teachers':
				$departments = $this->model('school')->getDepartments();
				$form->addText('name', 'Name');
				$form->addText('surname','Surname');
				$form->addSelect('department', 'department'.':')->setItems($departments, false);
				if ($id != null) $values = $this->model('teachers')->getTeacher($id);
			break;
			
			case 'rooms':
				$form->addText('name', 'Name');
				if ($id != null) $values = $this->model('school')->getRoom($id);
			break;
			case 'departments':
				$form->addText('name', 'Name');
				if ($id != null) $values = $this->model('school')->getDepartment($id);
			break;
			case 'learning_times':
				$form->addText('time', 'time');
				if ($id != null) $values = $this->model('school')->getLearningTime($id);
			break;
			case 'courses':
				$years = $this->model('courses')->getYears();
				$departments = $this->model('school')->getDepartments();
				$form->addText('name','name');
				$form->addSelect('year', 'year:', $years);
				$form->addSelect('semester', 'semester:', array('L' => 'L', 'Z' => 'Z'));

                                $form->addSelect('department', 'department:', $departments);
				if ($id != null) $values = $this->model('courses')->getCourse($id);
			break;
		}
		$form->addSubmit('btnSubmit','Save');
		$form->onSubmit[] = array($this, 'editFormSubmitted');
		if (isset($values)) $form->setDefaults($values);
		return $form;
	}
	
	public function editFormSubmitted($form) {
		$func = 'save';
		switch ($form->name) {
			case 'studentsEditForm':
				$model = 'students';
			break;
			
			case 'teachersEditForm':
				$model = 'teachers';
			break;
			
			case 'coursesEditForm':
				$model = 'courses';
			break;
			
			case 'roomsEditForm':
				$model = 'school';
				$func = 'saveNewRoom';
			break;
			
			case 'departmentsEditForm':
				$model = 'school';
				$func = 'saveNewDepartment';
			break;
			
			case 'learning_timesEditForm':
				$model = 'school';
				$func = 'saveNewLearningTime';
			break;
		}
		$values = $form->getValues();
		$this->model($model)->$func($values);
		$namespace = Environment::getSession()->getNamespace('table');
		$table = $namespace->table;
		unset($namespace->table);
		$this->redirect('default', array('table' => $table));
	}
}
?>