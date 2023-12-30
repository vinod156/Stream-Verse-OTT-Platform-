<html>
    <head>

        <title>SIGN UP</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script src="bootstrap.min.js"></script>
        <style>

        form {
            
            margin-left: 250px;
        }

        body{
            font-size: large;
            background-image: url('sig.jpg');  
            background-repeat:no-repeat;
            background-size:100%;
            color:white; 
        }



        input{
            margin-left: 115px;
            opacity:0.7;
            
        }

        input , label{
            margin-top: 15px;
            margin-bottom: 15px;
           
            
        }

        button{
            width: 100px;
            margin-top: 50px;
            margin-left: 220px;
        
        }

        img{
            height:60px;
            width:60px;
            border-radius:50px;
        }

       

       


        </style>
    </head>
    <body>
        
        <div class="container h-75">
        <div class='navbar mt-3 ms-3'>
             <a href='projlog.php' class='navbar-brand'><img src='back.png'></a>
        </div>    
            <form method='post' >

                <div>
                    <label><b>USER NAME :</b></label>
                    <input type="text" name='uname' class="form-control w-50" pattern= '^[A-Za-z0-9]+$' placeholder='Alpha Numerics Only'>
                </div>

                <div>
                    <label><b>PASSWORD :</b></label><br>
                    <input type="password" name='pwd' class="form-control w-50" pattern='^(?=.*[0-9])(?=.*[a-z])(?=.*[@_-])(?=.*[A-Z]).{8,}' placeholder='pattern = atleast 1 cap , 1 small , 1 special , 1 num'>
                </div>
                <div>
                    <label><b>PROFILE PICTURE :</b></label>
                    <input type="file" name='pic' class="form-control w-50">
                </div>
                <div>
                    <button type="submit" class="form-control w-25"><b>SAVE</b></button>
                </div>



            </form>

        </div>
    </body>
</html>

<?php 

include 'connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    
    
    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    $pic = $_POST['pic'];





    $sql = "SELECT * FROM sitedata WHERE username='".$username."' AND password='".$password."' ";
    $res = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($res);

    if($num == 0){

        $query1 = "INSERT INTO sitedata (username , password , picture) VALUES ('$username', '$password' , '$pic')";
        mysqli_query($conn , $query1);
        header('Location:projlog.php');
        
        ?>
        <script>alert('REGISTRATION COMPLETED')</script>
        
        <?php
    }

    else{


            ?>

            <script>alert('YOU HAVE ALREADY REGISTERED \n -----GO BACK TO LOGIN PAGE-----');</script>
            
            
            <?php
            
            
    }
    
    
}

?>

