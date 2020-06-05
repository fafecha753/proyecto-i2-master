<?php

use Medoo\Medoo;

$request;
$response = array('error' => false);
$temp;

require 'Medoo.php';

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

//$method = $_SERVER['REQUEST_METHOD'];
//var_dump($method);


//para ver que tipo de request está reciviendo
if (isset($_GET['request'])) {
    $request = $_GET['request'];
}
//echo "<script>console.log('$request' );</script>";
//echo $username;
//echo "<script>console.log('$username' );</script>";

switch ($request) {
    case 'verify':
        $username = $_GET['username'];
        $userExist = verifyByUsername($database, $username);
        $response['verifyUser'] = $userExist;
        //para devolver la respuesta
        // header("Content-type: application/json");
        //echo json_encode($response['verifyUser']);

        break;
    case 'getUser':
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = getUser($database, $username, $password);
        //var_dump($user);
        if ($user != null) {
            $hash = $user[0]["PASSWORD"];
            if (password_verify($_POST["password"], $hash)) {
                $userData =
                    array(
                        "account_type" => $user[0]["ACCOUNT_TYPE"],
                        "username" => $user[0]["USERNAME"],
                        "email" => $user[0]["EMAIL"]
                    );
                //  $json = json_encode($userData);
                //  echo ($json);

                //    header("Content-type: application/json");
                //  echo json_encode($userData);

                $response['user'] = $userData;
                break;
                // echo  json_encode($value);
            } else {
             //   echo  "wrong user or password";
             $response['error'] = true;
             $response['message'] = "wrong user or password";
                break;
            }
        } else {
           // echo "Invalid user data!";
            $response['error'] = true;
            $response['message'] = "Invalid user data!";
            break;
        }
}

header("Content-type: application/json");
echo json_encode($response);





/*
session_start();
$active_session = $_SESSION;


if ($active_session != null) {
    header("location:index.php");
}


if ($_GET) {
}

if ($_POST) {
    /*
    $password = $_POST['password'];
    $username = $_POST['username'];
    $user = getUser($database, $username, $password);

    if ($user != null) {
        $hash = $user[0]["PASSWORD"];
        if (password_verify($_POST["password"], $hash)) {

            $_SESSION["isLoggedIn"] = true;
            $_SESSION["user"] = $user[0]["USERNAME"];
            header("location:index.php");
        } else {
            $msj =  "wrong user or password";
        }
    } else {
        $msj = "Invalid user data!";
    }
    */


function verifyByUsername($database, $username)
{
    $sql = 'CALL VERIFY_USER_EXISTS_USERNAME (?)';
    $sth = $database->pdo->prepare($sql);

    $sth->bindParam(1, $username, PDO::PARAM_STR, 25);
    $sth->execute();
    $exist = $sth->fetchAll(PDO::FETCH_ORI_FIRST);
    return $exist[0]["COUNT(*)"];
}


function getUser($database, $username)
{
    $sql = 'CALL SELECT_USER_BY_USERNAME (?)';
    $sth = $database->pdo->prepare($sql);

    $sth->bindParam(1, $username, PDO::PARAM_STR, 25);
    $sth->execute();
    $userdata = $sth->fetchAll(PDO::FETCH_ORI_FIRST);
    return $userdata;
}
