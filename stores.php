<?php include("selecte_to_user2.php")?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	
	</style>
	<link rel="stylesheet" href="Project.css">
	<link rel="stylesheet" href="cssall.css">
</head>

<body dir="rtl" class="body">
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
	<div class="divmain">
<form method="post" action="stores.php">
	<div class="header">
<center><legend>صفحة المخازن</legend></center><br><br>
</div>
<div class="input">
<div>
<label class="one2">الرقم:</label>
<input class="one"  type="number" name="id">
<label  class="one2">اسم الصنف:</label>
<select class="one"  name="name">
<?php 
	$stm=$conn->prepare("select * from items");
$stm->execute();
$row=$stm->fetchAll();
 foreach($row as $std)
	 echo "<option value='".$std["name"]."'>".$std["name"]."</option>";
     $x=$std["id"];
echo $x;
	?>
	
</select>
	<label class="one2">تاريخ دخول:</label>
	<input class="one"  type="date" name="date">
	</div>
	<div class="div2">
	<label class="one2">الكمية:</label>
	<input class="one3"  type="number" name= "quantity"><br>
	<label class="one2">سعر الحبة:</label>
	<input class="one3"  type="number" name= "price" >
	</div>
	
	
<center>
<input type="submit" name="insert" value="insert" class="button" >
<input type="submit" name="delete" value="delete" class="button">
<input type="submit" name="update" value="update" class="button">
</center>
</div>

<div class="output">
<table id="tab">
<tr>
	<th>الرقم</th>
	<th>اسم الصنف</th>
	<th>تاريخ الدخول</th>
	<th>الكمية</th>
	<th>سعر الحبه شراء</th>
	<th>الاجمالي</th>
	
</tr>
<?php 
	$stm=$conn->prepare("select * from stores");
$stm->execute();
$row=$stm->fetchAll();
 foreach($row as $std){
	 echo "<tr>";
		echo "<td>".$std['id']."</td>";
		echo "<td>".$std['name']."</td>";
	    echo "<td>".$std['date']."</td>";
	    echo "<td>".$std['quantity']."</td>";
	    echo "<td>".$std['price']."</td>";
	    echo "<td>".$std['total']."</td>";
		echo "</tr>";
	 }	

	?>
	</table>	
</div>

</form>
</div>
</body>
<?php
if(isset($_POST['insert'])==True){	
$a=$_POST['name'];
$b=$_POST['date'];
$c=$_POST['quantity'];
$d=$_POST['price'];
if($a!=null&&$b!=null&&$c!=null&&$d!=null){
try{ 
	$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");
	$conn=new PDO("mysql:host=localhost;dbname=project2","root","",$options);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$z=$c*$d;
	$sql="insert into stores  (name,date,quantity,price,total) values ('$a','$b','$c','$d','$z')";
   $conn->exec($sql);
	echo " New record created successfully ";
header("location:stores.php");
}
catch(PDOException $e){
	echo $sql ."<br>" . $e->getMessage();}
$conn=null;
}
	else{
		echo "ادخل جميع الحقول";
	} 
	
}
if(isset($_POST['delete'])==True){
	$q=$_POST['id'];
	if($q!=null){
	try{
	$conn=new PDO("mysql:host=localhost;dbname=project2","root","");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="delete from stores where id=$q";
   $conn->exec($sql);
    echo " Record deleted successfully";
	header("location:stores.php");
	
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
	$w=$_POST['date'];
	$y=$_POST['quantity'];
	$z=$_POST['price'];
	$k=$_POST['total'];
	if($i!=null&&$x!=null&&$w!=null&&$y!=null&&$z!=null){
	try{
		$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");
	$conn=new PDO("mysql:host=localhost;dbname=project2","root","",$options);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE stores SET name='$x',date='$w',quantity='$y',price='$z',total='$k' WHERE id=$i";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  echo  "  records UPDATED successfully";
	header("location:stores.php");
	}
catch(PDOException $e){
	echo "error" . "<br>" . $e->getMessage();}
$conn=null;
}
else {
	echo"ادخل جميع الحقول من اجل التعديل";}
	
}
?>

