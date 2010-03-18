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
	 * Sets control's value.
	 * @param  string
	 * @return void
	 */
	public function setValue($value)
	{
                $date_time = new DateTime($value);
                $value = date('H:i', $date_time->getTimestamp());
		//$value = preg_replace('~([0-9]{4})-([0-9]{2})-([0-9]{2})~', '$3.$2.$1', $value);
		parent::setValue($value);
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