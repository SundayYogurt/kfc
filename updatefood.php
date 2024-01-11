<?php
require "connect.php";
$sql_2 = "select * from tbl_menu";
$stmt_2 = $conn->prepare($sql_2);
$stmt_2->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE_food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style>
        body {
            min-height: 100vh;
            background-image: url("./img.jpg");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        div {


            .input-food input {
                width: 70%;
                height: 45px;
                border-bottom-color: whitesmoke;
                border-top-color: transparent;
                border-left-color: transparent;
                border-right-color: transparent;
                outline: none;
                border-radius: none;

                background: transparent;

            }

            .input-FN input {
                width: 70%;
                height: 45px;
                border-bottom-color: whitesmoke;
                border-top-color: transparent;
                border-left-color: transparent;
                border-right-color: transparent;
                outline: none;
                border-radius: none;
                background: transparent;
            }

            .input-des input {
                width: 70%;
                height: 45px;
                border-bottom-color: whitesmoke;
                border-top-color: transparent;
                border-left-color: transparent;
                border-right-color: transparent;
                outline: none;
                background: transparent;
            }

            .input-p input {
                width: 70%;
                height: 45px;
                border-bottom-color: whitesmoke;
                border-top-color: transparent;
                border-left-color: transparent;
                border-right-color: transparent;
                outline: none;
                background: transparent;
            }

            .input-menuid select {
                width: 50%;
                height: 45px;

                outline: none;
                color: gray;
                text-align: center;
                border-bottom-color: whitesmoke;
                border-top-color: transparent;
                border-left-color: transparent;
                border-right-color: transparent;
                background: transparent;
            }

            .input-menuid label {
                color: whitesmoke;
                font-size: 20px;
            }

            .input-submit input {
                width: 50%;
                height: 45px;
                border: none;
                outline: none;
                box-shadow: 0 0 50px rgba(255, 255, 255, .5);
                border-radius: 5px;
                backdrop-filter: blur(20px);
                background: white;

            }

            .input-wrap {
                background: rgba(0, 0, 0, 0.2);
                border: 2px solid transparent;
                border-radius: 10px;
                backdrop-filter: blur(20px);
                width: 600px;
                height: 700px;
                box-shadow: 0 0 50px rgba(60, 60, 60);


            }

            p {
                text-align: center;
                color: whitesmoke;
                border: black;

            }

            .text-center {
                margin-left: auto;
                margin-right: auto;
                text-align: bottom;
            }
        }
    </style>
    <div>
        <div class="input-wrap">
            <center><br>
                <h1>
                    <P>UPDATE</P>
                </h1>
                <br>
            </center>

            <form action="updatefood.php" method="POST">
                <div class="input-food">
                    <center><input type="text" placeholder="Enter foodID" name="foodID"></center>
                </div>
                <div class="input-FN">
                    <br>
                    <center><input type="text" placeholder="foodName" name="foodName"></center>
                </div>
                <div class="input-des">
                    <br>
                    <center><input type="text" placeholder="foodDescription" name="foodDescription"> </center>
                </div>
                <div class="input-p">
                    <br>
                    <center><input type="number" placeholder="foodPrice" name="foodPrice"> </center>
                </div>
                <br>
                <br>
                <center>
                    <div class="input-menuid">
                        <p><label> Please insert menu ID </label></p>
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
                    </div>
                    <br> <br>
                </center>
                <div class="input-submit">
                    <br>
                    <center><input type="submit" value="OK"> </center>
                </div>


            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<div class="text-center">
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
</div>