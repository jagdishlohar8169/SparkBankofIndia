

<?php
ini_set('display_errors','on');
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bank";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);


mysqli_autocommit($conn, FALSE);

$s=mysqli_real_escape_string($conn, $_POST['sender']);
$r =mysqli_real_escape_string($conn, $_POST['reciever']);
$a = mysqli_real_escape_string($conn, $_POST['amount']);

 $sql = mysqli_query($conn,"INSERT INTO transaction (sender_name, rcvr_name, amount) VALUES ('$s', '$r', '$a')");



if ($_POST['submit'] && is_numeric($_POST['amount'])) 
{

    // add $$ to reciever
    $result = mysqli_query($conn, "UPDATE customer SET balance = balance + '". $_POST['amount'] . "' WHERE Name ='" .$_POST['reciever'] ."'" );
    if ($result !== TRUE) {
        mysqli_rollback($conn);  
    }
   
    // subtract $$ from sender
    $result = mysqli_query($conn, "UPDATE customer SET balance = balance - '".  $_POST['amount']. "' WHERE Name = '" . $_POST['sender']. "'");
    if ($result !== TRUE) {
        mysqli_rollback($conn);  
    }


    

    mysqli_commit($conn);
}





// get account balances
// save in array, use to generate form
$result = mysqli_query($conn, "SELECT * FROM customer");
while ($row = mysqli_fetch_assoc($result)) {
    $customer[] = $row;
    
}

// close connection
mysqli_close($conn);
?>




<html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=">
<title> Transaction </title>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="transfer.css">


</head>
<body onload="myFunction()">
<div id="wrapper">
    <?php
        include "./header.html"
        ?>  
  </div>



<div id="wrap">

<div id="snackbar">Transaction Successful....</div>



<table border=1>

<?php
 echo "<caption>Account Details</caption>";
foreach ($customer as $c) {
     echo "<tr><td>" . $c['Name'] . "</td><td>" . $c['Email_ID'] . "</td><td>" . $c['balance'] . "</td></tr>";   
}
?>
</table>


<div id="but">
<button class="trans" onclick="location.href='history.php'">View Transaction History</button>


</div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
</body>
</html>