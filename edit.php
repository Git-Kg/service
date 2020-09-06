<?php 
   session_start();
   require('config.php');

   if(empty($_SESSION['user_id'] )|| empty($_SESSION['logged_in'])){
      echo "<script> alert('Please Login to Continue !')
           window.location.href='login.php';
           </script>";
      }else{ 
         
         if(!empty($_POST)){ //!empty start 
           
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $device = $_POST['device'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $remark = $_POST['remark'];
            $id=$_GET['id'];

            $sql=$pdo->prepare(" UPDATE customers SET name=:name, address=:address, phone=:phone, device=:device, description=:description, price=:price,created_at=now(), remark=:remark WHERE id=:id");
            $sql->bindParam(':name',$name,PDO::PARAM_STR);
            $sql->bindParam(':address',$address,PDO::PARAM_STR);
            $sql->bindParam(':phone',$phone,PDO::PARAM_STR);
            $sql->bindParam(':device',$device,PDO::PARAM_STR);
            $sql->bindParam(':description',$description,PDO::PARAM_STR);
            $sql->bindParam(':price',$price,PDO::PARAM_INT);
            $sql->bindParam(':remark',$remark,PDO::PARAM_STR);
            $sql->bindParam(':id',$id,PDO::PARAM_INT);
            $update= $sql->execute();
            
               if($update){
                  echo "<script> alert('Update Record is Successful Updated'); 
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
     <title>Post Edit</title>
     <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
     <link rel="stylesheet" href= "bootstrap/style.css">
 </head>
 <body>

   <?php

         $id=(int)htmlspecialchars(stripslashes(trim($_GET['id'])));

         $sql=$pdo->prepare("SELECT * FROM customers WHERE id=:id");
         $sql->bindParam(':id',$id,PDO::PARAM_INT);

         $sql->execute();

         $result=$sql->fetchAll(PDO::FETCH_ASSOC);

   ?>

    <div class="container ">
         <div class="row ">

            <div class="col-3"></div>

            <div class="col addbg">
               <h2 > Edit Record </h2>

               <form action=" " method="POST" >

                  <div class="form-group">
                     <label for="name"> Name </label>
                     <input  class="form-control bor" type="text" name="name" value="<?php echo $result[0]['name'] ?>" >
                  </div>

                  <div class="form-group ">
                     <label for="address"> Address </label>
                     <input class="form-control "  type="text" name="address" value="<?php echo $result[0]['address'] ?>" >
                  </div>

                  <div class="form-group ">
                     <label for="phone"> Phone </label>
                     <input class="form-control "  type="text" name="phone" value="<?php echo $result[0]['phone'] ?>" >
                  </div>

                  <div class="form-group ">
                     <label for="device"> Type of Device </label>
                     <input class="form-control "  type="text" name="device" value="<?php echo $result[0]['device'] ?>" >
                  </div>

                  <div class="form-group ">
                     <label for="description"> Description </label>
                     <input class="form-control "  type="text" name="description" value="<?php echo $result[0]['description'] ?>" >
                  </div>

                  <div class="form-group ">
                     <label for="price"> Price </label>
                     <input class="form-control "  type="text" name="price" value="<?php echo $result[0]['price'] ?>" >
                  </div>

                  <div class="form-group ">
                     <label for="remark"> Remark </label>
                     <input class="form-control "  type="text" name="remark" value="<?php echo $result[0]['remark'] ?>" >
                  </div>
                 

                     <button  class="btn btn-success bor" type="submit"> Update Record </button>
                     <button class="btn btn-danger bor"> <a href="index.php">Back</a> </button>

               </form>
                    
            </div>

            <div class="col-3"></div>
         </div>
      </div>
 </body>
 </html>


 