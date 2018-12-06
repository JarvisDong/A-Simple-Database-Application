<?php

include('./connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>

<h2>Class Information Search</h2>
</head>
<body bgcolor="white">

<p>Type a CRN to search class information</p>

<p>Note: </p>
<p>The form requires a CRN as input</p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $crn = $_POST['CRN'];

    $crn = mysqli_real_escape_string($conn, $crn);

    #TODO: add proper query
    $query = "select * from class where CRN = ";
    $query = $query."   '".$crn."'  ; ";
?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQL_BOTH)) {
    print "\n";
    print "$row[CRN] $row[name] $row[room] $row[term] $row[major_code]";
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