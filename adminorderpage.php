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
			<div id="filterform">
				<form id="filter" method="post" action="adminorderpage.php?action=search">
					<label>Filter by:</label>
					<select name="searchtype" onclick="document.getElementById('filter').submit();">
						<option value="all">All</option>
						<optgroup label="Pasta">
							<option value="spaghetti">Spaghetti</option>
							<option value="fettuccine">Fettuccine</option>
							<option value="lasagna">Lasagna</option>
							<option value="macaroni">Macaroni</option>
						</optgroup>
						<optgroup label="Sauce">
							<option value="aglio">Aglio Olio</option>
							<option value="alfredo">Alfredo</option>
							<option value="bolognaise">Bolognaise</option>
							<option value="carbonara">Carbonara</option>
							<option value="marinara">Marinara</option>
							<option value="salted">Salted Egg</option>
						</optgroup>
					</select>
				</form>
			</div>
			<div id="foodtable">
			<p>Menu</p>
			<table align="center" id="menuTable">
				<?php
					include 'dbconnect.php';
					$j=0;

					if(isset($_POST['searchtype'])){
						if($_GET['action']=="search"){
							$searchtype = $_POST['searchtype'];
							if($searchtype == "all"){
								$_SESSION['query']= "select * from menu order by ID ASC";
							} else{
								$_SESSION['query']="select * from menu where menu_name LIKE '%$searchtype%'";
							}
						}
					}elseif (isset($_GET['action'])) {
						if($_GET['action']){
						$temp=$_SESSION['query'];
						$_SESSION['query']=$temp;
						}
					}else{
						$_SESSION['query'] = "select * from menu order by ID ASC";
					}

					$result = $dbcnx->query($_SESSION['query']);
					$num_results = $result->num_rows;

					while($j<$num_results){
					echo "<tr>";
					$i=0;
					while($j<$num_results && $i<3){
						$row = $result->fetch_assoc();
						$pic = $row['img_name'];
						$id = $row['ID'];
						$add = "add".$row['ID'];
						$drop = "drop".$row['ID'];
						$price = '$'.$row['menu_price'];
						$quota = "quota".$row['ID'];
					?>
						<td>
							<form method="post" action="updateitems.php">
								<div class='menuItem'>
									<ul class='foodItem'>
										<li><img src="<?php echo $pic;?>" width='230' height='105' style='vertical-align:middle'></li>
										<li class='nameandprice'><span class='itemName'><?php echo $row['menu_name'];?></span><span class='itemPrice'><?php echo $price;?></span></li>
										<li><input type="hidden" name="update_hidden_ID" value="<?php echo $row['ID'];?>"></li>
										<li><input type="hidden" name="update_hidden_qty" value="<?php echo $row['quantity'];?>"></li>
										<li><input type="hidden" name="update_hidden_name" value="<?php echo $row['menu_name'];?>"></li>
										<li><input type="hidden" name="update_hidden_price" value="<?php echo $row['menu_price'];?>"></li>
										<li><input type='submit' value='View Item' class='input-button' name='updateCart' id="addToCart"></li>
									</ul>
								</div>
							</form>
						</td>
						<?php
						$j++;
						$i++;}
						?>
					</tr>
					<?php
					}
				?>
			</table>
			</div>
		</div>
		<div id="rightContent">
			<form action="additems.php" method="post" id="addsubmit" > 
			<p>Add new Items</p>
			<table align="center" id="myCart">
				<thead>
					<tr><th colspan="3">Item Information</th></tr>
				</thead>
				<tbody>
					<tr><td><label for="addpasta">Pasta: </label></td>
						<td><input type="text" id ="addpasta" placeholder="Pasta Name" name="addpasta"></td>
					</tr>
					<tr><td><label for="addprice">Price: </label></td>
						<td><input type="text" id="addprice" placeholder="Price" name="addprice"></td>
					</tr>
					<tr><td><label for="addimg">Display Image: </label></td>
						<td><input type="text" id="addimg"  placeholder="Image Name" name="addimg"></td>
					</tr>
					<tr><td><label for="addqty">Quantity: </label></td>
						<td><input type="text" id="addqty" placeholder="Quantity" name="addqty"></td>
					</tr>
				</tbody>
				<tfoot>
					<tr><td colspan="3"><input type="submit" value="Add Items" class="input-button" id="checkout" name="checkout"></td>
				</tr>
				</tfoot>
			</table>
			</form>
			<?php
			if(isset($_SESSION['boolean3'])){
				if($_SESSION['boolean3'] == 'true'){
					echo '<script>alert("Item Successfully Added!");</script>';
				} else {
					echo '<script>alert("Item Cannot Be Added!");</script>';
				}
				unset($_SESSION['boolean3']);
			}
			?>
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