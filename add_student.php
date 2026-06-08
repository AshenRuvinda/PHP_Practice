<?php
include 'auth.php';
include 'db.php';

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $stmt = $conn->prepare(
        "INSERT INTO students(name,email,course)
         VALUES(?,?,?)"
    );
    $stmt->bind_param(
        "sss",
        $name,
        $email,
        $course
    );
    $stmt->execute();
    header("Location:index.php");
}
?>
<form method="POST">

    <input type="text" name="name" placeholder="Name"><br><br>

    <input type="email" name="email" placeholder="Email"><br><br>

    <input type="text" name="course" placeholder="Course"><br><br>

    <button name="save">
        Save
    </button>

</form>