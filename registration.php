<link rel="stylesheet" href='assets/css/login.css'>
<?php
include_once("includes/front/header.php");
include 'ChromePhp.php';
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
    $ip = $_POST['ip'];
    $path = $_POST['path'];

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
        $query = $connection->prepare("INSERT INTO users(username, address, company, email, telephone ,password, ip, path) VALUES (:username, :address, :company, :email, :telephone,:password_hash, :ip, :path)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("address", $address, PDO::PARAM_STR);
        $query->bindParam("company", $company, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("telephone", $telephone, PDO::PARAM_INT);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("ip", $ip, PDO::PARAM_STR);
        $query->bindParam("path", $path, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            try {

                $commande = "sudo /opt/scripts/newuser.sh " . $username . " " . $password . " " . $ip . " " . $path;
                ChromePhp::log($commande);
                shell_exec($commande);
                echo '<p class="success">Your registration was successful!</p>';
            } catch (exception $e) {
                echo $e->getMessage();
                echo '<p class="error">Something went trully wrong!</p>';
            }
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
?>
<main>
    <form method="post" action="" name="signup-form">
        <div class="form-element">
            <label>Username</label>
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
            <label>Ip</label>
            <input type="text" name="ip" required>
        </div>

        <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required/>
        </div>

        <div class="form-element">
            <label>Confirm Password</label>
            <input type="password" name="password_rep" required/>
        </div>

        <div class="form-element">
            <label>Enter the path of the directory you want to save</label>
            <input type="text" name="path" required/>
        </div>



        <button type="submit" name="register" value="register">Register</button>
    </form>
</main>

</body>
</html>

