<?php
session_start();
if ($_SESSION['session_id'] !== session_id()) {
    header('Location: index.php');
}
include_once 'config.php';


$errors = [];
$valid = true;
$email = $_POST['email'];
$pass = $_POST['pass'];
$agree = $_POST['agree'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $valid = false;
    $errors['error_email'] = 'Please check email input';
}
if (!preg_match('/^[\w]{8,16}$/', $pass)) {
    $valid = false;
    $errors['error_pass'] = 'Your password should be 8 to 16 chars';
}

if ($agree === 'false') {
    $valid = false;
    $errors['error_agree'] = 'Please sign an agreement';
}

/**
 * Replacing in email all system forbidden characters
 * @param $email
 * @return mixed safe system file name
 */
function giveSafeName($email)
{
    $unsafe_chars = array("<", ">", ":", "'", "/", "\\", "|", "?", "*");
    return str_replace($unsafe_chars, '', $email);
}

//if all inputs correct create
if ($valid) {
    $user_filename = giveSafeName($email);
    $path = PATH . $user_filename . '.json';
    if (!file_exists($path)) {
        $file = fopen($path, 'w');
        fclose($file);
    }
    $_SESSION['email'] = $user_filename;
    echo 'ok';
//    header('Location: form.php');
    exit;
}

echo json_encode($errors);
