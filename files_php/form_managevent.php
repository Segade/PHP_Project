 
 
<form action="index.php?page=eventup" method="post">
title: <input type="text" name="title" title="title" value="<?php echo $title;  ?>">
<br>
Location : <input type="text" name="location" title="location" value="<?php echo $location;  ?>" >
<br>
Town: <input type="text" name="town" title="town"  value="<?php echo $town;  ?>">
<br>
County: <input type="text" name="county" title="county"  value="<?php echo $county;  ?>">
<br>
Date time: <input type="text" name="datetime" title="date time"  value="<?php echo $date_time;  ?>">
<br>
Starting Registration : <input type="text" name="start" title="starting registration" value="<?php echo $start;  ?>">
<br>
ending Registration : <input type="text" name="end" title="ending registration"  value="<?php echo $end;  ?>">
<br>
Comment: <input type="text" name="comment" title="comment"  value="<?php echo $coment;  ?>">
<br>
Capacity: <input type="text" name="capacity" title="capacity"  value="<?php echo $capacity;  ?>" >
<br>

<input type="submit" name="sub" value="Update">
<br>
<input type="submit" name="del" value="Delete">

 </form>
 
 