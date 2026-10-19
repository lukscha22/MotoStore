<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
$_SESSION = array();
session_destroy();
echo json_encode(array('success' => true, 'message' => 'Odjavljeni ste.'));
?>
