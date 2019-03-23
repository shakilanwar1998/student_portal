<?php
require_once("PDO.php");
$class =$_REQUEST["cls"];

$query =  $connect->query("SELECT * FROM subject WHERE class='$class'");

while($data = $query->fetch(PDO::FETCH_OBJ))
{
  $Subject = $data->subject_name;
  $SubjectID = $data->subject_id;
  echo "<option value=".$SubjectID.">".$Subject."</option>";

}

?>
