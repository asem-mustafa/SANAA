
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<select>
<?php 
	$stm=$conn->prepare("select * from u");
$stm->execute();
$row=$stm->fetchAll();
 foreach($row as $std)
	 echo "<option value='".$std["id"]."'>'".$std["name"]."'</option>";
	?>
	
</select>
</body>
</html>
<?php
$dns="mysql:host=localhost;dbname=project";
$user="root";
$pass="";
$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");

try{
	$conn=new PDO($dns,$user,$pass,$options);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "connect";
}
catch(PDOException $e){
	echo "failed". $e->getMessage();}
?>