<?php
session_start();
$txt = "";

if (isset($_POST["submit"])){
    $nick = $_POST["nick"];
    $nick = trim($nick);
    $nick = htmlspecialchars($nick);
    $password = $_POST["password"];
    $password = trim($password);
    $password = htmlspecialchars($password);
    $repeatpass = $_POST["repeatpass"];
    $repeatpass = trim($repeatpass);
    $repeatpass = htmlspecialchars($repeatpass);
    $email = $_POST["email"];
    $email = trim($email);
    $email = htmlspecialchars($email);

    if (Checkstr($nick)){
        $txt = "Nick jest niepoprawny!";
    }
    else if (Checkpass($password)){
        $txt = "Hasło jest niepoprawne!";
    }
    else if ($password !== $repeatpass){
        $txt = "Hasła nie są sobie równe!";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $txt = "Nieprawidłowy email !";
    }
    else {
        $_SESSION["nick"] = $nick;
        header("Location:result.php");
        die;
    }
}

function Checkstr($s){
    if (strlen($s) === 0 || strlen($s)>35){
        return true;
    }
    if (preg_match("/[^\wńżźćńśęąłóŚÓŁĘĄŻŹŃĆ]/", $s)){
        return true;
    }
return false;
}

function Checkpass($pss){
if (strlen($pss) === 0 || strlen($pss)<8){
        return true;
    }
    if (!preg_match("/\d/", $pss)){
        return true;
    }
    return false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Walidacj formularza - Marta Kaszuba</title>
</head>
<body>
    <div id="nag">
    <h5>Żeby się zarejestrować wypełnij poprawnie poniższy formularz</h5>
    </div>
    <div id="main" class="light shadow p-3 mb-5">
    <form method="post">
            <div class="form-group">
                    <label for="name">Nick:<br> <span id="info">(nick musi się składać wyłącznie z liter i cyfr) </span></label>
                    <div class="col-sm-6">
    <input type="text" name="nick" id="nick" class="form-control form-control-sm"/>
    </div>
</div>

    <div class="form-group">
            <label for="name">Hasło:<br> <span id="info">(hasło musi się składać z co najmniej 8 znaków w tym co najmniej jednej liczby) </span></label>
            <div class="col-sm-6">
    <input type="password" name="password" id="password" class="form-control form-control-sm"/>
    </div>
    </div>

    <div class="form-group">
            <label for="name">Powtórz hasło:</label>
            <div class="col-sm-6">
    <input type="password" name="repeatpass" id="repeatpass" class="form-control form-control-sm"/>
    </div>
    </div>

    <div class="form-group">
            <label for="name">Email:</label>
            <div class="col-sm-6">
    <input type="email" name="email" id="email" class="form-control form-control-sm"/>
    </div>
    </div>
    <button class="btn btn-secondary" name="submit" id="btn">Zarejestruj się</button>
    <p id="err">
        <?php echo $txt;
        ?>
    </p>
    </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
