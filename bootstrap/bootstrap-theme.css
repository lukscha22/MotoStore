<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';
$data = json_decode(file_get_contents('php://input'), true);
$required = array('name', 'email', 'password', 'contact', 'city', 'address');
foreach($required as $field){
    if(!$data || empty($data[$field])){
        echo json_encode(array('success' => false, 'message' => 'Sva polja su obavezna.'));
        exit();
    }
}
$name = mysqli_real_escape_string($con, $data['name']);
$email = mysqli_real_escape_string($con, $data['email']);
$password_raw = $data['password'];
$contact = mysqli_real_escape_string($con, $data['contact']);
$city = mysqli_real_escape_string($con, $data['city']);
$address = mysqli_real_escape_string($con, $data['address']);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(array('success' => false, 'message' => 'Email nije ispravan.'));
    exit();
}
if(strlen($password_raw) < 6){
    echo json_encode(array('success' => false, 'message' => 'Lozinka mora imati najmanje 6 znakova.'));
    exit();
}
$check_query = "SELECT id FROM users WHERE email='$email'";
$result = mysqli_query($con, $check_query);
if($result && mysqli_num_rows($result) > 0){
    echo json_encode(array('success' => false, 'message' => 'Email već postoji.'));
    exit();
}
$password_hash = password_hash($password_raw, PASSWORD_DEFAULT);
$query = "INSERT INTO users (name, email, password, contact, city, address, is_admin) VALUES ('$name', '$email', '$password_hash', '$contact', '$city', '$address', 0)";
if(mysqli_query($con, $query)){
    echo json_encode(array('success' => true, 'message' => 'Registracija uspješna. Sada se možete prijaviti.'));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri registraciji.'));
}
mysqli_close($con);
?>
