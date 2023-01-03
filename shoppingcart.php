<?php
    require 'header.php';
    $url = $_SERVER['PHP_SELF'];
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            header("Location: shoppingcart.php");
        }
        else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    header("Location: shoppingcart.php");
                }
            }
        }
    }
?>
<header>
  <link rel="stylesheet" type="text/css" href="./css/courses.css">
</header>
<div class="<?php if ($url = '/projects/Mini IT Project/assets/php/shoppingcart.php') {
              echo 'hidden';
            }
            ?>">
    <?php
        $query = "SELECT * FROM courses ORDER BY id ASC ";
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="main">
            <img src="<?php echo $row["img"]; ?>" class="img">
            </div>
            <div>
                <form method="post" action="shoppingcart.php?action=add&id=<?php echo $row["id"];?>" class="main">
                    <b class="generaltext"><?php echo $row["course_name"];?><br></b>
                    <b class="description"><?php echo $row["description"];?><br></b>
                    <b class="generaltext"><?php echo $row["price"];?>.0RM</b>
                    <input type="hidden" name="hidden_name" value="<?php echo $row["course_name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="text" name="quantity" class="input" required placeholder="Quantity">
                    <button class="addtocartbuttn" style="display:inline;" type="submit" name="add">Add to cart</button>
                </form>
            </div>
    <?php
        }
    ?>
</div>
<div class="<?php if ($url = '/projects/Mini IT Project/assets/php/shoppingcart.php') {
              echo 'mainshoppingcart';
            }
              ?>">
  <h1 style="text-align:center">Shopping Cart</h1>
    <table class="main">
    <tr>
        <th width="20%">Product Name</th>
        <th width="10%">Quantity</th>
        <th width="13%">Price Details</th>
        <th width="20%">Total Price</th>
        <th width="17%">Remove Item</th>
    </tr>

    <?php
        if(!empty($_SESSION["cart"])) {
            $total = 0;
            foreach ($_SESSION["cart"] as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value["item_name"]; ?></td>
                    <td><?php echo $value["item_quantity"]; ?></td>
                    <td>RM <?php echo $value["product_price"]; ?></td>
                    <td>
                        RM <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                    <td>
                        <a href="shoppingcart.php?action=delete&id=<?php echo $value["product_id"]; ?>">
                        <span class="removebutton">Remove Item</span></a>
                    </td>

                </tr>
                <?php
                $total = $total + ($value["item_quantity"] * $value["product_price"]);
            }
    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>
                        Total is: RM <?php echo number_format($total, 2); ?>
                    </th>
                    <th>
                        <a href="payment-method.php">
                            <button class="addtocartbuttn" style="display:inline">Proceed to checkout</button>
                        </a>
                    </th>
                </tr>
                <?php
            }
        ?>
    </table>
</div>