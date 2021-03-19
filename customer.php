<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=">
<title> Spark Bank of India</title>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="customer.css">

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
$sql = "SELECT * FROM customer";

$result = $conn->query($sql);

echo "<table border='2'>";
echo "<caption>Customer List</caption>";
echo "<tr>";
echo "<th>ID</th><th>Name</th><th>Email ID</th><th>Current Balance</th><th>operations</th></tr>";
if ($result->num_rows> 0)
{
while($row = $result->fetch_assoc()){
?>

<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["Name"]; ?></td>
    <td><?php echo $row["Email_ID"]; ?></td> 
       <td><?php echo $row["balance"]; ?></td>
    <td><a href="view.php?id=<?php echo $row['id']; ?>" class="view">View</a></td>
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

