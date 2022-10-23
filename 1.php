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
		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td>'.$row['name'].'</td>';
		echo '<td>'.$row['password'].'</td>';
		echo '<td>'.$row['upassword'].'</td>';
		echo '<td>'.$row['n'].'</td>';
		echo '</tr>';
	}
	?>
	</table>


</form>
</body>
</html>

<?php
$host='localhost';
$user='root';
$pass='';
$db='project';
$conn=mysqli_connect($host,$user,$pass,$db);
$r=mysqli_query($conn,'select * from user');
	

?>