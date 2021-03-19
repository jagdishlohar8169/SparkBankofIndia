
<?php
ini_set('display_errors','on');

$servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "bank";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error)
  die("Connection failed: " . $conn->connect_error);


$result = mysqli_query($conn, "SELECT * FROM customer");
while ($row = mysqli_fetch_assoc($result)) {
    $customer[] = $row;
    
}

mysqli_close($conn);
?>



<html>
<head>

<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=">
 <title>Transaction</title>
 <link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="transaction.css">


</head>
<body>
<div id="wrapper">
    <?php
        include "./header.html"
        ?>  
  </div>


<div id="wrap">
  <div class=slct>
<form action="transfer1.php" method="post">

<label for="sender">Sender:</label>
<select name="sender">
<?php
echo '<option disabled selected>-- Select --</option>';
foreach ($customer as $c) 
{
        echo "<option value=" . $c['Name'] . ">" . $c['Name'] . "</option>";   
}

echo "</br>";
echo "</br>";
?>
</select>


<label for="reciever">Reciever: </label>
<select name="reciever" class="selcls">
<?php
echo '<option disabled selected>-- Select --</option>';
foreach ($customer as $c) {
    echo "<option value=\"" . $c['Name'] . "\">" . $c['Name'] . "</option>";   
}
?>
</select>

<label for="amount">Amount:</label>
<?php
echo "<input type=text name=amount> ";

echo "</br>";
echo "</br>";
?>

<input type="submit" name="submit" value="Transfer">

</form>

</div>

</div>
</body>
</html>




