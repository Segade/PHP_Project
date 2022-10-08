<?php
$correct = "";

if (isset($_POST['name'])){
$value = $_POST['name'];
if ( is_numeric ($value) || strlen($value)<3 || strlen($value)>30)
 $correct .= "<li>Enter a vlaid name</li>";
} else 
$correct .= "<li>Enter your name</li>";

if (isset($_POST['surname'])){
$value = $_POST['surname'];
if ( is_numeric ($value) || strlen($value)<3 || strlen($value)>30)
$correct .= "<li>Enter a valid surname</li>";
} else 
$correct .= "<li>Enter your surname</li";
 
if (isset($_POST['password'])){
$value = $_POST['password'];
if (  strlen($value)<8 || strlen($value)>30)
$correct .= "<li>Enter a password between 8 end 30 characters</li>";
}else
$correct .= "</li>Enter a password</li>";

if (isset($_POST['address'])){
$value = $_POST['address'];
if ( is_numeric ($value) || strlen($value)<3 || strlen($value)>30)
$correct .= "<li>Enter a valid address</li>";
}else 
$correct .= "<li>Enter your address</li>";

if (isset($_POST['town'])){
$value = $_POST['town'];
if ( is_numeric ($value) || strlen($value)<3 || strlen($value)>30)
$correct .= "<li>Enter a valid town</li>";
}else 
$correct .= "<li>Enter your town</li>";

if (isset($_POST['county'])){
$value = $_POST['county'];
if ( is_numeric ($value) || strlen($value)<3 || strlen($value)>30)
$correct .= "<li>Enter a valid county</li>";
}else 
$correct .= "<li>Enter your county</li>";

$pass = false; 
if (!is_numeric($_POST['day']))
{
$correct .= "<li>Choose a day</li>";
$pass = true;
}
 
if (!is_numeric($_POST['month']))
{
$correct .= "<li>Choose a month</li>";
$pass = true;
}
 
if (!is_numeric($_POST['year']))
{
$correct .= "<li>Choose a year</li>";
$pass = true;
}

if (!$pass)
if (!checkdate($_POST['month'], $_POST['day'], $_POST['year']))
$correct .= "<li>Enter a valid date</li>";

if (isset($_POST['phone'])){
$value = $_POST['phone'];
if (strlen($value) != 10 || !is_numeric ($value)) 
$correct .= "<li>Enter a valid phone number</li>";
}else
$correct .= "<li>Enter a phone number</li>";


if (isset($_POST['email'])){
$value = $_POST['email'];
if (check_email($value) == 0)
$correct .= "<li>Enter a valid Email</li>";
}else 
$correct .= "<li>Enter an Email</li>";


// functions 

function check_email($email){

    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminaci�n del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if ($mail_correcto)
       return 1;
    else
       return 0;
} // fin da funcion comprobar_email.
 

function existsemail(String $email){
$pass = false;

try { 
 
$pdo = new PDO('mysql:host=localhost;dbname=noticeboard; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT count(*) FROM member WHERE email = :email  ';

$result = $pdo->prepare($sql);
$result->bindValue(':email', $email); 
 

$result->execute();
if($result->fetchColumn() > 0) 
{
  
$pass = true;
 
}
 
} 
catch (PDOException $e) { 
$output = "Unable to connect to the database server: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine(); 

} 
return $pass;
} // end function exists email
?>