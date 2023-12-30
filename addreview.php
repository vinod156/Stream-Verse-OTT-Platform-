<?php 
session_start();
include 'connection.php';
$name = $_COOKIE['moname'];
?>


<html>
    <head>
        <style>

            body{
                background-color:black;
            }
            div{
                margin-top:30px;
                margin-left: 30px;
            }
            textarea{
                height:200px;
                width:700px;
                border-radius:10px;
            }

            form{
                padding:70px;
            }
            button{
                height: 50px;
                width:100px;
                border-radius: 10px;
                margin-top: 30px;
                margin-left: 500px;
            }

            #success , #fail{
                position:absolute;
                top:50px;
                left:500px;
            }
            #success{
                color:green;
            }
            #fail{
                color:red;
            }

            #backimage{
            height:60px;
            width:60px;
            border-radius:50px;
        }

        h2{
            color:white;}

        </style>
    </head>
    <body>
    <a href='javascript:history.back()' class='navbar-brand'><img  id='backimage' src='back.png'></a>
        <div>
            <form method="post">
                <h2>Write your review here :</h2>
                <textarea maxlength='1000' placeholder="Write your review within 1000 characters" name="userreview" required></textarea><br>
                <button type="submit"><b>Submit</b></button>
            </form>
        </div>
    </body>
</html>

<?php

$sall = "SELECT * FROM movielist WHERE poster = '$name' ";
$resu = mysqli_query($conn , $sall); 
$num = mysqli_num_rows($resu);
if($num>0){
  $datas = array();
  while($data =  mysqli_fetch_assoc($resu)){
      $datas[] = $data;

  }
  foreach($datas as $dd){
      $moviename = $dd['name'];

  }
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $review = $_POST['userreview'];  

    $sal = "INSERT INTO $moviename VALUES ('$review')" ;

    $res = mysqli_query($conn , $sal);
    
    if($res){
        echo "<html><h1 id= 'success'>Review Submitted...</h1></html>";
    }

else{
    echo "<html><h1 id='fail'>Something went wrong.....</h1></html>";
   
}

}


?>