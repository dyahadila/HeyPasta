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
	<link rel="stylesheet" type="text/css" href="paymentfont.min.css">

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
			font-size: 13px;
		}
		td h4{
			color: #aaccff;
			padding: 0px;
			margin:11px;
		}

		#submitform{
			background-color: #34495E;
			margin: auto;
		}
		.section{
			border-bottom: 1px solid;
			border-top: 1px solid;
			background-color: #222233;
		}
		.section a {
			color: white;
		}
		.identity{
			margin-left: 11px;
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
include 'header.php';
?>
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

	<div id="form">
		<form method="post" <?php 
		if($boolean == 'true'){
			echo 'action="addorder.php"';
		} else{
			echo 'action="confirmorder.php"';
		}
		?>>
			<table border="1">
				<thead>
					<tr>
						<th colspan="4"><p>Delivery Details</p></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="3" class="section"><h4>Items in Cart </h4></td>
						<td colspan="1" class="section"><a href="ordernow.php">Edit</a></td>
					</tr>
					<?php
					if(isset($_SESSION['cart'])){
						foreach ($_SESSION['cart'] as $key => $value) {
					?>
					<tr>
						<td colspan="2">
							<?php
							echo "<p class='identity'>".$_SESSION['cart'][$key]['item_name']."</p>";
							?>
						</td>
						<td colspan="1">
							<?php
							echo "x".$_SESSION['cart'][$key]['item_quantity'];
							?>
						</td>
						<td colspan="1">
							<?php
							echo "$".$_SESSION['cart'][$key]['item_price']*$_SESSION['cart'][$key]['item_quantity'];
							?>
						</td>
					</tr>
					<?php
						}
					}
					?>
					<tr>
						<td colspan="4">
							<?php
							$total = 0;
							foreach ($_SESSION['cart'] as $keys => $values) {
								$total=$total+$values['item_price']*$values['item_quantity'];
							}
							$_SESSION['total']=$total;
							echo "<p style='float:right;margin-right:38px;'>Total : $".$total."</p>";
							?>
						</td>
					</tr>
					<tr>
						<td colspan="3" class="section"><h4>Customer Information </h4></td>
						<td colspan="1" class="section"><a href="edituserprofile.php">Edit</a></td>
					</tr>
					<tr>
						<td colspan="2"><p class="identity">Full Name:</p></td>
						<td colspan="2"><?php echo $row1['fullname']; ?></</td>
					</tr>
					<tr>
						<td colspan="2"><p class="identity">Email:</p></td>
						<td colspan="2"><?php echo $row1['username'];
										  $_SESSION['email'] = $row1['username']; ?></td>
					</tr>
					<tr>
						<td colspan="2"><p class="identity">Phone Number:</p></td>
						<td colspan="2">
							<?php
							if($boolean == 'true'){
								echo $row2['phone'];
							} else{
								echo 'No phone number entered.';
							}
							?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><p class="identity">Address:</p></td>
						<td colspan="2">
						<?php
						if($boolean == 'true'){
							echo $row2['address'];
						} else{
							echo 'No address entered.';
						}
						?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><p class="identity">State/Region:</p></td>
						<td colspan="2">
						<?php
						if($boolean == 'true'){
							echo $row2['region'];
						} else{
							echo 'No state/region entered.';
						}
						?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><p class="identity">Postal Code:</p></td>
						<td colspan="2">
						<?php
						if($boolean == 'true'){
							echo $row2['zipcode'];
						} else{
							echo 'No zip code entered.';
						}
						?>			
						</td>
					</tr>
					</tr>
					<tr>
						<td colspan="4" class="section"><h4>Payment Method</h4></td>
					</tr>
					<tr>
						<td class="icon"><label>
    							<input type="radio" name="fb" value="small" />
    							<i class="fa fa-cc-visa" style="font-size:64px;color:#16216A" id="visa"></i>
  							</label>
  						</td>
  						<td class="icon"><label>
    							<input type="radio" name="fb" value="small" />
    							<i class="fa fa-cc-paypal" style="font-size:64px;color:#003087" id="paypal"></i>
  							</label>
  						</td>
						<td class="icon"><label>
    							<input type="radio" name="fb" value="small" />
    							<i id="mastercard" class="fa fa-cc-mastercard" style="font-size:64px;color:#CC0000"></i>
  							</label>
  						</td>
  						<td id="cash"><label>
    							<input type="radio" name="fb" value="small" checked/>
    							<img src="cash.jpeg" height="60" width="55">
  							</label>
  						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"><input type="submit" class="sign" id="submitform" value="Proceed to Checkout" ></td>
					</tr>
				</tfoot>
			</table>
		</form>
		<?php
		if($boolean == 'false'){
			echo "<script>alert(\"Please Complete User Info!\")</script>";
		}
		?>
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