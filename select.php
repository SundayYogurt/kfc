<html>

<head>
    <title> Select to See Detail 111</title>
</head>

<body style= "background-color:rgb(201, 201, 201)";>
    <?php
    require "connect.php";
    $sql = "SELECT * FROM tbl_customer,tbl_food,tbl_orders,tbl_orders_detail,tbl_menu where tbl_customer.customerID = tbl_orders.customerID AND tbl_orders.orderID = tbl_orders_detail.orderID AND tbl_orders_detail.foodID = tbl_food.foodID AND tbl_food.menuID = tbl_menu.menuID";


    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width="800" border="1">
        <tr>
            <th width="90">
                <div align="center">OrderID </div>
            </th>
            <th width="140">
                <div align="center">firstName </div>
            </th>
            <th width="120">
                <div align="center">dates </div>
            </th>
            <th width="100">
                <div align="center">foodName </div>
            </th>
            <th width="50">
                <div align="center">menuName </div>
            </th>
            <th width="70">
                <div align="center">quantity</div>
            </th>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td> <a href="detail.php?orderID=<?php echo $result["orderID"];

                                                    ?>">

                        <?php echo $result["orderID"]; ?>
                    </a>



                </td>

                <td>
                    <a href="detailF.php?firstName=<?php echo $result["firstName"]; ?>">
                        <?php echo $result["firstName"]; ?>
                    </a>
                </td>

                <td><?php echo $result["dates"]; ?></div>
                </td>
                <td><a href="detailFoodName.php?foodName=<?php echo $result["foodName"]; ?>">
                        <?php echo $result["foodName"]; ?>
                </td>
                <td><a href="detailmenu.php?menuName=<?php echo $result["menuName"]; ?>">
                        <?php echo $result["menuName"]; ?>
                        </div>
                </td>
                <td><?php echo $result["quantity"]; ?></td>

            </tr>

        <?php
        }
        ?>

    </table>

    <?php
    $conn = null;
    ?>

</body>

</html>