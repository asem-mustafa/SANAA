
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="ExamToNer_CSS.css" rel="stylesheet">
</head>

<body>
<div class="crud">
	<div class="head"> 
	<h2>CRUD</h2>
	<p>PRODUCT MANAGEMENT SYSTEM</p>
	</div>
	<div class="inputs">
     <input placeholder="title" type="text" id="title">
    <div class="price">
    	<input type="number" id="price" placeholder="price">
    	<input type="number" id="taxes" placeholder="taxes">
    	<input type="number" id="ads" placeholder="ads">
    	<input type="number" id="discount" placeholder="discount">
    	<small id="total" >32132</small> 
    </div>
    <input placeholder="count" type="text" id="count">
    <input placeholder="category" type="text" id="category">
    <button id="submit">Create</button>
	</div>
	<div class="outputs">
		<div class="searchBlock">
			<input type="txet" id="search" placeholder="search">
			<div class="btnSearch">
				<button id="searchTitle">Search By Title</button>
				<button id="searchCategory">Search By Category</button>
			</div>
		</div>
		<table>
		 <tr>
		 	<th>id</th>
		 	<th>title</th>
		 	<th>price</th>
		 	<th>taxes</th>
		 	<th>ads</th>
		 	<th>discount</th>
		 	<th>totle</th>
		 	<th>category</th>
		 	<th>update</th>
		 	<th>delete</th>
		 </tr>
		 <tbody>
		 	<tr>
				<td>1</td>
				<td>samsung</td>
				<td>2000</td>
				<td>100</td>
				<td>100</td>
				<td>100</td>
				<td>2100</td>
				<td>phone</td>
				<td><button id="update">update</button></td>
				<td><button id="delete">delete</button></td>
				
		 	</tr>
		 	
		 	<tr>
				<td>1</td>
				<td>samsung</td>
				<td>2000</td>
				<td>100</td>
				<td>100</td>
				<td>100</td>
				<td>2100</td>
				<td>phone</td>
				<td><button id="update">update</button></td>
				<td><button id="delete">delete</button></td>
				
		 	</tr>
		 	<tr>
				<td>1</td>
				<td>samsung</td>
				<td>2000</td>
				<td>100</td>
				<td>100</td>
				<td>100</td>
				<td>2100</td>
				<td>phone</td>
				<td><button id="update">update</button></td>
				<td><button id="delete">delete</button></td>
				
		 	</tr>
		 	<tr>
				<td>1</td>
				<td> samsung </td>
				<td>2000</td>
				<td>100</td>
				<td>100</td>
				<td>100</td>
				<td>2100</td>
				<td>phone</td>
				<td><button id="update">update</button></td>
				<td><button id="delete">delete</button></td>
				
		 	</tr>
		 	
		 </tbody>
		</table>
	</div>
</div>
</body>
</html>












