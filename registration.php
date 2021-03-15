<link rel="stylesheet" href='assets/css/login.css'>
<?php
include_once("includes/front/header.php");
session_start();
include('config.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $address = $_POST['address'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $password_rep = $_POST['password_rep'];
    $error = 0;
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $verifMail = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $verifMail->bindParam("email", $email, PDO::PARAM_STR);
    $verifMail->execute();
    if ($verifMail->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
        $error++;
    }
    $verifUser = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $verifUser->bindParam("username", $username, PDO::PARAM_STR);
    $verifUser->execute();
    if ($verifUser->rowCount() > 0) {
        echo '<p class="error">The username is already registered!</p>';
        $error++;
    }
    if ($_POST['password_rep'] != $_POST['password']) {
        echo '<p class="error">Passwords mismatch</p>';
        $error++;
    }
    if ($error == 0) {
        $query = $connection->prepare("INSERT INTO users(username, address, company, email, telephone ,password) VALUES (:username, :address, :company, :email, :telephone,:password_hash)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("address", $address, PDO::PARAM_STR);
        $query->bindParam("company", $company, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("telephone", $telephone, PDO::PARAM_INT);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            try {

                shell_exec("/cgi-bin/newuser.sh " + $username + " " + $password);

                echo '<p class="success">Your registration was successful!</p>';
            }catch (exception $e){
                echo $e->getMessage();
                echo '<p class="error">Something went wrong!</p>';
            }
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
?>
<form method="post" action="" name="signup-form">
    <div class="form-element">
        <label>username</label>
        <input type="text" name="username" required/>
    </div>

    <div class="form-element">
        <label>Address</label>
        <input type="text" name="address" required>
    </div>

    <div class="form-element">
        <label>Company</label>
        <input type="text" name="company" required>
    </div>

    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" required/>
    </div>

    <div class="form-element">
        <label>Telephone</label>
        <input type="number" name="telephone" required>
    </div>

    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required/>
    </div>

    <div class="form-element">
        <label>Confirm Password</label>
        <input type="password" name="password_rep" required/>
    </div>

    <button type="submit" name="register" value="register">Register</button>
</form>
<?php
include_once("includes/front/footer.php"); ?>
</body>
</html>

