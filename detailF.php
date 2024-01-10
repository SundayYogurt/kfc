<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail of firstName</title>
</head>
<body>
    <?php if (isset($_GET["firstName"]))
    {
        $strFID = $_GET["firstName"];
    }

require 'connect.php' ;
$sql = "SELECT * FROM tbl_customer where firstName = ?"; 
$params = array($strFID);
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

  <table width="400" border="1">
        <tr>
            <th width="90">
                <div align="center">customerID </div>
                <td><?php echo $result["customerID"] ?></td>
            </th>
</tr>
<tr>
            <th width="140">
                <div align="center">firstName </div>
                <td><?php echo $result["firstName"] ?></td>
            </th>
</tr>
<tr>
            <th width="120">
                <div align="center">surname </div>
                <td><?php echo $result["surname"] ?></td>
            </th>
</tr>
<tr>
            <th width="100">
                <div align="center">houseNo </div>
                <td><?php echo $result["houseNo"] ?></td>
            </th>
</tr>
<tr>
            <th width="100">
                <div align="center">subDistrict </div>
                <td><?php echo $result["subDistrict"] ?></td>
            </th>
            
</tr>
<>
            <th width="100">
                <div align="center">district </div>
                <td><?php echo $result["district"] ?></td>
            </th>
<tr>
            <th width="100">
                <div align="center">province </div>
                <td><?php echo $result["province"] ?></td>
            </th>
            
</tr>
<tr>
            <th width="100">
                <div align="center">zipcode </div>
                <td><?php echo $result["zipcode"] ?></td>
            </th>
            
</tr>    

</body>
</html>