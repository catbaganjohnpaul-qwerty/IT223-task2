<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        table { width: 80%; border-collapse: collapse; margin: 20px auto; font-family: Arial, sans-serif; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catbagan_db";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, Name, Email, Password, Contact, Gender FROM usertbl";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Contact</th>
                <th>Gender</th>
            </tr>";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Password"] . "</td>
                <td>" . $row["Contact"] . "</td>
                <td>" . $row["Gender"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center;'>No results found in usertbl.</p>";
}

mysqli_close($conn);
?>
</body>
</html>