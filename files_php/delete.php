<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM attendance WHERE eventid = :id';
$result = $pdo->prepare($sql);
$result->bindValue(':id', $_SESSION['eventid']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
echo "<h3>you cannot delete this event because there are already people registerd</h3>";


} // if fetch 
else {
$sql = "DELETE FROM event WHERE eventid = :id";
$result = $pdo->prepare($sql);

$result->bindValue(':id', $_SESSION['eventid']); 
$result->execute();

$count = $result->rowCount();
if ($count > 0)
echo "You have deleted the event" . $_SESSION['eventid'];


    } // end if if fetch 


} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

}?>