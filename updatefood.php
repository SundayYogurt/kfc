<?php
require "connect.php";
$sql_2 = "select * from tbl_menu";
$stmt_2 = $conn->prepare($sql_2);
$stmt_2->execute();

?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE_food</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    </style>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>
        <center><br>
            <h1>UPDATE</h1>
            <br>
        </center>

        <form action="updatefood.php" method="POST">
            <center><input type="text" placeholder="Enter foodID" name="foodID"></center>
            <br>
            <center><input type="text" placeholder="foodName" name="foodName"></center>
            <br>
            <center><input type="text" placeholder="foodDescription" name="foodDescription"> </center>
            <br>
            <center><input type="number" placeholder="foodPrice" name="foodPrice"> </center>
            <br>
            <br>
            <center>
                <label> กรุณาใส่รหัสเมณู </label>
                <select name="MenuID">
                    <?php while ($cc = $stmt_2->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                        <option value="<?php echo $cc['menuID'] ?>">
                            <?php echo $cc['menuName'] ?>
                        </option>
                    <?php
                    endwhile;
                    ?>
                </select>
                <br> <br>
            </center>
            <br>
            <center><input type="submit" value="Sent"> </center>



        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php
try {
    if (isset($_POST['foodID']) && isset($_POST['foodName'])) :

        require 'connect.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tbl_food SET foodName = :foodName, foodDescription = :foodDescription, foodPrice = :foodPrice, MenuID = :MenuID WHERE foodID = :foodID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':foodID', $_POST['foodID']);
        $stmt->bindParam(':foodName', $_POST['foodName']);
        $stmt->bindParam(':foodDescription', $_POST['foodDescription']);
        $stmt->bindParam(':foodPrice', $_POST['foodPrice']);
        $stmt->bindParam(':MenuID', $_POST['MenuID']);

        if ($stmt->execute()) :
            $message = 'Suscessfully add new customer';
        else :
            $messenge = 'Fail to add new customer';
        endif;
        echo $message;

        $conn = null;
    endif;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>