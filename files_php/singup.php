<?php 
if (isset($_POST['sub'])){
$_SESSION['memberid'] = 0;
include ("files_php/validator.php");
if (existsemail($_POST['email']))
$correct = "<li>Your email is already being used, Choose another email</li>";
if ($correct == ""){ 
try { 

$name = $_POST['name'];
$surname= $_POST['surname'];  
$psw = $_POST['password'];
$address = $_POST['address'];
$town= $_POST['town'];  
$county= $_POST['county']; 
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

if ($_POST['day'] < 10)
$day = "0" . $_POST['day'];
else
$day = $_POST['day'];

if ($_POST['month'] < 10)
$month = "0" . $_POST['month'];
else
	$month = "0" . $_POST['month'];

$dob = $_POST['year'] . "-" . $month . "-" . $day;

 
    $pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
echo "success <br>";        
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO member (name, surname, password, address, town, county, phone, email, dob, gender) VALUES (:name, :surname, :psw, :address, :town, :county, :phone, :email, :dob, :gender)";

    $stmt = $pdo->prepare($sql);

//    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':psw', $psw);
    $stmt->bindValue(':address', $address );
    $stmt->bindValue(':town', $town);
    $stmt->bindValue(':county', $county);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':dob', $dob);
    $stmt->bindValue(':gender', $gender);
    
	    $stmt->execute();

getMemberID($email, $psw);

  echo "Name:".$name. " " . $surname . "<br>Address: ". $address . "<br>Town: " . $town . "<br>County: " . $county . "<br>Phone: ". $phone . "<br>Email: " . $email . "<br>DOB: " . $dob . "<br";
 } 
catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}  // end try 

 } else  // if correct == ""
 echo "<ul>" .$correct . "</ul>
<p align=center> [ <a href=\"javascript:history.go(-1)\">Back to the Form</a> ]  </p>
";

} else // if isset 
 include ("files_php/form_singup.html");
// ------

function getMemberID(String $email, String $psw){


try { 
 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT count(*) FROM member WHERE email = :email AND password = :psw';

$result = $pdo->prepare($sql);
$result->bindValue(':email', $email); 
$result->bindValue(':psw', $psw); 

$result->execute();
if($result->fetchColumn() > 0) 
{

$sql = 'SELECT * FROM member WHERE email = :email AND password = :psw';
//echo "". $_POST['email'] . " " . $_POST['password'];
    $result = $pdo->prepare($sql);

$result->bindValue(':email', $email); 
$result->bindValue(':psw', $psw); 


    $result->execute();

 $row = $result->fetch();
$_SESSION['memberid'] = $row['memberid'];  
$_SESSION['email'] = $row['email']; ;
$_SESSION['psw'] = $row['password']; ;
//echo"<br> session:".  $_SESSION['memberid'] . "   " . $_SESSION['email'] . "   " . $_SESSION['psw'];
 
 
 
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

} 

} // end function get member ID 