<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail of order</title>
</head>
<body>
    <?php if (isset($_GET["orderID"]))
    {
        $strOrderID = $_GET["orderID"];
    }

require 'connect.php' ;
$sql = "SELECT * FROM tbl_orders where orderID = ?";
$params = array($strOrderID);
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

  <table width="400" border="1">
        <tr>
            <th width="90">
                <div align="center">orderID </div>
                <td><?php echo $result["orderID"] ?></td>
            </th>
</tr>
<tr>
            <th width="140">
                <div align="center">customerID </div>
                <td><?php echo $result["customerID"] ?></td>
            </th>
</tr>
<tr>
            <th width="120">
                <div align="center">dates </div>
                <td><?php echo $result["dates"] ?></td>
            </th>
</tr>
<tr>
            <th width="100">
                <div align="center">times </div>
                <td><?php echo $result["times"] ?></td>
            </th>
</tr>

</body>
</html>