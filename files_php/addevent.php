<?php

if (isset($_POST['sub'])) {                   
try { 
$title= $_POST['title']; 
$location= $_POST['location'];  
$town= $_POST['town'];  
$county= $_POST['county']; 
$date= $_POST['datetime'];    
$start = $_POST['start'];
$end = $_POST['end'];
$comment = $_POST['comment'];
$capacity = $_POST['capacity'];
//$eventid = $_POST['id']; 
 
 
 
    $pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO event ( title, location, town, county, date_time, reg_start, reg_end, coment, capacity) VALUES( :title, :location, :town, :county, :date, :start, :end, :comment, :capacity)";
    
    $stmt = $pdo->prepare($sql);
    

    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':location', $location);
    $stmt->bindValue(':town', $town);
    $stmt->bindValue(':county', $county );
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':start', $start);
    $stmt->bindValue(':end', $end);
    $stmt->bindValue(':comment', $comment);
    $stmt->bindValue(':capacity', $capacity);

    
	    $stmt->execute();

$count = $stmt->rowCount();
if ($count > 0)
Echo "<h3>Event added successfuly</h3>";
else 
echo "<h3>Somethign was wrong</h3>";

 } 
catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
} 

}  else{
$id = "";
$title = "";
$location =  "";
$town =  "";
$county =  "";
$date_time =  "";
$start =  "";
$end =  "";
$coment =  "";
$capacity =  "";
$enable = "";

 include ('files_php/form_add_event.html' );

} // end if isset sub
 ?>

