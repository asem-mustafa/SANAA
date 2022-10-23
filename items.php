<?php include("selecte_to_user2.php")?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	form{margin: auto;
		border: 2px solid #000000;
	width: 500px}
	</style>
	<link rel="stylesheet" href="Project.css">
</head>

<body dir="rtl">
<header>
	<div id="divul2_1">
	<nav>
	
		<ul id="ul2_1">
			
			<li class="li2_1"><a href="the_sales.php" target="_self" >صفحة المبيعات </a></li>
			<li class="li2_1"><a href="stores.php" target="_parent">صفحة المخازن</a></li>
			<li class="li2_1"><a href="items.php"> صفحة الاصناف</a>
			
			</li>
			<li class="li2_1"><a href="users.php" target="_parent">إنشاء حساب</a></li>
			
			
		</ul>
	</nav>
	</div>
	</header>
<form method="post" action="items.php">
<center><legend>صفحة الاصناف</legend></center><br><br>
<label>الرقم:</label>
<input type="number" name="id">
<label>اسم الصنف:</label>
<input type="text" name="name"><br><br>
<center>
<input type="submit" name="insert" value="insert" class="button" >
<input type="submit" name="delete" value="delete" class="button">
<input type="submit" name="update" value="update" class="button">
</center>
<div id="div_tabel">
<table id="tab">
<tr>
	<th>الرقم</th>
	<th>اسم الصنف</th>
	
</tr>
<?php 
	$stm=$conn->prepare("select * from items");
$stm->execute();
$row=$stm->fetchAll();
 foreach($row as $std){
	 echo "<tr>";
		echo "<td>".$std['id']."</td>";
		echo "<td>".$std['name']."</td>";
		echo "</tr>";
	 }	

	?>
	</table>	
</div>
</form>
</body>
</html>
<?php
if(isset($_POST['insert'])==True){
	$a=$_POST['name'];
	if($a!=null){
	
	$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");

try{
	$conn=new PDO("mysql:host=localhost;dbname=project2","root","",$options);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="insert into items  (name) values ('$a')";
   $conn->exec($sql);
	echo " New record created successfully ";
header("location:items.php");
}
catch(PDOException $e){
	echo $sql ."<br>" . $e->getMessage();}
$conn=null;

}
else{
	echo "ادخل  حقل الاسم";
}
}

//_____________________________________________________________________________
if(isset($_POST['delete'])==True){
	$q=$_POST['id'];
	if($q!=null){
	try{
	$conn=new PDO("mysql:host=localhost;dbname=project2","root","");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="delete from items where id=$q";
   $conn->exec($sql);
    echo " Record deleted successfully";
	header("location:items.php");
	
	}


catch(PDOException $e){
	echo "error" . "<br>" . $e->getMessage();}
$conn=null;
	   }
	else{
	echo "ادخل رقم الصنف المراد حذفة";
}
}

if(isset($_POST['update'])==True){
	$i=$_POST['id'];
	$x=$_POST['name'];
	if($x!=null){
	$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");
	try{
	$conn=new PDO("mysql:host=localhost;dbname=project2","root","",$options);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE items SET name='$x' WHERE id=$i";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  echo  "  records UPDATED successfully";
	header("location:items.php");
	}
catch(PDOException $e){
	echo "error" . "<br>" . $e->getMessage();}
$conn=null;
	}
	else{
	echo "ادخل جميع الحقول لااضافة التعديل";
}
	
}



?>
