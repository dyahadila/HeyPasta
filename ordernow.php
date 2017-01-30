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
			<form id="filter" method="post" action="ordernow.php?action=search">
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
						if($row['quantity']>0){ ?>
						<td>
							<form method="post" action="ordernow.php?action=add&id=<?php echo $row['ID'];?>">
								<div class='menuItem'>
									<ul class='foodItem'>
										<li><img src="<?php echo $pic;?>" width='230' height='105' style='vertical-align:middle'>
										</li>
										<li class='nameandprice'><span class='itemName'><?php echo $row['menu_name'];?></span><span class='itemPrice'><?php echo $price;?></span>
										</li>
										<li class='addanddrop'><button class='addItem' type='button' id="<?php echo $add;?>">+</button><input type='text' class='quota' value='0' name='quantity' id="<?php echo $quota;?>"><button class='dropItem' type='button' id="<?php echo $drop;?>" >-</button>
										</li>
										<li><input type="hidden" name="hidden_name" value="<?php echo $row['menu_name'];?>">
										</li>
										<li><input type="hidden" name="hidden_price" value="<?php echo $row['menu_price'];?>">
										</li>
										<li><input type='submit' value='Add to Cart' class='input-button' name='addToCart' id="addToCart">
										</li>
									</ul>
								</div>
							</form>
						</td>
						<script>
							var add<?php echo $id;?> = document.getElementById("add<?php echo $id;?>");
							var drop<?php echo $id;?> = document.getElementById("drop<?php echo $id;?>");
							var qty<?php echo $id;?> = document.getElementById("quota<?php echo $id;?>");
							if(add<?php echo $id;?> != null){
								add<?php echo $id;?>.onclick = function(){
									var temp = parseInt(qty<?php echo $id;?>.value);
									temp = temp+1;
									qty<?php echo $id;?>.value = temp;
								}
								drop<?php echo $id;?>.onclick = function(){
									var temp = parseInt(qty<?php echo $id;?>.value);
									if(temp-1>=0){
										temp = temp-1;
									} else{
										temp = 0;
									}
									qty<?php echo $id;?>.value = temp;
									}	
							}
						</script>

						<?php
						$i++;}
						$j++;}
						?>
					</tr>
					<?php
					}
				?>
			</table>
			</div>
		</div>
		<div id="rightContent">
			<p>My Cart</p>
			<table align="center" id="myCart">
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Quota</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($_POST['addToCart'])){
						$idx=intval($_GET['id']);
						$queryx = "select * from menu where ID='$idx'";
						$resultx=$dbcnx->query($queryx);
						$rowx=$resultx->fetch_assoc();
						
						if(isset($_SESSION['cart'])){
							$item_array_id = array_column($_SESSION['cart'], 'item_id');
							if(!in_array($_GET['id'], $item_array_id)){
								$count = count($_SESSION["cart"]);
								$item_array = array(
								'item_id' => $_GET['id'],
								'item_name' => $_POST['hidden_name'],
								'item_price' => $_POST['hidden_price'],
								'item_quantity' => $_POST['quantity']
								);
								$item_qty = intval($item_array['item_quantity']);
								if($item_array['item_quantity']>0 && $rowx['quantity'] >= $item_qty){
									$_SESSION['cart'][$count] = $item_array;
									echo "<script>window.location=\"ordernow.php\"</script>";
								} else if ($rowx['quantity'] < $item_qty){
									$qty_left = $rowx['quantity'];
									echo "<script>alert('Cannot add to cart, only ".$qty_left." Items Left!')</script>";
									echo "<script>window.location=\"ordernow.php\"</script>";
								}
							} else{
								echo "<script>alert(\"Item Already Added!\")</script>";
								echo "<script>window.location=\"ordernow.php\"</script>";
							}
						}
						 else{
							$item_array = array(
								'item_id' => $_GET['id'],
								'item_name' => $_POST['hidden_name'],
								'item_price' => $_POST['hidden_price'],
								'item_quantity' => $_POST['quantity']
								);
							$item_qty = intval($item_array['item_quantity']);
								if($item_array['item_quantity']>0 && $rowx['quantity'] > $item_qty){
									$_SESSION['cart'][0] = $item_array;
									echo "<script>window.location=\"ordernow.php\"</script>";
								} else if ($rowx['quantity'] < $item_qty){
									$qty_left = $rowx['quantity'];
									echo "<script>alert('Only ".$qty_left." Items Left!')</script>";
									echo "<script>window.location=\"ordernow.php\"</script>";
								}
						}
					}
					
					if(isset($_GET["action"])){
						if($_GET["action"] == "delete"){
							foreach($_SESSION["cart"] as $keys => $values){
								if($values["item_id"] == $_GET["id"]){
									unset($_SESSION["cart"][$keys]);
									$_SESSION["cart"] = array_values($_SESSION["cart"]);
								}
							}
						}
					}
					$total=0;
					if(!empty($_SESSION['cart'])){
						foreach($_SESSION['cart'] as $keys => $values){
								$total=$total+$values['item_price']*$values['item_quantity'];
				?>
				<tr>
				<td><?php echo $values['item_name']; ?></td>
				<td><?php echo $values['item_quantity'];?></td>
				<td><a href="ordernow.php?action=delete&id=<?php echo $values['item_id'];?>"><span class="removeitem">Remove</span></a></td>
				</tr>
				<?php }}
				?>
				<tr>
					<td colspan="3"><span id="total"><b>Total</b> : $ 
					<?php 
						echo $total;	
					?>	
					</span>
				</td>
				</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3"><input type="button" 
						<?php
						if(isset($_SESSION['valid_user']) && $total > 0){
							echo "onclick="."location.href="."'confirmorder.php'";
						} 
						else if(!isset($_SESSION['valid_user'])){
							echo 'onclick= "alert(\'Please Sign in before proceed\')"';
						}
						?>
						value="Checkout Items" class="input-button" id="checkout"/></td>
					</tr>
				</tfoot>
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
	<?php
	if(!isset($_SESSION['valid_user'])){
	?>
	<script src ="modal.js" type="text/javascript"></script>
	<?php
		}
	?>
	<script src="signUpValidator.js" type="text/javascript"></script>
</body>
</html>