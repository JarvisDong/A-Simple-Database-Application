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

<p>Type a professor last name to find out information</p>

<p>Note: </p>
<p>The form requires a last name as input</p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $lastname = $_POST['lname'];

    $lastname = mysqli_real_escape_string($conn, $lastname);

    $query = "select id, fname, lname, office, email from professor where lname = ";
    $query = $query."'".$lastname."' order by id;";
?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    print "\n";
    print "$row[id] $row[fname] $row[lname] $row[office] $row[email]";
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