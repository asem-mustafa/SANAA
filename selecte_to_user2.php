
<?php
$dns="mysql:host=localhost;dbname=project2";
$user="root";
$pass="";
$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");

try{
	$conn=new PDO($dns,$user,$pass,$options);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
}
catch(PDOException $e){
	echo "failed". $e->getMessage();}

	
	
?>