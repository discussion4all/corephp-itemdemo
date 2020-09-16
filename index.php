<?php
require "database.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>                 
        <title>Item</title>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>    
        <div class="container">
            <form action="" id="item_form" method="POST" name="form1">
                <h1>Item Management Page</h1>
                <div class="main-box">
                    <div class="frist-box">
                        <div class="add-box"> 
                            <div class="new-box">                  
                                <input type="text" id="item_name" placeholder="Enter New Item" name="item_name">
                                <input type="button" name="save" class="btn btn-primary" value="Add" id="btnsave">
                            </div> 
                        </div>

                        <div class="select-box">
                            <?php
                            $result = mysqli_query($conn, "select * from tbl_items  where item_status = 0");
                            ?>
                            <select id="selected_item_left" size=6 name="selected_item_left">
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option id="" value="<?php echo $row['id']; ?>"><?php echo $row["item_name"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="arrow-box">
                        <input type="button" value=">" id="btnswap" onclick="updateItemStatus('add')">
                        <input type="button" value="<" id="btnswap" onclick="updateItemStatus('remove')">
                    </div>

                    <div class="secound-box">
                        <div class="add-box">                    
                            <h1>Selected Items:</h1>
                        </div>
                        <?php
                        $result = mysqli_query($conn, "select * from tbl_items  where item_status = 1");
                        ?>
                        <select id="selected_item_right" size=6 name="selected_item_right">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option id="" value="<?php echo $row['id']; ?>"><?php echo $row["item_name"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div> 
            </form>
        </div>
        
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
        <script type="text/javascript" src="./js/item.js"></script>
        
    </body>
</html>