<?php

include('ka_connect.php');
$sql = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC LIMIT 5");
while($row = mysqli_fetch_array($sql))
{
   $json[]=array('name'=>$row['name'],'email'=>$row['email'],'message'=>$row['message'],'date'=>$row['date']);
}
$a= json_encode($json);
echo $a;
?>
