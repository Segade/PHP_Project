<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT COUNT(*) FROM member m JOIN attendance a ON m.memberid = a.memberid WHERE a.eventid = :id';
$result = $pdo->prepare($sql);
$result->bindValue(':id', $_GET['id']); 
$result->execute();

if($result->fetchColumn() > 0) 
{

$sql = 'SELECT * FROM member m JOIN attendance a ON m.memberid = a.memberid WHERE a.eventid = :id';

    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $_GET['id']); 
    $result->execute();
 
echo "<table> <tr> <th>Name & surname</th> <th>Town</th> <th>County</th> </tr>";  

while ($row = $result->fetch()) { 

 echo "<tr> <td>" . $row['name'] . ", " . $row['surname'] . "</td> <td>" . $row['town'] . "</td> <td>" . $row['county'] . "</td> </tr>";
 
   } // end while 

echo "</table>";

} // if fetch 
else {
      print "No rows matched the query."; 
    }} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

}?>