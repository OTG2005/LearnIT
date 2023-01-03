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
            header("Location: courses.php?action=add");
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
<div class="<?php if ($url = '/projects/Mini IT Project/assets/php/courses.php') {
              echo 'main';
            }
            ?>">
    <div class="successmessage">
        <?php
            if (isset($_GET["action"])){
                echo "course added successfully";
            }
        ?>
    </div>
    <?php
        $query = "SELECT * FROM courses ORDER BY id ASC ";
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="main">
            <img src="<?php echo $row["img"]; ?>" class="img">
            </div>
            <div>
                <form method="post" class="main" action="<?php
                                                if (isset($_SESSION['userId'])) {
                                                    echo 'courses.php?action=add&id='.$row["id"];
                                                }
                                                else {echo './php/userSignUp.php';
                                                }
                                            ?>">
                    <b class="generaltext"><?php echo $row["course_name"];?><br></b>
                    <b class="description"><?php echo $row["description"];?><br></b>
                    <b class="generaltext"><?php echo $row["price"];?>.0RM<br></b>
                    <input type="hidden" name="hidden_name" value="<?php echo $row["course_name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>"><br>
                    <select name="quantity" class="quantity" required>
                        <option value="">Quantity</option>
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="1">5</option>
                        <option value="1">6</option>
                        <option value="1">7</option>
                        <option value="1">8</option>
                        <option value="1">9</option>
                        <option value="10">10</option>
                    </select>
                    <button class="addtocartbuttn" style="display:inline;" type="submit" name="add">Add to cart</button>
                </form>
            </div>
    <?php
        }
    ?>
</div>
<div class="<?php if ($url = '/projects/Mini IT Project/assets/php/courses.php') {
              echo 'hidden';
            }
            ?>">
  <h1>Shopping Cart</h1>
    <table class="main">
    <tr>
        <th width="30%">Product Name</th>
        <th width="10%">Quantity</th>
        <th width="13%">Price Details</th>
        <th width="10%">Total Price</th>
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
                    <td><a href="shoppingcart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                class="">Remove Item</span></a></td>

                </tr>
                <?php
                $total = $total + ($value["item_quantity"] * $value["product_price"]);
            }
                ?>
                <tr>
                    <td colspan="3" text-align="right">Total</td>
                    <th text-align="right">$ <?php echo number_format($total, 2); ?></th>
                </tr>
                <?php
            }
        ?>
    </table>
</div>
