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
<?php
include 'header.php';
?>
	<div id="content">
		<div id="leftContent">
			<p>Take a Peek at Our Menu!</p>
			<table align="center" id="peekTable">
				<tr>
					<td>
				 		<img src="bolognaise.jpg" width="230" height="105" style="vertical-align:middle">
						<p>Bolognaise</p>
					</td>
					<td>
						<img src="carbonara.png" width="230" height="105" style="vertical-align:middle">
						<p>Carbonara</p>
					</td>
					<td>
						<img src="alfredo.jpg" width="230" height="105" style="vertical-align:middle">
						<p>Alfredo</p>
					</td>
				</tr>
				<tr>
					<td>
						<img src="aglio.jpg" width="230" height="105" style="vertical-align:middle">
						<p>Aglio Olio</p>
					</td>
					<td>
						<img src="marinara.jpg" width="230" height="105" style="vertical-align:middle">
						<p>Marinara</p>
					</td>
					<td>
						<img src="saltedegg.jpg" width="230" height="105" style="vertical-align:middle">
						<p>Salted Egg</p>
					</td>
				</tr>
			</table>
		</div>
		<div id="rightContent">
			<p>Promotion of The Week</p>
			<table align="center" id="promoTable">
				<tr>
					<td><p>Get any big portion for $10 6pm onwards!</p></td>
					<td><button>Redeem</button></td>
				</tr>
				<tr>
					<td><p>Carbonara lunch at $6.40!</p></td>
					<td><button>Redeem</button></td>
				</tr>
				<tr>
					<td><p>Buy 1 get 1 on Monday night!</p></td>
					<td><button>Redeem</button></td>
				</tr>
				<tr>
					<td><p>Refer your friend and get $50 voucher@</p></td>
					<td><button>Redeem</button></td>
				</tr>
				<tr>
					<td><p>Free delivery charge at orders more than $80!</p></td>
					<td><button>Redeem</button></td>
				</tr>
			</table>
		</div>
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