<link rel="stylesheet" href='assets/css/login.css'>
<?php
include_once("includes/front/header.php");
session_start();

include('config.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">email password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
            header('Location: analyze.php');
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>
<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Email</label>
        <input type="text" name="email" required/>
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required/>
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>

