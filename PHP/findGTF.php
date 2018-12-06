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


    $id = $_POST['id'];

    $id = mysqli_real_escape_string($conn, $id);

    #TODO: add proper query
    $query = "SELECT student.id as student_id, professor.id as professor_id, (professor.fname, professor.lname) as professor_name
            FROM professor 
            JOIN GTF ON GTF.professor_id = professor.id
            JOIN student ON student.id = GTF.student_id
            WHERE GTF.student_id = ";
    $query = $query."   '".$id."'  ;";
?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    print "\n";
    print "$row[student_id] $row[professor_id] $row[professor_name]";
    print "if the student is not a GTF, the result should be blank";
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