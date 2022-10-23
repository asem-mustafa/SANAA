<?php include("selecte_to_user.php")?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="users_css.css" rel="stylesheet">
</head>
<body>

<div id="div_from">
<form method="post">
<img stc='' alt="لوجو الموقع">
<h3>لوحة المدير</h3>
<label>User Number:</label><br>
<input type="number" name="number"><br>
<label>User Name:</label><br>
<input type="text" name="name"><br>
<label>Password:</label><br>
<input type="text" name="password"><br>
<label>Email:</label><br>
<input type="email" name="email"><br>
<label>Card_Number:</label><br>
<input type="number" name="card"><br><br>
<input type="button" name="insert" value="insert" class="button" ><br>
<input type="button" name="delete" value="delete" class="button"><br>
<input type="button" name="update" value="update" class="button"><br>
</form>	
</div> 

<div id="div_tabel">

<table id="tab">

<tr>
	<th>User Number</th>
	<th>User Name</th>
	<th>Password</th>
	<th>UPassword</th>
	<th>card</th>
</tr>
<?php 
	$stm=$conn->prepare("select * from user");
$stm->execute();
$row=$stm->fetchAll();
 foreach($row as $std){
	 echo "<tr>";
		echo "<td>".$std['id']."</td>";
		echo "<td>".$std['name']."</td>";
		echo "<td>".$std['password']."</td>";
		echo "<td>".$std['upassword']."</td>";
		echo "<td>".$std['n']."</td>";
		echo "</tr>";
	 }

	?>
	
	</table>
		
</div>

	

</body>
</html>

