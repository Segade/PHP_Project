<?php try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM event'; 
$result = $pdo->query($sql); 
 
while ($row = $result->fetch()) { 
$piece = explode(" ", $row['date_time']);
$piece2 = explode("-", $piece[0]);
$date = $piece2[2] . "/" . $piece2[1] . "/" . $piece2[0];
$id = $row['eventid'];

      echo "<table> <tr> <th> Date </th> <th> Title </th> <th> Town </th> </tr> <tr> <td>".
 $date . "</td> <td> <a href=index.php?page=event&id=".  $id . ">"  . $row['title'] . "</a></td> <td>" . $row['town'] . "</td> </tr> </table> <br>  <br>";
 
} // end while 
 

} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
?>