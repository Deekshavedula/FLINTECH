
<!DOCTYPE html>
<html>
<head>
<style>
  body {
    background:#F0FFF0;
    font-family: "Nunito", sans-serif;
    padding: 20%;
    
}
table {
  border-collapse: collapse;
  width: 100%;
}

table, th, td {
  border: 1px solid black;
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  height: 50px;
}
td {
  height: 50px;
  vertical-align: bottom;
}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}

th {
  background-color: #32546e;
  color: white;
}
<div style="overflow-x:auto;">
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "id14469414_root";
$password = "Rockstar@123";
$dbname = "id14469414_contact_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, phone, message FROM contact_form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td> " . $row["phone"]. "</td><td>". $row["message"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>