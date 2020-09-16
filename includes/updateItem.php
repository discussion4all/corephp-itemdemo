<?php

require "./../database.php";

if ($_POST['action'] == "add") {
    $itemId = $_POST['itemId'];
    $sql = "update tbl_items set item_status = 1 where id = '" . $itemId . "'";
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        $response = array('status' => 'success', 'message' => 'Item added into selected list');
    }
} elseif ($_POST['action'] == "remove") {
    $itemId = $_POST['itemId'];
    $sql = "update tbl_items set item_status = 0 where id = '" . $itemId . "'";
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        $response = array('status' => 'success', 'message' => 'Item removed from selected list');
    }
}
echo json_encode($response);

?>