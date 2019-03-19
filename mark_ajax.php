<?php
require_once("Connect.php");
$class =$_REQUEST["cls"];

$query = "SELECT * FROM subject WHERE class='$class'";

$run = mysqli_query($connect,$query);

while($data = mysqli_fetch_array($run))
{

  $Subject = $data["subject_name"];
  $SubjectID = $data["subject_id"];

  echo "<option value=".$SubjectID.">".$Subject."</option>";

}

?>
