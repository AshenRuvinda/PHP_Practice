 <?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE email=?"
    );

    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify(
            $password,
            $user['password']
        )){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location:index.php");
            exit();
        }
    }

    echo "Invalid Email or Password";
}
?>

<form method="POST">

    <input type="email"
           name="email"
           placeholder="Email">

    <br><br>

    <input type="password"
           name="password"
           placeholder="Password">

    <br><br>

    <button name="login">
        Login
    </button>

</form>