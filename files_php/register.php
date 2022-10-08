<?php

if (isset($_SESSION['memberid']) && isset($_SESSION['eventid']) ) { 
$memberid = $_SESSION['memberid'];
$eventid = $_SESSION['eventid'];


try { 

 
    $pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
$sql = "INSERT INTO  attendance (memberid, eventid) VALUES (:memberid, :eventid)";

    
    $stmt = $pdo->prepare($sql);
    

    $stmt->bindValue(':memberid', $memberid);
    $stmt->bindValue(':eventid', $eventid);


    
	    $stmt->execute();

$count = $stmt->rowCount();
if ($count > 0)
echo "<h3>You have registered on the event</h3>";

 } 
catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
} 
}  else
echo "<h4>Wrong access</h4>";
 ?>

