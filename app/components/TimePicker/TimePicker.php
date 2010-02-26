<?php
/**
 * DatePicker input control.
 *
 * @author     Martin Bazik
 * @copyright  Copyright (c) 2010
 * @license    New BSD License
 * @version    0.1
 */
class TimePicker extends /*Nette\Forms\*/TextInput
{

	/**
	 * @param  string  label
	 * @param  int  width of the control
	 * @param  int  maximum number of characters the user may enter
	 */
	public function __construct($label, $cols = NULL)
	{
		parent::__construct($label, $cols, 5);
	}

	/**
	 * Generates control's HTML element.
	 * @return Html
	 */
	public function getControl()
	{		
		$control = parent::getControl();
		$control->class = 'timepicker';
		
		return $control;
	}

}