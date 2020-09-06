<?php 

   // ယခုဖိုင် ( index-copy.php )သည် table data စမ်းသပ်ရန် အတွက်ဖြစ်သည် .

    require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> For Table Data Testing </title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href= "bootstrap/style.css">
    <link rel="stylesheet" href="bootstrap/datatable.css">
    <script src="bootstrap/jquery.js"> </script>
    <script src="bootstrap/datatable.js"></script>

    <script>
        $(document).ready( function () {
         $('.tbdata').DataTable();
          } );
    </script>

</head>
<body>

    <?php // ယခုဖိုင် ( index-copy.php )သည် table data စမ်းသပ်ရန် အတွက်ဖြစ်သည် .

        $sql=$pdo->prepare("SELECT * FROM customers ORDER BY id DESC ");  
        $sql->execute();  
        $result=$sql->fetchALL(PDO::FETCH_ASSOC);

        // ယခုဖိုင် ( index-copy.php )သည် table data စမ်းသပ်ရန် အတွက်ဖြစ်သည် .

    ?>
   
    <div class="container">
        <div class="row">

            <div class="col mt-30">

            <div class="row justify-content-between mr-ml-0">
            
                <a href="post-add.php" class="btn btn-success">Add New </a>
                <h2>  Mobile Service Record </h2>
                <a href="logout.php" class="btn btn-primary">Logout</a>
              
            </div>

         
        <div class=" mt-30 ">

            <table class="tbdata">

                <thead style="background-color:blue; color:yellow;">
                    <tr >
                        <th > No </th>
                        <th > Name </th>
                        <th > Address </th>
                        <th > Phone No </th>
                        <th > Devices </th>
                        <th > Description </th>
                        <th > Price </th>
                        <th > Date </th>
                        <th > Remark </th>
                        <th > Action </th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                if($result){
                        $count=0;
                    foreach($result as $show){     
                        $count+=1; ?>                  
                     <tr >
                        <td> <?php echo $count ?> </td>
                        <td> <?php echo $show['name']?> </td> 
                        <td> <?php echo $show['address']?> </td>                              
                        <td> <?php echo $show['phone'] ?> </td>
                        <td> <?php echo $show['device']?> </td> 
                        <td> <?php echo $show['description']?> </td>               
                        <td> <?php echo $show['price'].'/Kyats' ?> </td>
                        <td> <?php echo date('d/m/Y',strtotime($show['created_at'])) ?> </td>
                        <td> <?php echo $show['remark']?> </td>        
                        <td> 
                            <a href="edit.php?id=<?php echo $show['id'] ?>" class="btn btn-success">Edit</a>
                            <a href="delete.php?id=<?php echo $show['id'] ?>" class="btn btn-danger">Delete</a>
                       </td>
                    </tr>
                <?php
               
                    }
                }
                 ?>
            </tbody>

          </table>

        </div>
          
         </div>

        </div>
    </div>
</body>
</html>