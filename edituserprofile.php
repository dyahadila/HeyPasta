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
	<style type="text/css">

		table{
			margin: auto;
			margin-top: 40px;
			margin-bottom: 40px;
			border:0.5px solid;
			border-spacing: 0;
			border-radius: 6px;
			width:35%;
		}
		thead{
			background-color: #34495E;
			width: 100%;
		}
		thead th{
			border-radius: 5px;
			border-bottom-left-radius: 0px;
			border-bottom-right-radius: 0px;
			height:75px;
		}
		thead p{
			vertical-align: middle;
			font-size: 24px;
			color: white;
			float: left;
			padding: 0px;
			margin-left: 20px;
			font-family:"Times New Roman";
		}
		td{
			height: 30px;
			padding-left: 12px;
			padding-right: 9px;
			border:none;
			border-spacing: 0px;
		}
		td h4{
			color: #aaccff;
			padding: 0px;
			margin:15px;
		}


		.input{
			width:100%;
			border-radius: 2.5px;
			height:28px;
			padding: 0px;
			margin-top: 9px;
			margin-bottom: 9px;
			font-size: 13px;
			padding-left: 6px;
			border:0.5px;
			border-style: solid;
		}
		#fullname{
			margin-top: 30px;
		}
		.rightin{
			padding-right:20px;
		}
		#submitform{
			background-color: #34495E;
			margin: auto;
		}
		#delnote{
			margin-bottom: 30px;
		}
		.section{
			border-bottom: 1px solid;
			border-top: 1px solid;
			background-color: #222233;
		}


		label > input{ /* HIDE RADIO */
  			visibility: hidden; /* Makes input not-clickable */
  			position: absolute; /* Remove input from document flow */
		}
		label > input + i,label > input + img{ /* IMAGE STYLES */
  			cursor:pointer;
  			opacity: 0.7;
  			margin-top:30px;
  			margin-bottom: 30px;
		}

		label > input:checked + i, label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
			 transform: scale(1.1, 1.1);
             -webkit-transform: scale(1.1, 1.1);
             opacity:1.0;
		}
		input+i:hover, input+img:hover{
    		transform: scale(1.1, 1.1);
            -webkit-transform: scale(1.1, 1.1);
            cursor:pointer;
            margin: auto;
		}
		#cash img{
			margin-left: 7px;
		}
		#visa, #mastercard,#paypal{
			margin-left: 8px;
		}
		.icon{
			width:26%;
		}

		tfoot{
			background-color: #F2F5FA;
		}
		tfoot td{
			height:70px;
			width:100%;
			border-radius: 5px;
			width:100%;
			border-top-right-radius: 0px;
			border-top-left-radius:0px;
			border-top: 0.1px solid;
		}
	</style>
</head>
<body>
	<?php
		session_start();

			echo "<header>";
			
			if(isset($_SESSION['valid_user'])){
		?>
			<form action="logout.php" id="logout" >
				<button id="signOutButton" class="sign" form="logout">Sign Out</button>
				<label id="helloUser"><a href="userprofile.php">My Profile <i class="fa fa-user" aria-hidden="true"></i></label>
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
				<li><a href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li id="ordernow"><a href="ordernow.php">Order Now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
			</ul>
		</nav>
		<div id="loginModal" class="modal">
			<div class="modalContent">
				<div class="modalHeader">
					<i class="fa fa-times" aria-hidden="true"></i>
					<h3>Login</h2>
				</div>
				<div class="modalBody">
					<form>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" name="email" placeholder="Email" class="input-field">
  						<br>
  						<i class="fa fa-lock" aria-hidden="true"></i>
  						<input type="password" name="password" placeholder="Password" class="input-field">
 						<br><br>
 						<input type="submit" value="Sign In" class="input-button">
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
					<form>
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="name" placeholder="Name" class="input-field">
						<br>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" name="email" placeholder="Email" class="input-field">
  						<br>
  						<i class="fa fa-lock" aria-hidden="true"></i>
  						<input type="password" name="password" placeholder="Password" class="input-field">
 						<br><br>
 						<input type="submit" value="Sign Up!" class="input-button" id="signUpModalButton">
					</form>
				</div>
			</div>
		</div>
	</header>


	<div id="form">
		<form method="post" action="edituserprofile.php?action=edit&id=<?php echo $_SESSION['valid_user'];?>">
			<table border="1">
			<?php
				include 'dbconnect.php';
				$id = $_SESSION['valid_user'];

				$query1= 'select * from authorized_user '."where ID='$id' ";
				$result1=$dbcnx->query($query1);
				if($result1->num_rows>0){
					$row1=$result1->fetch_assoc();
				}

				$query2= 'select * from user_info '."where ID='$id' ";
				$result2=$dbcnx->query($query2);
				if($result2->num_rows>0){
					$row2=$result2->fetch_assoc();
					$boolean = 'true';
				} else{
					$boolean = 'false';
				}
			?>
				<thead>
					<tr>
						<th colspan="4"><p>User Profile</p></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="4" class="section"><h4>Customer Information </h4></td>
					</tr>
					<tr>
						<td class="rightin" colspan="4"><input type="text" name="fullname" id="fullname" class="input" value="<?php echo $row1['fullname']; ?>" required></td>
					</tr>
					<tr>
						<td  class="rightin" colspan="4"><input type="text" name="address" id="address" class="input" 
						<?php
							if($boolean == 'true'){
								$address = $row2['address'];
								echo "value = '$address'";
							} else{
								echo 'placeholder="Address"';
							}
						?> required></td>
					</tr>
					<tr>
						<td colspan="2"><input type="text" name="state" id="state" class="input" 
						<?php
							if($boolean == 'true'){
								$region = $row2['region'];
								echo "value = '$region'";
							} else{
								echo 'placeholder="State/Region"';
							}
						?> required></td>
						<td colspan="2" class="rightin"><input type="text" name="postal" id="postal" class="input" 
						<?php
							if($boolean == 'true'){
								$zipcode = $row2['zipcode'];
								echo "value = '$zipcode'";
							} else{
								echo 'placeholder="Postal/ZipCode"';
							}
						?> maxlength="6" required></td>
					</tr>
					<tr>
						<td colspan="2"><input type="text" name="phone" id="phone" class="input" 
						<?php
							if($boolean == 'true'){
								$phone = $row2['phone'];
								echo "value = '$phone'";
							} else{
								echo 'placeholder="Phone"';
							}
						?> required></td>
						<td colspan="2" class="rightin"><input type="email" name="email" id="email" class="input"  value="<?php echo $row1['username']; ?>" required></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"><input type="submit" class="sign" id="submitform" value="Submit" name="editprofile"></td>
					</tr>
				</tfoot>
			<?php
				if(isset($_GET["action"])){
					if($_GET["action"] == "edit"){
						$address=$_POST['address'];
						$region=$_POST['state'];
						$zipcode=$_POST['postal'];
						$phone=$_POST['phone'];
						$id=$_GET['id'];
						if($boolean == "true"){
							$query3 = "UPDATE user_info SET address='$address',region='$region',zipcode='$zipcode',phone='$phone' WHERE ID='$id'";
						} else{
							$query3 = "INSERT INTO user_info (ID,address,region, zipcode, phone) VALUES (".$id.",'".$address."','".$region."','".$zipcode."','".$phone."')";
						}
						$result3 = $dbcnx->query($query3);
						?>

				<script type="text/javascript">
					window.location.href = '<?php echo $_SESSION['url']; ?>';
				</script>
			<?php
					}
				}
			?>
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
</body>
</html>