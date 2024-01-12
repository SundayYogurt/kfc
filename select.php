<html>

<head>
    <title> Select to See Detail 111</title>
    <link rel="stylesheet" href="syleselect.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    require "connect.php";
    $sql = "SELECT * FROM tbl_customer,tbl_food,tbl_orders,tbl_orders_detail,tbl_menu where tbl_customer.customerID = tbl_orders.customerID AND tbl_orders.orderID = tbl_orders_detail.orderID AND tbl_orders_detail.foodID = tbl_food.foodID AND tbl_food.menuID = tbl_menu.menuID";


    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>
    <div class="table-style">
        <table>
            <tr>
                <th width="90">
                    <div class="order">OrderID </div>
                </th>
                <th width="140">
                    <div class="first-name">firstName </div>
                </th>
                <th width="120">
                    <div class="dates">dates </div>
                </th>
                <th width="100">
                    <div class="foodname">foodName </div>
                </th>
                <th width="50">
                    <div class="menu">menuName </div>
                </th>
                <th width="70">
                    <div class="qt">quantity</div>
                </th>
            </tr>
    </div>
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