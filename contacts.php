
<?php
include_once('includes/header.php');
?>

<div id="main">
<?php

if (empty($_POST['submit'])) {
	
echo "<div id='reg'><h3>За връзка с нас:</h3>
<p>gsm: 0888776655</p>
<p>email: cbr400rrbulgaria@abv.bg</p></div>";

echo "<span id='contact'><form action='contacts.php method='post'>";
input_type('<p>','</p>', 'fn','text', 'first_name ', '','Име* ');
input_type('<p>','</p>', 'em', 'text', 'email', '', 'Email* ');
input_type('<p>','</p>','tel', 'text', 'telefon', '', 'Телефон ');
input_text('<p>', '</p>', 'Съобщение* ', 'message', '');
input_type('<p>','</p>','sub', 'submit', 'submit', 'Изпрати', '');
echo "</form></span>";

}
else{
	$first_name = $_POST['first_name'];
	$email = $_POST['email'];
	$telefon = $_POST['telefon'];

	
}
?>
</div>

<?php
include_once('includes/footer.php');
?>