<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=">
<title> View Details</title>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="view.css">
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


	$id=$_GET['id'];
	$res =mysqli_query($conn, "select * from customer where id= '$id'");
	

echo "<br>";
echo "<table border='2'>";

echo "<caption>Customer Detail</caption>";
echo "<tr>";
echo "<th>ID</th><th>Name</th><th>Email ID</th><th>Current Balance</th></tr>";


if ($res->num_rows> 0)
{
while($row = $res->fetch_assoc()){
?>

<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["Name"]; ?></td>
    <td><?php echo $row["Email_ID"]; ?></td> 
       <td><?php echo $row["balance"]; ?></td>
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

<div id="but">
<button class="trans" onclick="location.href='transaction.php'">Transfer</button>
<button class="home" onclick="location.href='index.php'">Home</button>

</div>
</div>
</body>