<?php
 session_start();
 
 ?>
<html>
    <head>
    <title>LOGIN</title>
    <script src='jquery.min.js'></script>>
    <style>

        body{
            background-image:url('loc.jpg');
            background-repeat:no-repeat;
            background-size:100% ;
           
            
            
        }
        #label{
            color:white;

        }

        #main{
            width:700px;
            height:100px;
            margin-top:90px;
            margin-left:300px;
            color:red;
            
            
        }

        form{
            padding:75px;
        }

        td{
            padding-right:20px;
            
            
        
        }

        input{
            height:50px;
            width:280px;
            border-radius:20px;
            margin-bottom:20px;
            opacity:0.3;
            border:none;
        }

         button{
            height:50px;
            width:200px;
            border:none;
            border-radius:20px;
            
        }

        a{
            text-decoration:none;
            color:black;
            margin-top:50px;
            
        }



        #regbut{
            height:34px;
            width:200px;
            border:none;
            background-color:white;
            border-radius:20px;
            position:absolute;
            left:380px;
            top:448px;
            opacity:0.7;
            text-align:center;
            padding-top:16px;
            

        }

        #subbut{
            position:absolute;
            left:600px;
            top:445px;
            opacity:0.7;
        }

    </style>
    
    </head>
    <body>
<div id='body'>
    
   <div id='main'>
   <form method="POST">
    <table>
    <tr>
    <th id='label'><label for="uname"> USER NAME  :</label></th><br><h2 id='msg2'></h2>
    <td></td>
    <td><input type="text" id='box' name="uname" required pattern= '^[A-Za-z0-9]+$'><br></td>
    </tr>
    <tr>
    <th id='label'><label for="lname">PASSWORD  :</label></th>
    <td></td>
    <td><input type="password" id='box'  name="pwd" required  pattern='^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}'></td>
    </tr>
    <table>
        <h2 id='msg'></h2>
   
    </form>
   </div>
</div>


   <div id='regbut'><a href='projsign.php'><b>REGISTER</b></a> </div>
   <div id='subbut'> <button id = 'submit' type ='submit'><b>LOGIN</b></button></div>


</body>
</html>

<?php

include 'connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    
    
    $_SESSION['username'] = $_POST['uname'];
    $_SESSION['password'] = $_POST['pwd'];

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    


    $sql = "SELECT * FROM sitedata WHERE username='".$username."' AND password='".$password."' ";
    $res = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($res);

  
    if($num > 0){

        $datas = array();
        while($data =  mysqli_fetch_assoc($res)){
            $datas[] = $data;
        }
        foreach($datas as $dd){
         
            if($dd['status']==NULL){
                $sqll = "UPDATE sitedata SET status='loginned' WHERE username='".$username."' AND password='".$password."' ";
                $resu = mysqli_query($conn , $sqll);
                header('Location:navbar.php');

            }
            else{
                echo "ALREADY LOGGED IN WITH THIS ACCOUNT";
            }
        
        }


    
             
    }
    else{
        ?>
        <script>
            document.getElementById('msg').innerHTML = 'USERNAME & PASSWORD DIDN\'T MATCH';
        </script>
        <?php   
        
        }
   
 


  


}

?>

