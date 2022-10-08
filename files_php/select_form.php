<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT count(*) FROM member WHERE eemail = :email AND password = :psw';

$result = $pdo->prepare($sql);
$result->bindValue(':email', $_POST['email']); 
$result->bindValue(':psw', $_POST['password']); 

$result->execute();
if($result->fetchColumn() > 0) 
{

$sql = 'SELECT * FROM member WHERE eemail = :email AND password = :psw';

    $result = $pdo->prepare($sql);

$result->bindValue(':email', $_POST['email']); 
$result->bindValue(':psw', $_POST['password']); 


    $result->execute();

 $row = $result->fetch();
 
 include ("files_php/form_login.php"); 
 
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

}?>