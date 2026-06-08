<?php
include 'auth.php';
include 'db.php';

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h4>
Welcome,
<?= $_SESSION['name']; ?>
</h4>

<a href="logout.php"
   class="btn btn-danger">
   Logout
</a>

<h2>Student List</h2>

<a href="add_student.php" class="btn btn-success mb-3">
    Add Student
</a>

<table class="table table-bordered">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['course']; ?></td>

    <td>
        <a href="edit_student.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>

        <a href="delete_student.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">
            Delete
        </a>
    </td>
</tr>

<?php } ?>
</table>
</body>
</html>