<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';

if(!isset($_SESSION['id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    http_response_code(403);
    echo json_encode(array('success' => false, 'message' => 'Nemate ovlasti za pregled korisnika.', 'auth' => false));
    exit();
}

$query = "SELECT id, name, email, contact, city, address FROM users WHERE is_admin = 0 ORDER BY id";
$result = mysqli_query($con, $query);

$users = array();
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $users[] = $row;
    }
}

echo json_encode(array('success' => true, 'users' => $users));
mysqli_close($con);
?>
