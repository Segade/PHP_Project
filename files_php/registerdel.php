<?php
$memberid = $_SESSION['memberid'];
$eventid = $_SESSION['eventid'];

try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM attendance WHERE memberid = :memberid AND eventid = :eventid';

$result = $pdo->prepare($sql);

$result->bindValue(':memberid', $memberid); 
$result->bindValue(':eventid', $eventid); 

$result->execute();


$count = $result->rowCount();
if ($count > 0)
echo "<h4>You have just unregisterd from the event</h4>";
else 
echo "<h4>Noone has been unregisterd from the list</h4>";


} 

catch (PDOException $e) { 
if ($e->getCode() == 23000) {
          echo "ooops couldnt delete as that record is linked to other tables click<a href='deleteform.html'> here</a> to go back ";
     }
} 
?>
