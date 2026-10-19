<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';
if(!isset($_SESSION['id'])){
    echo json_encode(array('success' => false, 'auth' => false, 'message' => 'Niste prijavljeni.'));
    exit();
}
$user_id = (int) $_SESSION['id'];
$check_query = "SELECT id FROM users_items WHERE user_id=$user_id AND status='Added to cart'";
$check_result = mysqli_query($con, $check_query);
if(!$check_result || mysqli_num_rows($check_result) == 0){
    echo json_encode(array('success' => false, 'message' => 'Košarica je prazna.'));
    exit();
}
$query = "UPDATE users_items SET status='Confirmed' WHERE user_id=$user_id AND status='Added to cart'";
if(mysqli_query($con, $query)){
    echo json_encode(array('success' => true, 'message' => 'Narudžba je potvrđena.'));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri potvrdi narudžbe.'));
}
mysqli_close($con);
?>
