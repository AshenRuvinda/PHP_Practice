<?php
include 'auth.php';
include 'db.php';

$id = $_GET['id'];

$data = $conn->query(
    "SELECT * FROM students WHERE id=$id"
);

$row = $data->fetch_assoc();

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $stmt = $conn->prepare(
        "UPDATE students
         SET name=?,email=?,course=?
         WHERE id=?"
    );

    $stmt->bind_param(
        "sssi",
        $name,
        $email,
        $course,
        $id
    );

    $stmt->execute();

    header("Location:index.php");
}
?>

<form method="POST">

<input
type="text"
name="name"
value="<?= $row['name']; ?>">

<input
type="email"
name="email"
value="<?= $row['email']; ?>">

<input
type="text"
name="course"
value="<?= $row['course']; ?>">

<button name="update">
Update
</button>

</form>