<?php
if (isset($_SESSION['memberid']))
{
$email = $_SESSION['email'];
$psw =$_SESSION['psw'] ;
} else {
$email = $_POST['email'];
$psw = $_POST['password'];
}



try { 
 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT count(*) FROM member WHERE email = :email AND password = :psw';

$result = $pdo->prepare($sql);
$result->bindValue(':email', $email); 
$result->bindValue(':psw', $psw); 

$result->execute();
if($result->fetchColumn() > 0) 
{

$sql = 'SELECT * FROM member WHERE email = :email AND password = :psw';
//echo "". $_POST['email'] . " " . $_POST['password'];
    $result = $pdo->prepare($sql);

$result->bindValue(':email', $email); 
$result->bindValue(':psw', $psw); 


    $result->execute();

 $row = $result->fetch();
$_SESSION['memberid'] = $row['memberid']; ;
$_SESSION['email'] = $row['email']; ;
$_SESSION['psw'] = $row['password']; ;
$date = explode ("-",$row['dob']);
 
 include ("files_php/form_login.php"); 
 
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

}?>