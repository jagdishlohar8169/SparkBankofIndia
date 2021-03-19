

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=">
<title> Transaction History</title>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="customer.css">
<style>
  caption
{
  
  padding: 20px;
}
</style>
</head>


<body>

	<div id="wrapper">
		<?php
		    include "./header.html"
        ?>	
	</div>



<div id="wrap">

<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bank";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "SELECT * FROM `transaction`";

$result = $conn->query($sql);

echo "<table border='2'>";
echo "<caption>Transaction Details</caption>";
echo "<tr>";
echo "<th>Sender Name</th><th>Reciever Name</th><th>Amount</th></tr>";
if ($result->num_rows> 0)
{
while($row = $result->fetch_assoc()){
?>

<tr>
    <td><?php echo $row["sender_name"]; ?></td>
    <td><?php echo $row["rcvr_name"]; ?></td>
    <td><?php echo $row["amount"]; ?></td> 
  </tr> 

<?php
}
}
else
echo "Table is Empty";
echo "</table>";

echo "</form>";
$conn->close();
?>


    
</div>
</body>
</html>

