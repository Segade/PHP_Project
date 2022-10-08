<?php
$_SESSION['eventid'] = $_GET['id'];
try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM attendance WHERE eventid = :id AND memberid = :memberid';
$result = $pdo->prepare($sql);
$result->bindValue(':id', $_GET['id']); 
$result->bindValue(':memberid', $_SESSION['memberid']); 

$result->execute();
if($result->fetchColumn() > 0) 
{
$register = true;
 
} // if fetch > 0
else {
$register = false;
    }} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

}?>