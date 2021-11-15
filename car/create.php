<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once ('../database/config.php');
?>
   

    <?php
            if (isset($_POST['insert'])) {
    
                $stmt = $conn->prepare("INSERT INTO cars (name,model,color,plate) VALUES (?, ?, ?, ?)");
    
                $stmt->bind_param("ssss", $name, $model, $color,$plate);
                $name = $_POST['name'];
                $model= $_POST['model'];
                $color= $_POST['color'];
                $plate= $_POST['plate'];
    
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
            <h2>update car</h2>
                <form method="post">
                <input type="hidden" name="insert" value = "true"/>
                <div class="form-group">
                <label class="control-label col-sm-2" for="name">name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="  name of car">
                </div>
                </div>
        <div class="form-group">
        <label class="controljadiddd
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="color">color:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="color" placeholder="  color of car"> 

        </div>        
        
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="plate">plate:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="plate" placeholder="  plate of car">
        </div>
        <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
        </div>
    </form>
    </div>

</body>
</html>