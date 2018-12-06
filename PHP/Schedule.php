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
   
    
    $query = "SELECT de.name as department, de.building, de.tel_number, cl.CRN, cl.name, cl.term, tb.title, tb.ISBN
    FROM major ma JOIN department de ON ma.code = de.major_code
    JOIN class cl ON ma.code = cl.major_code
    JOIN textbook tb ON cl.CRN = tb.class_CRN
    WHERE ma.code = ";  
    $query = $query."    '".$major."'       ";
    $query = $query."      " ."AND cl.term =". "     "; 
    $query = $query."  '".$term."'  ;";         
?>

<br>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
print "$term\n";
print "$major\n";
print "$query\n";
print "$result";
print "mysqli_query($conn, $query)";
print "<pre>";
while ($row = mysqli_fetch_array($result)) {
    echo "ni";
    print "\n";
    print " Department:$row[department]";
    print " $row[building] $row[tel_number] $row[CRN] $row[name] $row[term] $row[title] $row[ISBN]";

}
echo "ma";
print "</pre>";

mysqli_free_result($result);
mysqli_close($conn);
?>

<hr>
<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>