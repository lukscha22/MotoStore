<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include '../connection.php';

if(!isset($_SESSION['id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    http_response_code(403);
    echo json_encode(array('success' => false, 'message' => 'Nemate ovlasti za brisanje korisnika.', 'auth' => false));
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
if(!$data || empty($data['id']) || !is_numeric($data['id'])){
    echo json_encode(array('success' => false, 'message' => 'Nije odabran ispravan korisnik.'));
    exit();
}

$user_id = (int)$data['id'];

if($user_id == (int)$_SESSION['id']){
    echo json_encode(array('success' => false, 'message' => 'Ne možete obrisati vlastiti račun na ovaj način.'));
    exit();
}

$check_query = "SELECT id, is_admin FROM users WHERE id = $user_id";
$check_result = mysqli_query($con, $check_query);

if(!$check_result || mysqli_num_rows($check_result) == 0){
    echo json_encode(array('success' => false, 'message' => 'Korisnik ne postoji.'));
    exit();
}

$user = mysqli_fetch_assoc($check_result);
if((int)$user['is_admin'] === 1){
    echo json_encode(array('success' => false, 'message' => 'Admin korisnik se ne može obrisati.'));
    exit();
}

$delete_query = "DELETE FROM users WHERE id = $user_id AND is_admin = 0";
if(mysqli_query($con, $delete_query)){
    echo json_encode(array('success' => true, 'message' => 'Korisnik je obrisan.'));
} else {
    http_response_code(500);
    echo json_encode(array('success' => false, 'message' => 'Greška pri brisanju korisnika.'));
}
mysqli_close($con);
?>
