<?php 
    session_start();
    require("config.php");

    if(empty($_SESSION['user_id'] )|| empty($_SESSION['logged_in'])){
        echo "<script> alert('Please Login to Continue !')
             window.location.href='login.php';
             </script>";
    }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href= "bootstrap/style.css">

</head>
<body>

    <?php 

        $sql=$pdo->prepare("SELECT * FROM customers ORDER BY id DESC ");  
        $sql->execute();  
        $result=$sql->fetchALL(PDO::FETCH_ASSOC);

    ?>
   
    <div class="container">
        <div class="row">

            <div class="col mt-30">

            <div class="row justify-content-between mr-ml-0">
            
                <a href="post-add.php" class="btn btn-success">Add New </a>
                <h2>  Mobile Service Record </h2>
                <a href="logout.php" class="btn btn-primary">Logout</a>
              
            </div>

            <div class="mt-30"> <!-- search -->
               <form action="index-search.php" method="POST">
                    <input type="text" name="name" placeholder="name"  style="padding:4px 8px;" required> 
                    <input type="text" name="device" placeholder="device" style="padding:4px 8px;">
                    <input type="submit" name="search" value="Search" style="padding:4px 15px;">
               </form>
            </div> 
         
        <div class="tb mt-30 table-responsive">
            <table class="table table-striped">

                <thead class="table-info ">
                    <tr >
                        <th scope="col"> No </th>
                        <th scope="col"> Name </th>
                        <th scope="col"> Address </th>
                        <th scope="col"> Phone No </th>
                        <th scope="col"> Type of Devices </th>
                        <th scope="col"> Description </th>
                        <th scope="col"> Price </th>
                        <th scope="col"> Date </th>
                        <th scope="col"> Remark </th>
                        <th scope="col"> Action </th>
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