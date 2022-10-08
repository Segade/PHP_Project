<?php
if (isset($_SESSION['memberid'] ))
{
echo "you are logged in " . $_SESSION['memberid'];
 
include ("files_php/select_login.php");
}else
if (!isset($_POST['sub'])){
?>
<form action="index.php?page=login" method="post">

Email: <input type="text" name="email" title="email">
<br>
Password: <input type="password" name="password" title="password">
<br>
<input type="submit" value="login" name="sub">
</form>
<?php
} else{ // if isset post sub 
include ("files_php/select_login.php");
}
?>
