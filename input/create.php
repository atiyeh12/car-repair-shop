<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once ('../database/config.php');
?>
   

    <?php
            if (isset($_POST['insert'])) {
    
                $stmt = $conn->prepare("INSERT INTO input (customer_id,price,description) VALUES (?, ?, ?)");
    
                $stmt->bind_param("sss",$customerId,$price, $description);
                $description= $_POST['description'];
                $price= $_POST['price'];
                $customerId= $_POST[$customerId];
               

                $stmt->execute();
    
                $lastInsertId = $conn->insert_id;
    
                if ($lastInsertId) {
                    echo "<script>alert('record insert successfully');</script>";
                    echo "<script>window.location.href='index.php'</script>";
                } else {
                    echo "<script>alert('Error');</script>";
                    echo "<script>window.location.href='index.php'</script>";
                }
            }
    
    
                ?>
                    
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <title>create a car</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>
        <body>

        <div class="container">
            <h2>create input</h2>
                <form method="post">
                    <input type="hidden" name="insert" value = "true"/>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="price">price:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" placeholder=" show price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">description:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" placeholder="  description">
                        </div>
                    </div>
                 
       
                    <?php
                    echo "<select name='customerId'>";
                    $sql2 = "SELECT * FROM customers" ;
                                $result2 = $conn->query($sql2);
                                while($row2 = $result2->fetch_assoc()) {
                                    echo "<option value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";
                                }
                            echo "</select>";
                    ?>
                    
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
   
        </div>

</body>
</html>