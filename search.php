<?php 
     session_start();
     require("config.php");
 
     if(empty($_SESSION['user_id'] )|| empty($_SESSION['logged_in'])){
         echo "<script> alert('Please Login to Continue !')
              window.location.href='login.php';
              </script>";
     }else{

        if( isset($_POST)){

            $name = $_POST['name'];
            $device = $_POST['device'];
            $condition = [];
            $parameters = [];
    
            if( $name !="" ){
                $condition[] = " name=? ";
                $parameters[] = $name;
            }
    
            if( $device !=""){
            $condition[] = " device=? ";
            $parameters[] = $device;
            }
    
            $sql="SELECT * FROM customers ";
            $sql.="WHERE".implode("AND",$condition);
            $query = $pdo->prepare($sql);
            $query->execute($parameters);
   
            if( $query->rowCount() > 0 ){
                echo "<script> window.location.href='index-search.php'; </script>";
            }else{
                echo "<script> alert('There is No Record')</script>";
                echo "<script> window.location.href='index.php'; </script>";
                }
    
        }
           
     }

?>