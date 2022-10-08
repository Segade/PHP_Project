<?php 
if (isset($_POST['sub'])){

include ("files_php/validator.php");
if ($correct == ""){ 
$_SESSION['psw'] = $_POST['password'];
$_SESSION['email'] = $_POST['email'];
try { 

$id = $_POST['id'];
$name= $_POST['name']; 
$surname= $_POST['surname'];  
$psw = $_POST['password'];
$address = $_POST['address'];
$town= $_POST['town'];  
$county= $_POST['county']; 
$email = $_POST['email'];
$phone = $_POST['phone'];
if ($_POST['day'] < 10)
$day = "0" . $_POST['day'];
else
$day = $_POST['day'];

if ($_POST['month'] < 10)
$month = "0" . $_POST['month'];
else
	$month = "0" . $_POST['month'];

$dob = $_POST['year'] . "-" . $month . "-" . $day;
  echo "".$name. " " . $surname . " ". $address . " " . $psw . " " . $town . " " . $county . " ". $phone . " " . $email . " " . $dob . "<br";
 
    $pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "UPDATE member SET  name = :name, surname = :surname, password = :psw, address = :address, town = :town, county= :county, phone = :phone,  email = :email, dob = :dob WHERE memberid = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $id); 
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':psw', $psw);
    $stmt->bindValue(':address', $address );
    $stmt->bindValue(':town', $town);
    $stmt->bindValue(':county', $county);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':dob', $dob);

    
	    $stmt->execute();

$count = $stmt->rowCount();
if ($count > 0)
{
echo "You just updated customer no: " . $_POST['id'] ."  click<a href='selectupdate.php'> here</a> to go back ";
}
else
{
echo "nothing updated";
}
 
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
 echo "you are not logged in";
