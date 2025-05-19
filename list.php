<?php
$conn = new mysqli("localhost", "root", "", "webengineering_task");

$filter = "";
if (isset($_GET['race'])) {
    $race = $_GET['race'];
    $filter = "WHERE Race='$race'";
} elseif (isset($_GET['gender'])) {
    $gender = $_GET['gender'];
    $filter = "WHERE Gender='$gender'";
}

$result = $conn->query("SELECT * FROM student $filter");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        select, button {
            padding: 8px;
            margin-right: 10px;
        }
        img {
            max-width: 60px;
        }
        .filters {
            margin-bottom: 20px;
        }
        a.edit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2>Student List</h2>

<div class="filters">
    <form method="get" style="display:inline;">
        Filter by Race:
        <select name="race">
            <option value="">--Select--</option>
            <option value="Malay">Malay</option>
            <option value="Chinese">Chinese</option>
            <option value="Indian">Indian</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <form method="get" style="display:inline;">
        Filter by Gender:
        <select name="gender">
            <option value="">--Select--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <button type="submit">Search</button>
    </form>
</div>

<table>
    <tr>
        <th>Matric</th>
        <th>Name</th>
        <th>Email</th>
        <th>Race</th>
        <th>Gender</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['Matric'] ?></td>
            <td><?= $row['Name'] ?></td>
            <td><?= $row['Email'] ?></td>
            <td><?= $row['Race'] ?></td>
            <td><?= $row['Gender'] ?></td>
            <td>
                <?php if (!empty($row['Image'])): ?>
                    <img src="<?= $row['Image'] ?>" alt="Image">
                <?php endif; ?>
            </td>
            <td><a class="edit-btn" href="edit.php?matric=<?= $row['Matric'] ?>">Edit</a></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
