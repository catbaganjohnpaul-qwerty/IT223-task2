<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

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
    echo "
    <div class='table-responsive'>
        <table class='table table-bordered table-striped table-hover'>
            <thead class='table-success'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Contact</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
    ";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Password']}</td>
                <td>{$row['Contact']}</td>
                <td>{$row['Gender']}</td>
            </tr>
        ";
    }

    echo "
            </tbody>
        </table>
    </div>
    ";
} else {
    echo "<p class='text-center text-danger'>No results found in usertbl.</p>";
}

mysqli_close($conn);
?>

</div>
</body>
</html>
