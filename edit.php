<?php
$conn = new mysqli("localhost", "root", "", "webengineering_task");

$matric = $_GET['matric'];
$result = $conn->query("SELECT * FROM student WHERE Matric='$matric'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        form {
            background-color: #f9f9f9;
            padding: 25px;
            border-radius: 8px;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        img {
            margin-top: 10px;
            max-width: 150px;
        }
    </style>
</head>
<body>

<h2>Edit Student Record</h2>

<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="matric" value="<?= $row['Matric'] ?>">

    <label>Name:</label>
    <input type="text" value="<?= $row['Name'] ?>" disabled>

    <label>Email:</label>
    <input type="text" value="<?= $row['Email'] ?>" disabled>

    <label>Race:</label>
    <select name="race">
        <option value="">--Select--</option>
        <option value="Malay" <?= $row['Race'] == 'Malay' ? 'selected' : '' ?>>Malay</option>
        <option value="Chinese" <?= $row['Race'] == 'Chinese' ? 'selected' : '' ?>>Chinese</option>
        <option value="Indian" <?= $row['Race'] == 'Indian' ? 'selected' : '' ?>>Indian</option>
    </select>

    <label>Gender:</label>
    <select name="gender">
        <option value="">--Select--</option>
        <option value="Male" <?= $row['Gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= $row['Gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
    </select>

    <label>Upload Image:</label>
    <input type="file" name="image">

    <?php if (!empty($row['Image'])): ?>
        <br><strong>Current Image:</strong><br>
        <img src="<?= $row['Image'] ?>" alt="Current Image">
    <?php endif; ?>

    <br>
    <button type="submit">Update</button>
</form>

</body>
</html>
