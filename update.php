<?php
$conn = new mysqli("localhost", "root", "", "webengineering_task");

$matric = $_POST['matric'];
$race = $_POST['race'];
$gender = $_POST['gender'];

$imageName = $_FILES['image']['name'];
$imagePath = "uploads/" . basename($imageName);

if (!file_exists("uploads")) {
    mkdir("uploads", 0777, true);
}

if (!empty($imageName)) {
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    $conn->query("UPDATE student SET Race='$race', Gender='$gender', Image='$imagePath' WHERE Matric='$matric'");
} else {
    $conn->query("UPDATE student SET Race='$race', Gender='$gender' WHERE Matric='$matric'");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .message-box {
            background-color: #dff0d8;
            border-left: 6px solid #4CAF50;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="message-box">
    ✅ Record updated successfully.<br>
    <a href="list.php">⬅️ Back to Student List</a>
</div>
</body>
</html>
