<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';
$data = json_decode(file_get_contents('php://input'), true);
if(!$data || empty($data['email']) || empty($data['password'])){
    echo json_encode(array('success' => false, 'message' => 'Unesite email i lozinku.'));
    exit();
}
$email = mysqli_real_escape_string($con, $data['email']);
$password_input = $data['password'];
$query = "SELECT id, password, is_admin FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
if(!$result || mysqli_num_rows($result) == 0){
    echo json_encode(array('success' => false, 'message' => 'Neispravan email ili lozinka.'));
    exit();
}
$row = mysqli_fetch_assoc($result);
if(password_verify($password_input, $row['password'])){
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $row['id'];
    $_SESSION['is_admin'] = (int)$row['is_admin'];
    echo json_encode(array('success' => true, 'message' => 'Prijava uspješna.'));
} else {
    echo json_encode(array('success' => false, 'message' => 'Neispravan email ili lozinka.'));
}
mysqli_close($con);
?>
