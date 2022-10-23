<?php include("selecte_to_user.php")?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحة االدخول</title>
<link rel="stylesheet" href="Project.css">
<link rel="stylesheet" href="cssall.css">
</head>

<body class="body">

<form name="myform" method="post" action="login.php" onsubmit="return validateform()" > 
	<fieldset id="fie">
		<legend id="leg"><img id="img1" src="صوره المشروع4.png"></legend>
		<h1 id="hh">Welcome To Your<br/> Login Page</h1>
		<table id="tab1">
			<tr class="tr1">
				
				<td><input class="dd" type="text" name="name" placeholder="User Name"></td>
			</tr>
			<tr class="tr1">
				
				<td><input class="dd" type="password" name="password" placeholder="password"></td>
			</tr>
			
		  <tr class="tr1">
				
				<td><input class="dd" type="email" name="email" placeholder="Email"></td>
			</tr>
			<tr class="tr1">
				
				<td><input class="dd" type="number" name="num" placeholder="Card Number:"><span id="numloc"></span></td>
			</tr>
		</table>
		<input class="button" type="submit"  value="Login" name="submit">
		<a href="user_visit2.php">إنشاء حساب</a>
	</fieldset>
</form>
</body>
</html>
<?php 

if (isset($_POST['submit'])){
	        $a=$_POST['name'];
            $b=$_POST['password'];
	        $c=$_POST['email'];
	        $d=$_POST['num'];
	if($a!=null&&$b!=null&&$c!=null&&$d!=null){
		     
	
		    $x=0;
			$stm=$conn->prepare("select * from user");
             $stm->execute();
             $row=$stm->fetchAll();
            foreach($row as $std){
	          if($a==$std['name']){
				  if($b==$std['password']){
					  if($c==$std['email']){
						  if($d==$std['card']){
							  $data=$std['id'];
					  echo $std['id']; 
					  session_start();
                      $_SESSION['userID']=$data;
					  header('location:the_sales.php');
					  $x=1;
					  break;
							  
						  }
					  }
					  
					  
				  }
			  }
					
	 }
		if($x==0)
			echo "eroor";
	}

   elseif($a!=null&&$b!=null&&$c!=null){
		     
	
		    $x=0;
			$stm=$conn->prepare("select * from user_visit");
             $stm->execute();
             $row=$stm->fetchAll();
            foreach($row as $std){
	          if($a==$std['name']){
				  if($b==$std['password']){
					  if($c==$std['email']){
	
							  $data=$std['id'];
					  echo $std['id']; 
					  session_start();
                      $_SESSION['userID']=$data;
					  header('location:Project main.html');
					  $x=1;
					  break;
							  
						  }
					  }
					  
					  
				  
			  }
					
	 }
		if($x==0)
			echo "eroor";
	}
	
	else {echo "ادخل جميع الحقول";}


}




?>