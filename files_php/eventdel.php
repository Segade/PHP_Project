<?php
if (!isset($_POST['sub']))
{
?>
<form action="index.php?page=eventdel" method="POST">
Event ID: <input type="numeric" name="eventid" title="event ID">
<br>
<input type="submit" name="sub" value="Delete">
</form>

<?php
} else { // if isset sub

include ("files_php/delete.php"); 

} // end if isset sub
?>