<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';
if(!isset($_SESSION['id'])){
    echo json_encode(array('success' => false, 'auth' => false, 'message' => 'Za dodavanje motocikla u košaricu morate se prijaviti.'));
    exit();
}
$data = json_decode(file_get_contents('php://input'), true);
if(!$data || empty($data['id']) || !is_numeric($data['id'])){
    echo json_encode(array('success' => false, 'message' => 'Proizvod nije ispravan.'));
    exit();
}
$user_id = (int) $_SESSION['id'];
$item_id = (int) $data['id'];
$product_query = "SELECT id FROM products WHERE id=$item_id";
$product_result = mysqli_query($con, $product_query);
if(!$product_result || mysqli_num_rows($product_result) == 0){
    echo json_encode(array('success' => false, 'message' => 'Motocikl ne postoji.'));
    exit();
}
$check_query = "SELECT id, quantity FROM users_items WHERE user_id=$user_id AND item_id=$item_id AND status='Added to cart'";
$check_result = mysqli_query($con, $check_query);
if($check_result && mysqli_num_rows($check_result) > 0){
    $row = mysqli_fetch_assoc($check_result);
    $new_quantity = (int)$row['quantity'] + 1;
    $cart_id = (int)$row['id'];
    $query = "UPDATE users_items SET quantity=$new_quantity WHERE id=$cart_id";
} else {
    $query = "INSERT INTO users_items(user_id, item_id, quantity, status) VALUES ($user_id, $item_id, 1, 'Added to cart')";
}
if(mysqli_query($con, $query)){
    echo json_encode(array('success' => true, 'message' => 'Motocikl je dodan u košaricu.'));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri dodavanju u košaricu.'));
}
mysqli_close($con);
?>
