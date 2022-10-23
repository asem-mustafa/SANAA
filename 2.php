<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body>
<form action="1.php" method="get">
id:
<input type="number" name="id">

name:
<input type="text" name="name">
password:
<input type="text" name="password">
upassword:
<input type="text" name="upassword">
n:
<input type="text" name="n">
<input type="submit" name="insert" value="اضافه">
<input type="submit" name="delete" value="حذف">
<input type="submit" name="update" value="تعديل">

<table >
<tr>
	<th>User Number</th>
	<th>User Name</th>
	<th>Password</th>
	<th>uPassword</th>
	<th>card</th>
</tr>
<?php
	
	while($row=mysqli_fetch_array($r)){
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['password']."</td>";
		echo "<td>".$row['upassword']."</td>";
		echo "<td>".$row['n']."</td>";
		echo "</tr>";
	}
	?>


</form>
</body>
</html>

<?php
$host='localhost';
$user='root';
$pass='';
$db='project';
$conn=mysqli_connect($host,$user,$pass,$db);
$r=mysqli_query($conn,"select * from user");
	
if(isset($_GET['insert'])==True){
	if(isset($_GET['name'])&&$_GET['password']&&$_GET['n']==True){
$a=$_GET['name'];
$b=$_GET['password'];
$c=$_GET['upassword'];
$d=$_GET['n'];	
}
else{
	echo "eroor";
}

try{
	$conn=new PDO("mysql:host=localhost;dbname=project","root","");
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="insert into user  (name,password,upassword,n) values ('$a','$b','$c','$d')";
   $conn->exec($sql);
	echo " New record created successfully ";}
catch(PDOException $e){
	echo $sql ."<br>" . $e->getMessage();}
$conn=null;


}
if(isset($_GET['delete'])==True){
	if(isset($_GET['id'])){
		$q=$_GET['id'];
	}
	try{
	$conn=new PDO("mysql:host=localhost;dbname=project","root","");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="delete from user where id=$q";
   $conn->exec($sql);
    echo " Record deleted successfully";}


catch(PDOException $e){
	echo "error" . "<br>" . $e->getMessage();}
$conn=null;
	   }
if(isset($_GET['update'])==True){
	$i=$_GET['id'];
	$x=$_GET['name'];
	$w=$_GET['password'];
	$y=$_GET['upassword'];
	$z=$_GET['n'];
	try{
	$conn=new PDO("mysql:host=localhost;dbname=project","root","");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE user SET name='$x',password='$w',upassword='$y',n='$z' WHERE id=$i";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  echo  "  records UPDATED successfully";}
catch(PDOException $e){
	echo "error" . "<br>" . $e->getMessage();}
$conn=null;



	
}
	
	
	

	

?>