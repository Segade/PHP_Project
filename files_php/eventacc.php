<?php
if (!isset($_POST['sub']))
{
?>
<form action="index.php?page=eventacc" method="POST">
Event ID: <input type="text" name="eventid" title="event ID">
<br>
<input type="submit" name="sub" value="Access">
</form>

<?php
} else { // if isset sub
 
try { 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM event WHERE eventid = :id';
$result = $pdo->prepare($sql);
$result->bindValue(':id', $_POST['eventid']); 
$result->execute();
if($result->fetchColumn() > 0) 
{

    $sql = 'SELECT * FROM event WHERE eventid = :id';
    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $_POST['eventid']); 
    $result->execute();
$_SESSION['eventid'] = $_POST['eventid'];;
 while ($row = $result->fetch()) { 

$title = $row['title'];
$location = $row['location'];
$town = $row['town'];
$county = $row['county'];
$date_time = $row['date_time'];
$start = $row['reg_start'];
$end = $row['reg_end'];
$coment = $row['coment'];
$capacity = $row['capacity'];


include ("files_php/form_managevent.php");
echo "  " . $title . "   " . $town; 
 
   } // end while 

 

} // if fetch 
else {
      print "No rows matched the query.";
    }


} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 
}


 

} // end if isset sub
?>