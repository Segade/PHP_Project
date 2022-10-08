<?php
$piece = explode(" ", $row['date_time']);
$piece2 = explode("-", $piece[0]);
$date = $piece2[2] . "/" . $piece2[1] . "/" . $piece2[0];
$piece2 = explode(":", $piece[1]);
$time = $piece2[0] . ":" . $piece2[1];

// strating reg
$piece = explode(" ", $row['reg_start']);
$piece2 = explode("-", $piece[0]);
$start_date = $piece2[2] . "/" . $piece2[1] . "/" . $piece2[0];
$piece2 = explode(":", $piece[1]);
$start_time = $piece2[0] . ":" . $piece2[1];

// ending reg
$piece = explode(" ", $row['reg_end']);
$piece2 = explode("-", $piece[0]);
$end_date = $piece2[2] . "/" . $piece2[1] . "/" . $piece2[0];
$piece2 = explode(":", $piece[1]);
$end_time = $piece2[0] . ":" . $piece2[1];


?>