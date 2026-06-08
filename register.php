 <?php
include 'db.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $stmt = $conn->prepare(
        "INSERT INTO users(name,email,password)
         VALUES(?,?,?)"
    );

    $stmt->bind_param(
        "sss",
        $name,
        $email,
        $password
    );

    $stmt->execute();

    header("Location: login.php");
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="password" placeholder="Password" required>
    <br><br>

    <button name="register">
        Register
    </button>
</form>