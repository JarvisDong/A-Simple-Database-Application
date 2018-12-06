<?php

include('./connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>

<h2>Academic Schedule Information</h2>
</head>
<body bgcolor="white">

<p>Choose one term and a major see information of available classes </p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $term = $_POST['term'];
    $major = $_POST['major_code'];
    //create a legal SQL string that you can use in an SQL statement
    $term = mysqli_real_escape_string($conn, $term);
    $major = mysqli_real_escape_string($conn, $major);
   
    #TODO: add proper query. List all classes that satisify conditions
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