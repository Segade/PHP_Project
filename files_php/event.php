<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM event WHERE eventid = :id';
$result = $pdo->prepare($sql);
$result->bindValue(':id', $_GET['id']); 
$result->execute();
if($result->fetchColumn() > 0) 
{

    $sql = 'SELECT * FROM event WHERE eventid = :id';
    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $_GET['id']); 
    $result->execute();

// 9999 
 

$sql_2 = 'SELECT count(*) FROM attendance WHERE eventid = :id';

$result_2 = $pdo->prepare($sql_2);
$result_2->bindValue(':id', $_GET['id']); 
 $result_2->execute();
 
 
 
$total =  $result_2->fetchColumn() ;
 echo "total: ". $total[0];

//9999
while ($row = $result->fetch()) { 
include ("files_php/explode_dates.php");
$capacity = $row['capacity'];
echo "<h1>" . $row['title'] . "</h1> <br>" . 
 "<table>".
"<tr><td> Town: </td> <td>" . $row['town'] . "</td> </tr>" .
"<tr><td> County: </td> <td>" . $row['county'] . "</td> </tr>" ."<tr> <td> Date: </td> <td>" . $date . "</td> </tr>". 
"<tr> <td> Date: </td> <td>" . $date . "</td> </tr>". 
" <tr> <td> Time: </td> <td>" .$time . "</td> </tr>" .
 "<tr><td> Starting registration: </td> <td>" . $row['reg_start'] . "</td> </tr>" .
 "<tr><td> Ending registration: </td> <td>" . $row['reg_end'] . "</td> </tr>" .
   "<tr> <td>Capacity: " . $row['capacity'] . " </td> <td><a href=index.php?page=eventlist&id=". $_GET['id'] . ">" . $total[0]   . " registered </a></td> </tr>";
 echo "</table>";
 
   } // end while 
 
 
if ($capacity != $total[0])
{
if (isset($_SESSION['memberid']))
{
include ("files_php/check_attendance.php");

if (!$register)
echo "<h4><a href=index.php?page=addreg>REGISTER</a></h4>" ;
else
echo "You are already registerd on this event. If you want to unregister, clik<br>" .
"<h4><a href=index.php?page=delreg>UNREGISTER</A></H4>";
}else  // if session member id 
echo "<h4>You must be logged in to register</h4>";

} else { // if capacity
echo "This event is full";
} // if capacity

} // if fetch 
else {
      print "No rows matched the query.";
    }


} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

}?>