<?php
class LiveForm extends AppForm
{
  public function __construct(IComponentContainer $parent = null, $name = null)
  {
    parent::__construct($parent, $name);
    $script = new LiveClientScript($this);
    $this->getRenderer()->setClientScript($script);
  }
}
?>