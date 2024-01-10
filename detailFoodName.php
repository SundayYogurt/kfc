<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail of firstName</title>
</head>

<body>
    <?php if (isset($_GET["foodName"])) {
        $strFNID = $_GET["foodName"];
    }

    require 'connect.php';
    $sql = "SELECT * FROM tbl_food where foodName = ?";
    $params = array($strFNID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>

    <table width="400" border="1">
        <tr>
            <th width="90">
                <div align="center">foodID </div>
            <td><?php echo $result["foodID"] ?></td>
            </th>
        </tr>
        <tr>
            <th width="140">
                <div align="center">foodName </div>
            <td><?php echo $result["foodName"] ?></td>
            </th>
        </tr>
        <tr>
            <th width="120">
                <div align="center">foodDescription </div>
            <td><?php echo $result["foodDescription"] ?></td>
            </th>
        </tr>
        <tr>
            <th width="100">
                <div align="center">foodPrice </div>
            <td><?php echo $result["foodPrice"] ?></td>
            </th>
        </tr>
        <tr>
            <th width="100">
                <div align="center">MenuID </div>
            <td><?php echo $result["MenuID"] ?></td>
            </th>
        </tr>


</body>

</html>