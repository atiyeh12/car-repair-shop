<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once ('../database/config.php');


    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="style.css">
            <style>

            
            </style>
        </head>
        <body>
            <p class="outset">cars</p>
            <?php

            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                // output data of each row
                ?>
                <table style="width:100%" border="2">
                    <tr>
                        <th>name</th>
                        <th>model</th>
                        <th>colour</th>
                        <th>plate</th>
                        <th>edit item </th>
                        <th>delete item</th>

                    </tr>   
            
                    <?php
            
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row["name"]; ?>
                            </td>

                            <td>
                                <?php echo $row["model"]. " " ; ?>
                            </td>
                        
                            <td>
                                <?php echo $row["color"]; ?>
                            </td>
                            <td>

                                <?php echo $row["plate"]. " " ; ?>

                             </td>  
                    
                                        <td><a href="update.php?id=<?php echo $row ['id']; ?>">edit</a></td>
                                        <td><a href="index.php?del=<?php echo  $row ['id']; ?>">delete</a></td>
                                </tr>
                                <?php
                            }
                        } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>

    </body>
    </html>