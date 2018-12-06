<?php

include('./connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>

<h2>Major Information Search</h2>
</head>
<body bgcolor="white">

<p>Type a major to search information</p>

<p>Note: </p>
<p>The form requires a major code as input</p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $major = $_POST['major_code'];

    $major = mysqli_real_escape_string($conn, $major);

    #TODO: add proper query. List all professors, classes, textbooks that related to this major
    $query = "SELECT ma.name as major_name, de.name as department_name, de.building as building, de.tel_number as telphone, cl.CRN as CRN, cl.name as class, cl.term as term
            FROM major ma JOIN department de ON ma.code = de.major_code
            JOIN class cl ON ma.code = cl.major_code
            WHERE ma.code = ";
    $query = $query."   '".$major."'  ;";

?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    print "\n";
    print "$row[major_name] $row[department_name] $row[building] $row[telphone] $row[CRN] $row[class] $row[term]";
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