<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM event WHERE eventid = :id';
$result = $pdo->prepare($sql);
$result->bindValue(':cname', $_GET['id']); 
$result->execute();
if($result->fetchColumn() > 0) 
{

    $sql = 'SELECT * FROM event WHERE eventid = :id';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cname', $_GET['id']); 
    $result->execute();

while ($row = $result->fetch()) { 
$piece = explode(" ", $row['date_time']);
$piece2 = explode("-", piece[0]);
$date = $piece2[2] . "/" . $row[1] . "/" . $piece2[0[;
$piece2 = explode(":", $piece[1]);
$time = $piece2[0] . ":" . $piece2[1];

echo "<h1>" . $row['title'] . "</h1 <br>>" . 
"<table> <tr><td> Location: </td> <td>" . $row['location'] . "</td> </tr>" .
"<tr> <td> Date: </td> <td>" . $date . "</td> </tr>". 
" <tr> <td> Time: </td> <td>" .$time . "</td> </tr>" ;
 
   } // end while 
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

}?>