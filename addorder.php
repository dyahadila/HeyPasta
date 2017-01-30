<?php 
	session_start();
	include 'dbconnect.php';
	$customerID=$_SESSION['valid_user'];
	$date= date("d-m-Y");
	$totalamount='$'.$_SESSION['total'];
	$email = $_SESSION['email'];
	$boolean = 'false';
	if(isset($_SESSION['cart'])){
		$serialize = serialize($_SESSION['cart']);
		$query1="insert into orderlist values ('', '$customerID', '$serialize', '$totalamount', '$date')";
		$dbcnx->query($query1);
		$orderid = mysqli_insert_id($dbcnx);
		$msg = "Thank you for your order.<br>The total amount of your order is:" .$totalamount .
				"<br>Your orders are:<br>";
		foreach($_SESSION['cart'] as $key => $values) {
			$id=$values['item_id'];
			$query2="select * from menu where ID= '$id'";
			$result=$dbcnx->query($query2);
			if($result->num_rows>0){
				$row = $result->fetch_assoc();
				$newquantity=$row['quantity']-$values['item_quantity'];
				$query3="update menu set quantity='$newquantity' where ID='$id'";
				$dbcnx->query($query3);
				$boolean = 'true';
				$msg = $msg.$values['item_name']."&nbsp"."x".$values['item_quantity']."<br>";
			}
		}
		$msg = $msg."<br>You order has been processed.";
	} 
	unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
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
	<header>
	<?php
		$_SESSION['url']=$_SERVER['REQUEST_URI'];

			echo "<header>";
			
			if(isset($_SESSION['valid_user'])){
		?>
			<form action="logout.php" id="logout" >
				<button id="signOutButton" class="sign" form="logout">Sign Out</button>
				<label id="helloUser"><a href="userprofile.php">My Profile <i class="fa fa-user" aria-hidden="true"></i></a></label>
			</form>

		<?php
			}
			else{
				echo '<button id="signUpButton" class="sign">Sign Up</button>';
				echo '<button id="signInButton" class="sign">Sign In</button>';
			}
	?>
		<div id="heypasta"><a href="#">HeyPasta!
			<img src="pasta.png" width="90" height="65" style="vertical-align:middle"></a>
		</div>
		<nav>
			<ul>
				<ul>
				<li><a href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li id="ordernow"><a href="ordernow.php">Order Now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
			</ul>
			</ul>
		</nav>
		<div id="loginModal" class="modal">
			<div class="modalContent">
				<div class="modalHeader">
					<i class="fa fa-times" aria-hidden="true"></i>
					<h3>Login</h3>
				</div>
				<div class="modalBody">
					<form action="login.php" method="post">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" name="email" placeholder="Email" class="input-field">
  						<br>
  						<i class="fa fa-lock" aria-hidden="true"></i>
  						<input type="password" name="password" placeholder="Password" class="input-field">
 						<br><br>
 						<input type="submit" name="login" value="Sign In" class="input-button">
					</form>
				</div>	
				<div class = "modalFooter">
					<p id="question">Not a User?&nbsp</p>
					<p id="signUp">Sign Up!</p>
				</div>
			</div>
		</div>
		<div id="signupModal" class="modal">
			<div class="modalContent">
				<div class="modalHeader">
					<i class="fa fa-times" aria-hidden="true" id="closeSignUp"></i>
					<h3>Sign Up</h3>
				</div>
				<div class="modalBody">
					<form method="post" action="signup.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="fullname" placeholder="Full Name" class="input-field">
						<br>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" name="email" placeholder="Email" class="input-field" id="email">
  						<br>
  						<i class="fa fa-lock" aria-hidden="true"></i>
  						<input type="password" name="password" placeholder="Password" class="input-field" id="password">
 						<br><br>
 						<input type="submit" value="Sign Up!" class="input-button" id="signUpModalButton" name="signup">
					</form>
				</div>
			</div>
		</div>
	</header>
	<div id="content" style="font-family:Verdana; text-align:left; font-size:16px;">
	<?php
	if($boolean == 'true'){
	?>
		<h3 style="margin:auto;">
			Thank You for Your Order. Your Order Has been Proceed <br>
			Order ID = <?php  echo  $orderid; ?> <br>
			Confirmation Email Has Been Sent to Your Email.
		</h3>
	<?php
	mail($email,"Your Order at HeyPasta",$msg);}
	?>
	</div>