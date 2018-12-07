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

<p>Type a student last name to search his/her information</p>

<p>Note: </p>
<p>The form requires a last name as input</p>

<hr>

<?php
    if ($mysqli->connet_errno) {
        echo "<h2>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error . "<h2>";
    }

    $lastname = $_POST['lname'];

    $lastname = mysqli_real_escape_string($conn, $lastname);

    $query = "SELECT st.id as id, Concat(st.first_name, ' ',st.last_name) as student, st.email as email, st.major_code as major, cl.name as class
            FROM student st JOIN major ma ON st.major_code = ma.code
            JOIN student_has_class sh ON st.id = sh.student_id
            JOIN class cl ON sh.class_CRN = cl.CRN
            WHERE st.last_name = ";
    $query = $query."'".$lastname."' ORDER BY id;";

?>

<hr>
<p>Result of searching:</p>

<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    print "\n";
    print "$row[id] $row[student] $row[email] $row[major] $row[class]";
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