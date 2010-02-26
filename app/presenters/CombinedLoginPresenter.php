<?php
class CombinedLoginPresenter extends BasePresenter
{
	public function renderDefault()
	{
		$this->setView('../../../templates/login');
	}
	
	public function createComponentFormLogin()
	{
            $form = new LiveForm();
            $renderer = $form->getRenderer();
            $form->getElementPrototype()->id = 'formLogin';
            $form->addText('email', 'E-mail')->addRule(Form::FILLED, 'Fill username');
            $form->addPassword('password', 'Password')->addRule(Form::FILLED, 'Fill password');

            $form->addSubmit('btn_login', _('Login'));
            $form['btn_login']->getControlPrototype()->class('bt_login');
            $form->onSubmit[] = array($this, 'formLoginSubmitted');
            return $form;
	}
	
	public function formLoginSubmitted($form)
	{
		$modul = explode(':', $this->getName());
		$module = $modul[0];
		$user = Environment::getUser();
		$user->setAuthenticationHandler(new Authenticator);
		$values = $form->getValues();
		if ($form->isValid()) {
			$email = $values['email'];
			$password = $values['password'];
			try{
				$user->authenticate($email, $password, $module);
				$user->setExpiration('+ 30 minutes');
				$this->redirect(":$module:default:default");
			}
			catch (AuthenticationException $e) {
				$this->flashMessage('Error: '. $e->getMessage());
			}
		}
	}
}
