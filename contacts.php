<?php
include_once('includes/header.php');
?>
<div id="main">
<?php  
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($action=="")    /* display the contact form */
    {
    ?>
    <legend class="text-center header">За връзка с нас</legend>
    <legend class="text-center header">gsm: 0888776655</legend>
    <legend class="text-center header">email: cbr400rrbulgaria@abv.bg</legend>

 <div class="well span6" align="center">
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Име *:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Email *:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Телефон *:<br>
    <input name="email" type="text" value="" size="30"/><br>
    Съобщение*:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>

    <input type="submit" value="Изпрати"/>
    </form>

</div>
    <?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
       {
        echo "<h3>Задължителните полета не са попълнени !
        <p> Моля опитайте отново !</p><a href=\"\">Назад</a><h3>";
        }
    else{        
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
        mail("youremail@yoursite.com", $subject, $message, $from);
        echo "<p><h3>Благодарим ви за изпратеното запитване!</p>
        <p>Ще отговорим възможно най-бързо !</p></h3>";
        }
    } 
   
?> 