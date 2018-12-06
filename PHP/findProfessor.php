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

<p>Type a professor's last name to search his/her information</p>

<p>Note: </p>
<p>The form requires a last name as input</p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $lname = $_POST['lname'];

    $lname = mysqli_real_escape_string($conn, $lname);

    #TODO: add proper queries
    // $query = "select fname, lname, email, major, office from professor where lname = ";
    // $query = $query."'".$lname."' ORDER BY fname;";

?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    print "\n";
    print "$row[fname] $row[lname] $row[email] $row[major] $row[office]";
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