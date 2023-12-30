<?php

session_start();
?>

<html>

    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script src="bootstrap.min.js"></script>
    </head>
    <style>

        body{
            background-color: black;
            font-size: 30px;
            
        }


        div{
            width:500px;
            padding:100px;
        }
        input{
            width:200px;
        }

        #old{
            margin-top:30px;
            margin-bottom:20px;

        }
        #new{
            margin-top:40px;
            margin-bottom:20px;
        }

        #sub{
            margin-left: 70px;
            margin-top:50px;
        }
    
        #hel{
            color:red;
            margin-left:30px;
        }
        #suc{
            color:green;
            margin-left:50px;
        }

    </style>
    <body>
       <div>
        <form method="POST" >


            <label for="pass1" class="form-label " style='color:white'><b>UPDATE PASSWORD</b></label>
  
  
                <input id='old' type="password" name='pass1'  class="form-control " placeholder='Old password' required  pattern='^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}'>   
                <span><h6 id='hel'></h6></span>   
                <input id='new' type="text" name='pass2'  class="form-control " placeholder='New password' required  pattern='^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}'>  
                <span><h5 id='suc'></h5></span>   
                <input type="submit" class="form-control w-50" id="sub">
  
            </form>
       </div>
            
    </body>
</html>


 
<?php

  
include 'connection.php';



if($_SERVER['REQUEST_METHOD']=='POST')   {
       

   $pass1 = $_POST['pass1'];
   
   $query = "SELECT password FROM sitedata WHERE username = '".$_SESSION['username']."' AND password = '".$pass1."' ";
   $res = mysqli_query($conn , $query);
   $num = mysqli_num_rows($res);
   if($num > 0){
    $pass2 = $_POST['pass2'];
    $querypass = "UPDATE sitedata SET password ='$pass2' WHERE username ='".$_SESSION['username']."' ";
    mysqli_query($conn , $querypass);
   

    ?>

    <script>
           document.getElementById('suc').innerHTML = "password UPDATED";
    </script>
    
    <?php
    
    
    
   }
   else{
       ?>

       <script>  
           document.getElementById('hel').innerHTML = "OLD password NOT MATCHED";
       </script>

       <?php
       
   }
    
}




?>

