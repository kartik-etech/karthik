<?php 
$num_rec_per_page=5;
include('ka_connect.php');

if (isset($_GET["page"])) 
      {
             $page  = $_GET["page"]; 
            
      } 
else 
      {
             $page=1; 

      }; 
$start_from = ($page-1) * $num_rec_per_page; 

$sql = "SELECT * FROM students ORDER BY id DESC LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($conn, $sql); //run the query

?> 
<!--For Displying data acroos tthe page -->
<table border="1">
<tr><td><b>Name</b></td><td><b>Email</b></td><td><b>Message</b></td><td><b>Date</b></td></tr>
<?php 
while ($row = mysqli_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['date']; ?></td>            
            </tr>
<?php 
}; 
?> 
</table>
