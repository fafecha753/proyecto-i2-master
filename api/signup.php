<?php

use Medoo\Medoo;


require './Medoo.php';

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'gamesdb',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");

//$entityBody = file_get_contents('php://input');
//echo $entityBody;
//echo json_decode(file_get_contents('php://input'), true);

if ($_POST) {
    //echo "POST TRY";
    //echo "<script>console.log('POST TRY!!!!!!!!!!!!!!' );</script>";


    // header("location:index.html");
    //echo $username;
    //echo "<script>console.log('$username' );</script>";

    if ($_POST['password'] == $_POST['password_confirm']) {
        if (($_POST['username'] != null) && ($_POST['email'] != null) && ($_POST['password'] != null) && ($_POST['account_type'] != null)) {

            $username = $_POST['username'];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $account_type = accountType($_POST['account_type']);
            //   var_dump($username, $password, $account_type, $email);
            createAccount($database, $username, $account_type, $email, $password);
        }
    } else {
        $msj = "Password is not matching!";
    }
}



$database = null;


function accountType($value)
{
    $type = null;
    switch ($value) {
        case 1:
            $type = "ADMIN";
            break;
        case 2:
            $type = "USER";
            break;
        default:
            $type = "USER";
            break;
    }
    return $type;
}

//CREATE ACCOUNT SP call
function createAccount($database, $username, $account_type, $email, $password)
{
    $sql = 'CALL CREATE_ACCOUNT (?,?,?,?)';
    $sth = $database->pdo->prepare($sql);

    $sth->bindParam(1, $username, PDO::PARAM_STR, 25);
    $sth->bindParam(2, $account_type, PDO::PARAM_STR, 25);
    $sth->bindParam(3, $password, PDO::PARAM_STR, 255);
    $sth->bindParam(4, $email, PDO::PARAM_STR, 25);

    $sth->execute();
}
