<?php
class BasePresenter extends Presenter
{
  /** @persistent */
  public $lang;
  protected $module;
  protected $translator;
  
  public function startup()
  {
    //$this->oldLayoutMode = false;
    //$this->oldModuleMode = false;
    parent::startup();
    $application = Environment::getApplication();
    if (!isset($this->lang))
    {
      $this->lang = $this->getHttpRequest()->detectLanguage(array('en','sk'));
      $this->canonicalize();
    }
	$this->translator = new Translator($this->lang);
	$this->template->setTranslator($this->translator);
	
	$modul = explode(':', $this->getName());
	$this->module = $modul[0];
	$this->template->module = $this->module;
  }

  public function handleClosePopup()
  {
      $this->template->show_popup = false;
      $this->invalidateControl('popup');
      if(!$this->isAjax() ) $this->redirect('this');
  }

  protected function model($model_name)
  {
    static $model_instances;
	$model_class = ucfirst($model_name).'Model';
	if (!isset($model_instances[$model_class])) 
	{
		$model_instances[$model_name] = new $model_class();
	}
	return $model_instances[$model_name];
  }
}
?>