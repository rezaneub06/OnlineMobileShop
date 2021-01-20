<?php include ( "../inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
}
if (isset($_REQUEST['pid'])) {
	
	$pid = mysqli_real_escape_string($con,$_REQUEST['pid']);
}else {
	header('location: index.php');
}


$getposts = mysqli_query($con,"SELECT * FROM products WHERE id ='$pid'") or die(mysqli_error());
					if (mysqli_num_rows($getposts)) {
						$row = mysqli_fetch_assoc($getposts);
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$piece=$row['piece'];
						$description = $row['description'];
						$picture = $row['picture'];
						$item = $row['item'];
						$available =$row['available'];
					}	


if (isset($_POST['addcart'])) {
	$getposts = mysqli_query($con,"SELECT * FROM cart WHERE pid ='$pid' AND uid='$user'") or die(mysqli_error());
	if (mysqli_num_rows($getposts)) {
		header('location: ../mycart.php?uid='.$user.'');
	}else{
		if(mysqli_query($con,"INSERT INTO cart (uid,pid,quantity) VALUES ('$user','$pid', 1)")){
			header('location: ../mycart.php?uid='.$user.'');
		}else{
			header('location: index.php');
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View-Prod</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include ( "../inc/mainheader.inc.php" ); ?>
	<div class="categolis">
		<table>
			<tr>
				<th>
					<a href="samsung.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;">Samsung</a>
				</th>
				<th><a href="pixel.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">goolePixel</a></th>
				<th><a href="apple.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Apple</a></th>
				<th><a href="htc.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">HTC</a></th>
				<th><a href="huawei.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Huawei</a></th>
				<th><a href="lenoo.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Lenovo</a></th>
				<th><a href="sony.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Sony</a></th>
				<th><a href="nokia.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Nokia</a></th>
			</tr>
		</table>
	</div>
	<div style="margin: 0 97px; padding: 10px">

		<?php 
			echo '
				<div style="float: left;">
				<div>
					<img src="../image/product/'.$item.'/'.$picture.'" style="height: 500px; width: 500px; padding: 2px; border: 2px solid #c7587e;">
				</div>
				</div>
				<div style="float: right;width: 40%;color: #067165;background-color: #ddd;padding: 10px;">
					<div style="">
						<h3 style="font-size: 25px; font-weight: bold; ">'.$pName.'</h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 20px;">Price: '.$price.'Php</h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 22px; ">Pieces:'.$piece.'</h3>
						<h3 style="padding: 20px 0 0 0; font-size: 22px; ">Description:</h3>
						<p>
							'.$description.'
						</p>

						<div>
							<h3 style="padding: 20px 0 5px 0; font-size: 20px;">Want to buy this product? </h3>
							<div id="srcheader">
								<form id="" method="post" action="">
								        <input type="submit" name="addcart" value="Add to cart" class="srcbutton" >
								</form><br/>
								<form id="" method="post" action="../orderform.php?poid='.$pid.'">
								        <input type="submit" value="Order Now" class="srcbutton" >
								</form>
								<div class="srcclear"></div>
							</div>
						</div>

					</div>
				</div>

			';
		?>

	</div>
</body>
</html>