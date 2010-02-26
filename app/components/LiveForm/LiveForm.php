<?php
class LiveForm extends AppForm
{
  public function __construct(IComponentContainer $parent = null, $name = null)
  {
    parent::__construct($parent, $name);
    $script = new LiveClientScript($this);	$this->setTranslator(new Translator(Environment::getApplication()->getPresenter()->lang));
    $this->getRenderer()->setClientScript($script);
  }
}
?>