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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Huawei</title>
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
				<th><a href="lenovo.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Lenovo</a></th>
				<th><a href="sony.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Sony</a></th>
				<th><a href="nokia.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Nokia</a></th>
			</tr>
		</table>
	</div>
	<div style="padding: 15px 0px; font-size: 15px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php 
			$getposts = mysqli_query($con,"SELECT * FROM products WHERE available >='1' AND item ='Huawei'  ORDER BY id DESC LIMIT 10") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
										<img src="../image/product/Huawei/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: '.$price.' Taka</div>
									</div>
									
								</li>
							</ul>
						';

						}
				}
		?>
			
		</div>
	</div>
</body>
</html>