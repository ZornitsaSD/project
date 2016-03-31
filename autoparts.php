<?php
include_once('includes/header.php');
?>

<?php
/*if (empty($_POST['submit'])) {*/
?>

<div id="main">
<?php
header('Content-Type: text/html; charset=utf-8');
echo "<p>";
echo "Търсене на авточасти по марка и модел на автомобила: ";
echo "</p>";
/*echo '<form action="autoparts.php" method="post">';

select_text('<p>', '', 'makes', 'Избери', 'Honda', 'Mazda', 'Mitsubishi', 'Nissan', 'Subaru', 'Suzuki', 'Toyota');
input_type(' ', '</P>', 'sb', 'submit', 'submit', 'Търсене', '');
echo '</form>';

if (!empty($_POST['submit'])) {

	$makes=$_POST['makes'];
}
	$make_model = array('Honda' => 'Honda Civic, Honda Stream, Honda CR-V',
				         'Mazda' => 'Mazda RX-8, Mazda 5, Mazda 6',
				         'Mitsubishi' => 'Mitsubishi Galant, Mitsubishi Challenger, Mitsubishi Pajero Pinin', 
				         'Nissan' => 'Nissan 300 zx, Nissan Almera tino, Nissan Micra',
				         'Subaru' => 'Subaru Forester, Subaru Impresa',
				         'Suzuki' => 'Suzuki Grand vitara, Suzuki Swift',
				         'Toyota' => 'Toyota Land cruiser, Toyota Celica, Toyota MR-2');	

	foreach ($make_model as $key => $value) {

		if ($makes == $value) {
			
		echo "<p>".$value.".</p>";	
		}		
	}*/
?>
<?php
if (!isset($_POST['submit'])) {
?>
<form action="autoparts.php" method="post">
		<select name="makes">
			<option value="1">Избери</option>
			<option value="Honda Civic">Honda Civic</option>
			<option value="Honda Stream">Honda Stream</option>
			<option value="Honda CR-V">Honda CR-V</option>
			<option value="Mazda RX-8">Mazda RX-8</option>
			<option value="Mazda 5">Mazda 5</option>
			<option value="Mazda 6">Mazda 6</option>
			<option value="Mitsubishi Galant">Mitsubishi Galant</option>	
			<option value="Mitsubishi Challenger">Mitsubishi Challenger</option>
			<option value="Mitsubishi Pajero Pinin">Mitsubishi Pajero Pinin</option>		
			<option value="Nissan 300zx">Nissan 300zx</option>
			<option value="Nissan Almera Tino">Nissan Almera Tino</option>
			<option value="Nissan Micra">Nissan Micra</option>
			<option value="Subaru Forester">Subaru Forester</option>
			<option value="Subaru Impreza">Subaru Impreza</option>
			<option value="Suzuki Grand vitara">Suzuki Grand vitara</option>
			<option value="Suzuki Swift">Suzuki Swift</option>
			<option value="Toyota Land cruiser">Toyota Land cruiser</option>
			<option value="Toyota Celica">Toyota Celica</option>
			<option value="Toyota MR-2">Toyota MR-2</option>
		</select>
		<input type="submit" name="submit" value="Избери">
	</form>
<?php
	} else {
	$makes = $_POST['makes'];
	$make_model = array('Honda Civic' => 
		'Honda Civic 2003 год., 1.6 бензин
		<table border=1>
		<tr><td>част</td><td>брой</td><td>цена, лв</td></tr>
		<tr><td>динамо</td><td>3</td><td>80</td></tr>
		<tr><td>стартер</td><td>2</td><td>70</td></tr>
		<tr><td>компресор климтик</td><td>1</td><td>100</td></tr>
		<tr><td>хидравлична помпа</td><td>1</td><td>70</td></tr>
		</table>',
						'Honda Stream' => '2001 год., 2.0 бензин',
				         'Honda CR-V' => '2003 год., 2.0 бензин',
				         'Mazda RX-8' => '2006 год., 2.6i бензин',
				         'Mazda 5' => '2009 год., 1.8 бензин',
				         'Mazda 6' => '2006 год., 2.0 дизел',
				         'Mitsubishi Galant' => '2001, 2.5 V6 бензин',
				         'Mitsubishi Challenger' => '1999, 3.0 бензин',
				         'Mitsubishi Pajero Pinin' => '2000, 1.8 GDI',   
				         'Nissan 300zx' => '1998, 3.0 бензин',
				         'Nissan Almera Tino' => '2001, 1.8 бензин',
				         'Nissan Micra' => '2004, 1.2i бензин',
				         'Subaru Forester' => '1999,  2.0 турбо, бензин',
				         'Subaru Impreza' => '1998 год., 2.0 турбо, бензин',
				         'Suzuki Grand vitara' => '2003 год., 2.0 16V бензин',
				         'Suzuki Swift' => '2008 год., 1.5 бензин',
				         'Toyota Land cruiser' => '1998, 3.0 TDI',
				         'Toyota Celica' => '2005, 1.8 VVTI бензин',
				         'Toyota MR-2' => '2001, 1.8 VVTI бензин');	

	foreach ($make_model as $key => $value) {
		if ($makes == $key) {	
		echo "<p>".$value.".</p>";	
		} 		
	}
}
?>
</div>

<?php
include_once('includes/footer.php');
?>