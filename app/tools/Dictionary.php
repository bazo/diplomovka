<?php
class Dictionary
{
	private static $objects = array();
	
	public static function getDictionary($lang)
	{
		$class = 'Dictionary_'.$lang;
		if (isset(self::$objects[$class])) {
			$dict = self::$objects[$class];
		}
		else 
		{
			$class = new $class();
			$dict = call_user_func(array($class, 'getDictionary'));
		}
		return $dict;
	}
    
    public static function getInflexion($lang)
    {
        $class = 'Inflexion_'.$lang;
        if (isset(self::$objects[$class])) {
            $dict = self::$objects[$class];
        }
        else 
        {
            self::$objects[$class] = new $class(); 
            
        }
        return self::$objects[$class];
    }
}