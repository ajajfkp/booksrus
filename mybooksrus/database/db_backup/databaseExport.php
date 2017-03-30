<?php
ini_set('max_execution_time', 0);

define("CH_DB_HOST", "localhost");
define("CH_DB_USER", "root");
define("CH_DB_PASSWORD", "");
define("CH_DB_NAME", "medgremu2");
define("CH_DB_PORT", "3306");

echo "*****  Connecting Database *****\n";
if(databaseConn() == true){
	
	echo "***** Creating new data directory ***** \n";
	$dir = 'data';
	if (!is_dir($dir)) {
		mkdir($dir, 0777);  
		//fwrite($fp, $fileRow);
	}	
	
	$logFileName = "dbExportLog-". Date("Y-m-d").".txt";
	$fp = fopen($logFileName, 'w+');

	$sql = "SHOW TABLES FROM " .CH_DB_NAME;
	$result =  mysql_query($sql);
	
	echo "***** Total table in database is ".mysql_num_rows($result)." *****\n";
				
	if(mysql_num_rows($result) > 0) 
	{
		while($row = mysql_fetch_array($result)){
			$tableName = $row[0];
			$fileName = "data/".$row[0].".sql";
			$cmd = "mysqldump --user=" . CH_DB_USER . " --pass=" . CH_DB_PASSWORD . " --host=" . CH_DB_HOST . " " . CH_DB_NAME ." ". $tableName . " > " . $fileName;
		    exec($cmd);
			echo "***** Table imported successfully  ".$tableName." *****\n";
			fwrite($fp, $tableName."\n");
		}
		fclose($fp);
	}
	
}

function databaseConn(){
	$con = mysql_connect(CH_DB_HOST, CH_DB_USER, CH_DB_PASSWORD);
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	}

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