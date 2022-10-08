<?php   session_start(); ?><!DOCTYPE html>
<html lang="en">    

<head>
<title>
Registration
</title>
<meta charset='utf-8'>
<meta name="author" content="Ivan Segade Carou">
<LINK REL=StyleSheet HREF="CSS/estilos.css" TYPE="text/css" >

<meta name="keywords" content="B&B, bed, accomodation, Praia Aguieira, Porto do Son, Barbanza, Galicia, Espana, Spain, breakfast, holiday, airport Santiago de Compostela, golf, surfing, fishing, beach">
<meta name="description" content="Stylish B&B on Praia Aguieira, Galicia, Spain">




<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="icon" type="image/png" sizes="16x16" href="ms-icon-144x144.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff"> 
<!-- end favicon-->


   
  </head>

  <body>
<div class="container"> 
<header> 
<div class="logo">     
 
<picture>
  <source media="(min-width:769px)" srcset="images/logo_pc.jpg">
  <source media="(min-width:577px)" srcset="images/logo_tablet.jpg"> 
  <img src="images/logo_sm_phone.jpg" alt="logo, an olive tree branch"> 
</picture> 
</div>

<div class="property">   
<h1> 
Registration
</h1> 

<div class="menu">
<nav>
<ul class="menuli">
<li><a href="index.php">HOME </a> </li>
<li><a href="index.php?page=login"> LOGIN </a> </li>
<li><a href="index.php?page=singup"> SIGN UP </a>  </li>
 
<li><a href="index.php?page=addevent">ADD EVENT </a>  </li>
<li><a href="index.php?page=eventacc"> MANAGE EVENT </a>  </li>
 

</ul>
</nav>
</div> <!-- menu -->


</div> <!-- property -->



</header>

<div class="content">
<div class="main">
<?php
		if(isset($_GET["page"])){ 
	$oper=$_GET["page"];

switch($oper)
{
case 'singup': include("files_php/singup.php");
break;

case "login": include("files_php/login.php");
break;

case "addevent": include("files_php/addevent.php");
break;

case "event": include("files_php/event.php");
break;

case "upmem": include ("files_php/upmem.php");
break;

case 'reg' : include ("files_php/reg_event.php");
break;

case "out": include ("files_php/logout.php");
break;

case "addreg" : include ("files_php/register.php");
break;

case "delreg" : include ("files_php/registerdel.php");
break;

case "eventlist" : include ("files_php/eventlist.php");
break;

case "eventacc" : include ("files_php/eventacc.php");
break;

case "eventup": include ("files_php/eventup.php");
break;

case "eventdel": include ("files_php/eventdel.php");
break;

default : include("files_php/events.php");
}// end switch 
} else 
include("files_php/events.php");
 ?>
</div> <!-- main -->

</div> <!-- content -->

 
<footer>
<div class="foot_text">
<p> 
Address: <span class="casa">Casa Oliveira</span>, Praia Aguieira, Porto do Son, 
<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
A Coru&ntilde;a, Espa&ntilde;a 15345.
<br>
Proprietor: Ivan Segade Carou
 
</p>
</div>

<div class="foot_flag">
<p>
Phone: +34981133487 
<br>
Mobile: +34676027830 
<br>
Email: <a href="mailto:info@casaoliveira.gal?cc=ivan.segadecarou@students.ittralee.ie&Subject=Contact%20WebPage%20request">info@casaoliveira.gal</a>
</p>
 </div>

 </footer>
 
 </div>
</body>
</html> 
<?php
$pdo = null;
$stmt = null;
?>