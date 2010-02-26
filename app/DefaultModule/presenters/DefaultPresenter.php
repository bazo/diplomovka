<?php
class Default_DefaultPresenter extends SecurePresenter
{
	public function startup()
	{
		parent::startup();
		$user = Environment::getUser();
		if( $user->isAuthenticated()){
			$roles = Environment::getUser()->getIdentity()->getRoles();
			$role = $roles[0];
			$this->redirect(":$role:Default:default");
		}
			
	}
}
?>