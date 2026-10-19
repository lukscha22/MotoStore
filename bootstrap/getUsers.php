<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';
if(!isset($_SESSION['id'])){
    echo json_encode(array('success' => false, 'auth' => false, 'message' => 'Niste prijavljeni.'));
    exit();
}
$user_id = (int) $_SESSION['id'];
$query = "SELECT p.id, p.name, p.price, p.horsepower, ui.quantity FROM users_items ui INNER JOIN products p ON p.id = ui.item_id WHERE ui.user_id=$user_id AND ui.status='Added to cart' ORDER BY ui.id";
$result = mysqli_query($con, $query);
$items = array();
$total = 0;
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $row['line_total'] = (float)$row['price'] * (int)$row['quantity'];
        $total += $row['line_total'];
        $items[] = $row;
    }
    echo json_encode(array('success' => true, 'items' => $items, 'total' => $total));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri dohvaćanju košarice.'));
}
mysqli_close($con);
?>
