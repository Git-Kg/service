<?php 
    session_start();
    require("config.php");

    if(empty($_SESSION['user_id'] ) || empty($_SESSION['logged_in'])){
        echo "<script> alert('Please Login to Continue !')
             window.location.href='login.php';
             </script>";
    }else{
       
        if(!empty($_POST)){
          
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $device = $_POST['device'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $remark = $_POST['remark'];
                                                              
            $sql=$pdo->prepare("INSERT INTO customers (name,address,phone,device,description,price,remark) VALUES (:name,:address,:phone,:device,:description,:price,:remark)");
            
            $sql->bindParam(":name",$name,PDO::PARAM_STR);
            $sql->bindParam(":address",$address,PDO::PARAM_STR);
            $sql->bindParam(":phone",$phone,PDO::PARAM_STR);
            $sql->bindParam(":device",$device,PDO::PARAM_STR);
            $sql->bindParam(":description",$description,PDO::PARAM_STR);
            $sql->bindParam(":price",$price,PDO::PARAM_INT);
            $sql->bindParam(":remark",$remark,PDO::PARAM_STR);

            $result=$sql->execute();
        
            if($result){
                echo "<script> alert('New Record is Successful Added'); 
                    window.location.href='index.php';
                    </script>";
                }
           
        } 
    }

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Post Add</title>
     <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
     <link rel="stylesheet" href= "bootstrap/style.css">
 </head>
 <body>
 <div class="container ">
           <div class="row ">
                <div class="col-3"></div>
                <div class="col addbg">
                    <h2 > Add New Record </h2>

                    <form action="post-add.php" method="POST" >

                        <div class="form-group">
                            <label for="name"> Name </label>
                            <input  class="form-control bor" type="text" name="name" required >
                        </div>

                        <div class="form-group ">
                            <label for="address"> Address </label>
                            <input  class="form-control bor" type="text" name="address" > 
                        </div>

                        <div class="form-group">
                            <label for="phone"> Phone No </label>
                            <input  class="form-control bor" type="text" name="phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="device"> Type of Device </label>
                            <input  class="form-control bor" type="text" name="device" required >
                        </div>

                        <div class="form-group">
                            <label for="description"> Description </label>
                            <input class="form-control bor" type="text" name="description"  required>
                        </div>

                        <div class="form-group">
                            <label for="price"> Price </label>
                            <input  class="form-control bor" type="price" name="price" required >
                        </div>

                        <div class="form-group">
                            <label for="remark"> Remark </label>
                            <input  class="form-control bor" type="text" name="remark"  >
                        </div>

                       
                         <button  class="btn btn-success bor" type="submit"> Add New </button>
                         <button class="btn btn-danger bor"> <a href="index.php">Back</a> </button>


                 </form>
                    
                </div>

                <div class="col-3"></div>
           </div>
       </div>
 </body>
 </html>