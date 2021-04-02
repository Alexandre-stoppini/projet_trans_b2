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
    $distri = $_POST['distri'];
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


    $verifIP = $connection->prepare("SELECT * FROM users where ip=:ip");
    $verifIP->bindParam("ip", $ip, PDO::PARAM_STR);
    $verifIP->execute();
    if ($verifIP->rowCount() > 0) {
        echo '<p class="error">Error with the IP contact an administrator.</p>';
        $error++;
    }


    if ($_POST['password_rep'] != $_POST['password']) {
        echo '<p class="error">Passwords mismatch</p>';
        $error++;
    }
    if ($error == 0) {
        $query = $connection->prepare("INSERT INTO users(username, address, company, email, telephone ,password, ip, path, distri) VALUES (:username, :address, :company, :email, :telephone,:password_hash, :ip, :path, :distri)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("address", $address, PDO::PARAM_STR);
        $query->bindParam("company", $company, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("telephone", $telephone, PDO::PARAM_INT);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("ip", $ip, PDO::PARAM_STR);
        $query->bindParam("path", $path, PDO::PARAM_STR);
        $query->bindParam("distri", $distri, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            try {
                if ($distri == "unix") {
                    ChromePhp::log("Execution de la commande de Alexis");
                } else {
                    ChromePhp::log("Distrib windows, pas d'exec de commande spécifique");
                }
//                $commande = "/bin/bash /usr/local/bin/newuser.sh " . $username . " " . $password;
//               $test = exec($commande);
//                shell_exec("useradd $username -d /home/$username -m");
//                shell_exec("usermod -a -G clients $username");
//                shell_exec("echo $password | passwd $username --stdin");
//                shell_exec("mkdir /sauvegarde/$username");
//                shell_exec("ln -s /sauvegarde/$username /home/$username/sauvegarde");
//                echo $test;
//                ChromePhp::log("Essaie avec le script en brut.");
//                ChromePhp::log($test);
//                ChromePhp::log('Commande :');
//                ChromePhp::log($commande);
                echo '<p class="success">Your registration was successful!</p>';
            } catch (exception $e) {
                echo $e->getMessage();
                echo '<p class="error">Something went trully wrong!</p>';
                ChromePhp::log("Erreur lors du try catch.");
            }
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}

// path du fichier à sauvegarder
// type de dsitri
?><main>
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

    <div class="form-element">
        <label for="distri">Choose your distribution : </label>
        <select id="distri" name="distri">
            <option value="windows">Windows</option>
            <option value="unix">Unix</option>
        </select>
    </div>

    <button type="submit" name="register" value="register">Register</button>
</form>
    </main>

</body>
</html>

