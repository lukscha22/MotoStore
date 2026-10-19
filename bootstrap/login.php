<?php
header('Content-Type: application/json; charset=utf-8');
include '../connection.php';
$allowed_categories = array('supersport', 'naked', 'cross');
$category = isset($_GET['category']) ? $_GET['category'] : '';
if(in_array($category, $allowed_categories)){
    $category_safe = mysqli_real_escape_string($con, $category);
    $query = "SELECT id, name, price, horsepower, category, image FROM products WHERE category='$category_safe' ORDER BY id";
} else {
    $query = "SELECT id, name, price, horsepower, category, image FROM products ORDER BY FIELD(category, 'supersport', 'naked', 'cross'), id";
}
$result = mysqli_query($con, $query);
$products = array();
if($result){
    while($row = mysqli_fetch_assoc($result)){ $products[] = $row; }
    echo json_encode(array('success' => true, 'products' => $products));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri dohvaćanju proizvoda.'));
}
mysqli_close($con);
?>
