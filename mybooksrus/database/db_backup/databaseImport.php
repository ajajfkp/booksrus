<?php
ini_set('max_execution_time', 0);



define("CH_DB_HOST", "localhost");
define("CH_DB_USER", "root");
define("CH_DB_PASSWORD", "");
define("CH_DB_NAME", "dicomdb");
define("CH_DB_PORT", "3306");

echo "*****  Connecting Database *****\n";
if(databaseConn() == true){
	
	$sql = "Drop database if exists " .CH_DB_NAME;
	$result =  mysql_query($sql);

	$sql = "Create database if not exists " .CH_DB_NAME;
	$result =  mysql_query($sql);
	
	if(selectDb() == true){
		echo "***** Importing tabless into destination database ***** \n";
		$dir = 'data';

		$logFileName = "dbImportLog-". Date("Y-m-d").".txt";
		$fp = fopen($logFileName, 'w+');
		
		fwrite($fp, "Importing tabless into destination database \n");

		$files = array_diff(scandir($dir), array('..', '.'));
			foreach ($files as &$value) {
			$fileName = "data/".$value;			
			$cmd = "mysql --user=" . CH_DB_USER . " --pass=" . CH_DB_PASSWORD . " --host=" . CH_DB_HOST . " " . CH_DB_NAME . " < " . $fileName;
			
		    exec($cmd);
			echo "***** Table imported successfully  ".$value." *****\n";
			fwrite($fp, $value."\n");

		}
	}

	
}

function databaseConn(){
	$con = mysql_connect(CH_DB_HOST, CH_DB_USER, CH_DB_PASSWORD);
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	  return false;
	}
	return true;
}

function selectDb(){
	if (!mysql_select_db(CH_DB_NAME))
	{
		echo "Database could not be selected";
		return false;
	}
	return true;
}


function disconnect_database()
{
	mysql_close();
	return true;
}


?>