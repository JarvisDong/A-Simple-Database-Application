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
    // echo "checkpoint1"; 
    if ($mysqli->connet_errno) {

        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $crn = $_POST['CRN'];

    $crn = mysqli_real_escape_string($conn, $crn);

    #TODO: add proper query
    $query = "SELECT c.CRN , c.name ,c.room,c.term,c.major_code from class c where CRN = ";
    $query = $query."   '".$crn."'  ; ";
    // $query = "INSERT INTO `mydb`.`class` (`CRN`, `room`, `name`, `term`, `major_code`) VALUES ('1046', 'LHA888', 'Marketing105', 'F', 'MAKT');";
    echo $query;
?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
echo "checkpoint1.1";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    print "\n";
    
    print "$row[CRN] $row[name] $row[room] $row[term] $row[major_code]";
    print "checkpoint2";
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