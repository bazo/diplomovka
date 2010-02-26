<?php
/**
 * DatePicker input control.
 *
 * @author     Martin Bazik
 * @copyright  Copyright (c) 2010
 * @license    New BSD License
 * @version    0.1
 */
class NumericUpDown extends /*Nette\Forms\*/TextInput
{

	/**
	 * @param  string  label
	 * @param  int  width of the control
	 * @param  int  maximum number of characters the user may enter
	 */
	public function __construct($label, $cols = NULL, $maxLenght = NULL)
	{
		parent::__construct($label, $cols, $maxLenght);
	}


	/**
	 * Generates control's HTML element.
	 * @return Html
         * <span id="ns" class="ui-stepper">
	<input type="text" name="ns_textbox" size="2" autocomplete="off" class="ui-stepper-textbox" />
	<button type="submit" name="ns_button_1" class="ui-stepper-plus">+</button>
	<button type="submit" name="ns_button_2" class="ui-stepper-minus">-</button>
</span>

	 */
	public function getControl()
	{		
		$control = parent::getControl();
                $updown = Html::el('span')->class('ui-stepper')->add($control)->add(Html::el('input')->type('button')->class('ui-stepper-plus'))
                                        ->add(Html::el('button')->class('ui-stepper-minus'));
;
		//$control->class = 'numericUpDown';
		
		return $updown;
	}

}