<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body>
<?php
include 'header.php';
?>
	<div id="content" >
		<form action="processupdate.php" method="post" id="updatesubmit" name="updateitem" style="margin:auto;"> 
			<p>Update Item</p>
			<table align="center" id="myCart">
				<thead>
					<tr><th colspan="3"><?php 
					$_SESSION['updateID']=$_POST['update_hidden_ID'];
					$_SESSION['updateqty']=$_POST['update_hidden_qty'];
					$_SESSION['updateprice']=$_POST['update_hidden_price'];
					if(isset($_POST['updateCart'])){ echo $_POST['update_hidden_name'];}?></th></tr>
				</thead>
				<tbody>
					<tr><td> Current Price: </td>
						<td><p style="text-align: center">$<?php echo $_POST['update_hidden_price']; ?></p></td>
					</tr>
					<tr><td><label for="updateprice">Update Price: </label></td>
						<td><input type="text" id="updateprice" placeholder="Price" name="updateprice"></td>
					</tr>
					<tr><td> Current Quantity: </td>
						<td><p style="text-align: center"><?php echo $_POST['update_hidden_qty']; ?></p></td>
					</tr>
					<tr><td><label for="updateqty">Add Quantity </label></td>
						<td><input type="text" id="updateqty" placeholder="Quantity" name="updateqty"></td>
					</tr>
				</tbody>
				<tfoot>
					<tr><td colspan="3"><input type="submit" value="Update Item" class="input-button" id="checkout" name="updatecheckout"></td>
					</tr>
				</tfoot>
			</table>
		</form>
	</div>
	<footer>
		<p> Copyright &copy; 2016 HeyPasta Singapore Pte Ltd</p>
		<nav id="navbottom">
			<ul>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Feedback</a></li>
			</ul>
		</nav>
	</footer>
	<script src ="modal.js" type="text/javascript"></script>
	<script src="signUpValidator.js" type="text/javascript"></script>
</body>
</html>