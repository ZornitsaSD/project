
<?php
//date_default_timezone_set('Europe/Sofia');
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');

if(!empty($_GET)) {
	$id_part= $_GET['id'];
} 

echo '<pre>';
print_r($_FILES);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="jquery-1.11.3.min.js"></script>
</head>
<body>
	<form method="post" action="img1.php" enctype="multipart/form-data">
		<input type="hidden" name="id_part" value="<?php  if (isset ($id_part)){ echo $id_part; }?>">
		<label for="ph">изберете снимка</label>
		<input type="file" name="photo" id="ph">
		<input type="submit" name="submit" value="запиши" >
	</form>
	<?php
	
						if (isset($_POST['submit'])) {
							$id_part = $_POST['id_part'];
							//$date1 	= date('Y-m-d');
							//$time1  = date('H:i:s');
							date_default_timezone_set('Europe/Sofia');
							$today = date("j-F-Y, g:i a");
		
							if(!empty($_FILES))		{	
								$file_name = $_FILES['photo']['name'];
								$tmp_name = $_FILES['photo']['tmp_name'];
								$file_size = $_FILES['photo']['size'];
								$file_type = $_FILES['photo']['type'];
								
								$content = addslashes(file_get_contents($tmp_name));
//insering picture into the
								$q = "UPDATE `parts` 
								SET `photo`='$content',
									`name_photo`='$file_name',
									`type_photo`='$file_type',
									`size_photo`='$file_size',
									`date`='$today'
								WHERE `id_part` = $id_part";
								if (mysqli_query($conn, $q)) {
									echo "<p>Успешно записахте снимка на частта</p>";
									$q = "SELECT `photo` FROM `parts` WHERE id_part = $id_part";
									$result = mysqli_query($conn, $q);
									$row = mysqli_fetch_assoc($result);
									echo "<p><a href='read.php'>Read DB</a></p>";
									//echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
								} else {
									echo "Опитайте отново!";
								}
							}
							
						}
						
						//MIME (Multipurpose Internet Mail Extensions)
			
						?>
						<!--<a href="update_img1.php?id=<?php echo $id_part;?>">променете снимката</a>!-->			
					</body>
					</html>
			