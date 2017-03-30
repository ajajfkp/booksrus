<?php
ini_set('max_execution_time', 0);

define("CH_DB_HOST", "localhost");
define("CH_DB_USER", "x8u1f4p4_aijaz");
define("CH_DB_PASSWORD", "!@#dev@db");
define("CH_DB_NAME", "x8u1f4p4_local");
define("CH_DB_PORT", "3306");
//require_once('../config.php');
echo "*****  Connecting Database *****\n";
$conn = databaseConn();
if($conn){
	date_default_timezone_set('America/Denver');
	echo "***** Creating new data directory ***** \n";
	$day = '1';//date("d");
	if($day =='1'){
		$dir = '/home2/x8u1f4p4/public_html/mybooksrus/database/db_backup/data_'.date('d-m-Y');
	}else{
		$first = date("d-m-Y", strtotime("first day of this month"));
		$dir = '/home2/x8u1f4p4/public_html/mybooksrus/database/db_backup/data_'.$first;
	}
	
	if (!is_dir($dir)) {
		mkdir($dir, 0755, true);  
		chmod($dir, 0755);  
		//fwrite($fp, $fileRow);
	}	
	
	$logFileName = "/home2/x8u1f4p4/public_html/mybooksrus/database/dbExportLog-". Date("Y-m-d").".txt";
	$fp = fopen($logFileName, 'w+');

	$sql = "SHOW TABLES FROM " .CH_DB_NAME;
	$result =  mysqli_query($conn, $sql);
	
	echo "***** Total table in database is ".mysqli_num_rows($result)." *****\n";
				
	if(mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_array($result)){
			$tableName = $row[0];
			$fileName = $dir."/".$row[0].".sql";
			$cmd = "mysqldump --user=" . CH_DB_USER . " --password=" . CH_DB_PASSWORD . " --host=" . CH_DB_HOST . " " . CH_DB_NAME ." ". $tableName . " > " . $fileName;
		    exec($cmd);
			echo "***** Table imported successfully  ".$tableName." *****\n";
			fwrite($fp, $tableName."\n");
		}
		fclose($fp);
	}
	
}

function databaseConn(){
	$con = mysqli_connect(CH_DB_HOST, CH_DB_USER, CH_DB_PASSWORD);
	if (!$con){
	  die('Could not connect: ' . mysqli_error());
	}

	if (!mysqli_select_db($con,CH_DB_NAME))
	{
		echo "Database could not be selected";
		return false;
	}

	return $con;
}

function disconnect_database()
{
	mysqli_close();
	return true;
}

?>