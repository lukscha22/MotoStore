<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';
if(!isset($_SESSION['id'])){
    echo json_encode(array('success' => false, 'auth' => false, 'message' => 'Niste prijavljeni.'));
    exit();
}
$data = json_decode(file_get_contents('php://input'), true);
if(!$data || empty($data['id']) || !is_numeric($data['id'])){
    echo json_encode(array('success' => false, 'message' => 'Proizvod nije ispravan.'));
    exit();
}
$user_id = (int) $_SESSION['id'];
$item_id = (int) $data['id'];
$check_query = "SELECT id, quantity FROM users_items WHERE user_id=$user_id AND item_id=$item_id AND status='Added to cart'";
$check_result = mysqli_query($con, $check_query);
if(!$check_result || mysqli_num_rows($check_result) == 0){
    echo json_encode(array('success' => false, 'message' => 'Motocikl nije u košarici.'));
    exit();
}
$row = mysqli_fetch_assoc($check_result);
$cart_id = (int)$row['id'];
$quantity = (int)$row['quantity'];
if($quantity > 1){
    $query = "UPDATE users_items SET quantity=quantity-1 WHERE id=$cart_id";
} else {
    $query = "DELETE FROM users_items WHERE id=$cart_id";
}
if(mysqli_query($con, $query)){
    echo json_encode(array('success' => true, 'message' => 'Košarica je ažurirana.'));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri uklanjanju iz košarice.'));
}
mysqli_close($con);
?>
