
<form action="index.php?page=upmem" method="post">
<input type="hidden" name="id" value="<?php echo $row['memberid']; ?>" >
Name: <input type="text" name="name" title="name" value="<?php echo $row['name']; ?>" >
<br>
Surname: <input type="text" name="surname" title="surname" value="<?php echo $row['surname']; ?>" >
<br>
Password: <input type="password" name="password" title="password">
<br>
Gender: Male<input type="radio" name="gender" value="M" title="male" 
<?php if ($row['gender'] == 'M')
echo "checked"; ?>
>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Female<input type="radio" name="gender" value="F" title="female" 
<?php if ($row['gender'] == 'F')
echo "checked"; ?>
>
<br>
Address: <input type="text" name="address" title="address" value="<?php echo $row['address']; ?>" >
<br>
Town: <input type="text" name="town" title="town" value="<?php echo $row['town']; ?>" >
<br>
County: <input type="text" name="county" title="county" value="<?php echo $row['county']; ?>" >
<br>
Phone: <input type="text" name="phone" title="phone" value="<?php echo $row['phone']; ?>" >
<br>
Email: <input type="text" name="email" title="email" value="<?php echo $row['email']; ?>">
<br>
Date of Birth: <select name="day" title="day">
<option value="day"> Day </option>
<?php 
 
for (  $x=1;$x<32;$x++){
echo "<option value=". $x ;
if ($x == $date[2])
echo " selected";

echo  ">" . $x . "</option>";

}
?>
</select>
/
<select name="month" title="month">
<option value="month"> MOnth </option>
<?php 
for ($x=1;$x<13;$x++){
echo "<option value=". $x ;
if ($x == $date[1])
echo " selected";

echo  ">" . $x . "</option>";

}
?>
</select>
/
<select name="year" title="year">
<option value="year"> Year </option>
<?php 
for ($x=2021;$x>1920;$x--){

echo "<option value=" . $x ;
if ($x == $date[0])
echo " selected";
echo ">" . $x . "</option>";

}
?>
</select>


<input type="submit" value="Update" name="sub">
</form>
<br> <br>

<h3> <a href="index.php?page=out">Log out</a> </h3>
