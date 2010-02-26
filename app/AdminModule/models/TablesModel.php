<?php
class Admin_TablesModel
{
	/*
	public function getAllTables()
	{
		$sql = 'SHOW TABLES';
		$result = db::query($sql)->fetchAll();
		foreach ($result as $index => $table) {
			$table = (array)$table;
			
			sort($table);
			$result[$index]['name'] = $table[0];
		}
		return $result;
	}
	*/
	public function getAllTables()
	{
		$tables = array(
			'students', 'teachers', 'courses', 'learning_times', 'rooms', 'departments'
		);
		return $tables;
	}
	
	
	public function getTableDS($table)
	{
		$sql = 'SELECT * FROM '.$table.' ORDER BY id';
		db::connect();

    	$result = db::dataSource($sql);

    	return $result;
	}
}
?>