<?php

if (isset($_POST['sub'])){

$id = $_SESSION['eventid'];
$title= $_POST['title']; 
$location= $_POST['location'];  
$town= $_POST['town'];  
$county= $_POST['county']; 
$date= $_POST['datetime'];    
$start = $_POST['start'];
$end = $_POST['end'];
$comment = $_POST['comment'];
$capacity = $_POST['capacity'];

try{
    $pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   

$sql = "UPDATE event SET  title = :title, location = :location, town = :town, county = :county, date_time = :date, reg_start = :start, reg_end = :end, coment = :comment, capacity = :capacity WHERE eventid = :id";


    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id); 
    $stmt->bindValue(':title', $title); 
    $stmt->bindValue(':location', $location); 
    $stmt->bindValue(':town', $town); 
    $stmt->bindValue(':county', $county); 
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':start', $start);
    $stmt->bindValue(':end', $end);
    $stmt->bindValue(':comment', $comment);
    $stmt->bindValue(':capacity', $capacity);


	    $stmt->execute();
echo $id;
$count = $stmt->rowCount();

if ($count > 0)
{
echo "You just updated cEvent no: " . $_SESSION['eventid'] ."  click<a href='selectupdate.php'> here</a> to go back ";
}
else
{
echo "nothing updated";
}

} // end try 
catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}  // end catch 



} // end if isset 
else if (isset($_POST['del']))
include ("files_php/delete.php");

?>