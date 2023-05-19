<?php

class DataBase
{
	const TINYINT   = '255';
	const SMALLINT  = '65535';
	const MEDIUMINT = '16777215';
	const INT       = '4294967295';
	const BIGINT    = '18446744073709551615';

	private $hostName;
	private $dbName;
	private $userName;
	private $password;

	private $o_mysqli;

	//----------------------------------------------------------------------------------------------
	public function __construct($p_hostName=false, $p_dbName=false, $p_userName=false, $p_password=false)
	{
		$this->set('hostName', $p_hostName);
		$this->set('dbName', $p_dbName);
		$this->set('userName', $p_userName);
		$this->set('password', $p_password);
	}

	//----------------------------------------------------------------------------------------------
	public function setInfo($p_hostName, $p_dbName, $p_userName, $p_password)
	{
		$this->set('hostName', $p_hostName);
		$this->set('dbName', $p_dbName);
		$this->set('userName', $p_userName);
		$this->set('password', $p_password);
	}

	//----------------------------------------------------------------------------------------------
	public function set($propertyName, $value)
	{
		if (property_exists($this, $propertyName))
		{
			$this->$propertyName = $value;
		}
	}
	
	//----------------------------------------------------------------------------------------------
	public function get($propertyName)
	{
		if (property_exists($this, $propertyName))
		{
			return $this->$propertyName;
		}
	}
	
	//----------------------------------------------------------------------------------------------
	public function connectToDb()
	{
		$this->o_mysqli = @new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);

		if (mysqli_connect_error() || mysqli_connect_errno())
		{
			echo ("ERROR!!! Sorry for the inconvenience, can't connect to db <br/> Please Contact Adminstrator");
			exit;
		}

		return $this->o_mysqli;
	}

	//----------------------------------------------------------------------------------------------
	public function getMaxId($p_columnName, $p_tableName, $p_columnMaxValue=self::BIGINT)
	{
		$o_mysqli = $this->o_mysqli;

		$sql = "SELECT MAX(" . $p_columnName . ") as max_id FROM `" . $p_tableName . "`;";

		$result = $o_mysqli->query($sql);

		if (!$result){
		    return false;
                }

		$a_maxId = $result->fetch_assoc();

		$maxId = $a_maxId['max_id'];

		if ($maxId < $p_columnMaxValue){
			return $maxId + 1;
                }

		$sql = "SELECT `" . $p_columnName . "` FROM `" . $p_tableName . "`;";

		$result = $o_mysqli->query($sql);

		if (!$result){
		    return false;
                }

		$a_id = array();
		while ($row = $result->fetch_array(MYSQLI_NUM))
		{
			$a_id[] = $row[0];
			$i++;
		}

		$id = 0;

		for ($i=1; $i < count($a_id); $i++)
		{
			if (!in_array($i, $a_id))
			{
				$id = $i;
				break;
			}
		}

		if ($id > 0){
                    return $id;
                }
			
                return false;
	}
	//----------------------------------------------------------------------------------------------
}