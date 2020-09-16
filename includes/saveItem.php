<?php

require "./../database.php";

$item_name = $_POST['item_name'];
$res = mysqli_query($conn, "select * from tbl_items where item_name = '" . $item_name . "'");

if (mysqli_num_rows($res) > 0) {
    $response = array('status' => 'itemExist', 'message' => 'Item already exist with same name.');
} else {
    $sql = "insert into tbl_items(`item_name`,`item_status`) values('" . $item_name . "' , 0)";
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        $response = array('status' => 'success', 'message' => 'Item inserted successfully.');
    }
    mysqli_close($conn);
}

echo json_encode($response);
?>