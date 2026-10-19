<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';
if(!isset($_SESSION['email'])){
    echo json_encode(array('success' => false, 'auth' => false, 'message' => 'Niste prijavljeni.'));
    exit();
}
$data = json_decode(file_get_contents('php://input'), true);
if(!$data || empty($data['oldPassword']) || empty($data['newPassword']) || empty($data['retype'])){
    echo json_encode(array('success' => false, 'message' => 'Sva polja su obavezna.'));
    exit();
}
if($data['newPassword'] !== $data['retype']){
    echo json_encode(array('success' => false, 'message' => 'Nove lozinke se ne podudaraju.'));
    exit();
}
if(strlen($data['newPassword']) < 6){
    echo json_encode(array('success' => false, 'message' => 'Nova lozinka mora imati najmanje 6 znakova.'));
    exit();
}
$email = mysqli_real_escape_string($con, $_SESSION['email']);
$query = "SELECT password FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
if(!$result || mysqli_num_rows($result) == 0){
    echo json_encode(array('success' => false, 'message' => 'Korisnik nije pronađen.'));
    exit();
}
$row = mysqli_fetch_assoc($result);
if(!password_verify($data['oldPassword'], $row['password'])){
    echo json_encode(array('success' => false, 'message' => 'Stara lozinka nije ispravna.'));
    exit();
}
$new_hash = password_hash($data['newPassword'], PASSWORD_DEFAULT);
$update_query = "UPDATE users SET password='$new_hash' WHERE email='$email'";
if(mysqli_query($con, $update_query)){
    echo json_encode(array('success' => true, 'message' => 'Lozinka je promijenjena.'));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri promjeni lozinke.'));
}
mysqli_close($con);
?>
