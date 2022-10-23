<?php include("selecte_to_user2.php");

session_start();
if(!isset($_SESSION['userID'])){
	header('location:login.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

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
			<li class="li2_1"><a href="logout.php" target="_parent"> تسجيل الخروج</a></li>
			<li class="li2_1"><a href="user_delete.php" target="_parent">حذف حساب زائر</a></li>
			
		</ul>
	</nav>
	</div>
	</header>
	<div class="divmain">
<form method="post" action="the_sales.php">
<div class="header">
<center><legend>صفحة المبيعات</legend></center><br><br>
</div>
<div class="input">
<div>
<label class="one2">الرقم:</label>
<input  class="one" type="number" name="id">
<label class="one2">اسم الصنف:</label>
<select  class="one" name="name">
<?php 
	$stm=$conn->prepare("select * from items");
$stm->execute();
$row=$stm->fetchAll();
 foreach($row as $std)
	 echo "<option value='".$std["name"]."'>".$std["name"]."</option>";
	?>
	
</select>
	<label class="one2">تاريخ البيع:</label>
	<input  class="one" type="date" name="date" class="in">
	</div>
	<div class="div2">
	<label class="one2">الكمية:</label>
	<input class="one3" type="number" name= "quantity" class="in">
	<label class="one2">سعر الحبة:</label>
	<input class="one3" type="number" name= "price"  class="in">
    </div>
	
	
<center>
<input type="submit" name="insert" value="insert" class="button" >
<input type="submit" name="delete" value="delete" class="button">
<input type="submit" name="update" value="update" class="button">
</center>
</div>

<div class="output">
<table>
<tr>
	<th>الرقم</th>
	<th>اسم الصنف</th>
	<th>التاريخ البيع</th>
	<th>الكمية</th>
	<th>سعر الحبه بيع</th>
	<th>الاجمالي</th>
	
</tr>

<?php 
	$stm=$conn->prepare("select * from the_sales");
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
	$sql="insert into the_sales  (name,date,quantity,price,total) values ('$a','$b','$c','$d','$z')";
   $conn->exec($sql);
	echo " New record created successfully ";
header("location:the_sales.php");
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
	$sql="delete from the_sales where id=$q";
   $conn->exec($sql);
    echo " Record deleted successfully";
	header("location:the_sales.php");
	
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
	$sql = "UPDATE the_sales SET name='$x',date='$w',quantity='$y',price='$z',total='$k' WHERE id=$i";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  echo  "  records UPDATED successfully";
	header("location:the_sales.php");
	}
catch(PDOException $e){
	echo "error" . "<br>" . $e->getMessage();}
$conn=null;
}
else {
	echo"ادخل جميع الحقول من اجل التعديل";}
	
}
?>
