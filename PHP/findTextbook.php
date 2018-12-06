<?php

include('./connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>

<h2>Professor Information Search</h2>
</head>
<body bgcolor="white">

<p>Type a class CRN to find out required textbooks</p>

<p>Note: </p>
<p>The form requires a CRN as input</p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $crn = $_POST['CRN'];

    $crn = mysqli_real_escape_string($conn, $crn);

    $query = "SELECT cl.CRN, tb.title, tb.ISBN, tb.author
            FROM textbook tb JOIN class cl ON tb.class_CRN = cl.CRN
            WHERE cl.CRN = ";
    $query = $query."  '".$crn."' ;";

?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    print "\n";
    print "$row[CRN] $row[title] $row[author] $row[ISBN]";
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