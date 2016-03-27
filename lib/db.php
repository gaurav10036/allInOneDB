<?php
/**
* @author: Gaurav Sirauthiya
* @version: 1.0.0
*/
class DB
{
	/*
	* @var mysql
	*/
	public $mysqli;
	/*
	* @function create mysql connection
	*/
	public function __construct()
	{
 		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if($mysqli->connect_error)
		{
			die('Connection failed: '.$mysqli->connect_error);
		}
		$this->mysqli = $mysqli;
	}
	/*
	* @function insert query
	*/
	public function insert($tablename,$data)
	{
		if(count($data>0))
		{
			$columns='';
			$values='';
			$query = "INSERT INTO $tablename (";
			foreach ($data as $key => $value) {
				$columns .= $key.",";
				$values .= "'".$value."',";
			}
			$columns = rtrim($columns,",");
			$values = rtrim($values,",");
			$query.=$columns.') VALUES ('. $values .')';
			$result = $this->mysqli->query($query);
			return $result;
		}
	}
	/*
	* @function select query
	*/
	public function select($tablename)
	{
		$query = "SELECT * FROM $tablename";
		$result = $this->mysqli->query($query);
		$total = array();
		while($row = $result->fetch_assoc())
		{
			$total[] = $row;
		}
		return $total;
	}
	/*
	* @function update query
	*/
	public function update($tablename,$data,$param)
	{
		if(count($data>0))
		{
			$columns='';
			$values='';
			$query = "UPDATE  $tablename SET ";
			foreach ($data as $key => $value) {
				$query.= $key .' = '. "'".$value."'".', ';
			}
			$query = rtrim($query,", ");
			$query.=" WHERE ";
			foreach ($param as $key => $value) {
				$query.= $key .' = '. "'".$value."'".', ';
			}
			$query = rtrim($query,', ');
			$result = $this->mysqli->query($query);
			return $result;
		}		
	}
	/*
	* @function delete query
	*/
	public function delete($tablename,$data)
	{
		$query = "DELETE FROM $tablename WHERE ";
		foreach ($data as $key => $value) {
			$query.= $key .' = '. "'".$value."'".', ';		
		}
		$query = rtrim($query,", ");
		$result = $this->mysqli->query($query);
		return $result;
	}
}
