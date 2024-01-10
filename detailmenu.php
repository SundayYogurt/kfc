<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail of firstName</title>
</head>
<body>
    <?php if (isset($_GET["menuName"]))
    {
        $strMID = $_GET["menuName"];
    }

require 'connect.php' ;
$sql = "SELECT * FROM tbl_menu where menuName = ?"; 
$params = array($strMID);
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

  <table width="400" border="1">
        <tr>
            <th width="90">
                <div align="center">menuID </div>
                <td><?php echo $result["menuID"] ?></td>
            </th>
</tr>
<tr>
            <th width="140">
                <div align="center">menuName </div>
                <td><?php echo $result["menuName"] ?></td>
            </th>
</tr>

</body>
</html>