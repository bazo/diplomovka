<?php
class SecurePresenter extends BasePresenter
{
  public function startup()
  {
    parent::startup();
	$user = Environment::getUser();
	if( !$user->isAllowed($this->module)){
		switch ($this->module) {
			case 'Default':
				$this->redirect('Select:Default');
			break;
			
			default:
				$this->redirect(":{$this->module}:Login:default");
			break;
		}
	}
        $this->template->user = $user->getIdentity();
        $this->template->semester = 'L';
  }
  
    public function handleLogout()
    {
        Environment::getUser()->signOut();
        $this->flashMessage('You have been logged off.');
        $this->redirect(':Default:Select:default');
    }

    public function createComponentMenu()
    {
        $navigation = new NavigationBuilder();
        $navigation->setTranslator(new Translator($this->lang));
        $navigation->template->presenter = $this;
        return $navigation;
    }
}
?>