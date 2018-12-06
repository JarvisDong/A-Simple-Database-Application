<?php

include('./connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>

<h2>Student Information Search</h2>
</head>
<body bgcolor="white">

<p>Type a student ID to check if he/she is a GTF</p>

<p>Note: <br>
The form requires a ID number as input</p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $lastname = $_POST['lastname'];

    $lastname = mysqli_real_escape_string($conn, $lastanme);

    #TODO: add proper query
    //$query = ""
?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

#TODO: add proper rows
print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQL_BOTH)) {
    print "\n";
    //print "$row[] $row[] $row[] $row[]";
}
print "</pre>";

mysqli_free_result($result);
mysqli_close($conn);
?>

<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>