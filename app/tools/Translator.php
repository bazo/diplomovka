<?php
class Translator implements ITranslator
{
	
	protected $dict;
	
	public function __construct($lang)
	{
		$this->lang = $lang;
		$this->dict = Dictionary::getDictionary($this->lang);
	}
	
	protected function inflexion($count)
	{
		$int = null;
		$inflexion = Dictionary::getInflexion($this->lang);
		$int = $inflexion->inflex($count);
		return $int;
	}
	
	protected function detectCase($msg)
	{
		if($msg == String::lower($msg)) return 'lower';
		if($msg == String::upper($msg)) return 'upper';
		if($msg == String::capitalize($msg)) return 'capitalize';
                if($msg == ucfirst($msg)) return 'firstUpper';
		return 'default';
	}
	
	public function translate($message, $count = NULL)
	{
		$case = $this->detectCase($message);
		$args = func_get_args();
		if ( is_string($count) ) {
			if(isset($args[2]) && is_numeric($args[2])) $count = $args[2];
		}
		$counter = $count;
		if (is_numeric($count)) $counter = $this->inflexion($count);
		$node = String::lower($message.$counter);
		if (isset($this->dict[$node])) {
			$message = $this->dict[$node];
		}
		else
		{
			$message = implode(' ', explode('_', $message));
		}
            if (count($args) > 1)
            {
                array_shift($args);
                $message = vsprintf($message, $args);
            }
                    if ($case == 'default') {
                            return $message;
                    }elseif($case == 'firstUpper')
                    {
                        return ucfirst($message);
                    }
                    else
                    return call_user_func(array('String', $case), $message);
	}
	
}