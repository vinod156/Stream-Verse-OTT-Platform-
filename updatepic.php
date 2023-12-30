<?php

session_start();
include 'connection.php';

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script src="bootstrap.min.js"></script>
        <style>
               

body{
    background-color: silver;
    font-size: 30px;
}

div{
    width:500px;
    padding:90px;
}
input{
    margin-top:50px;
    margin-bottom:50px;
    width:200px;
}

#sub{
    margin-left: 70px;
    margin-top: 50px;
}

h2{
    position: relative;
    top:100px;
}

span{
    font-size:20px;
    margin-left:39px;
}


        </style>
    </head>
    <body>
        <div  id='div2'>
            <form method="post" class='ms-4'>
                      
                      <label for="pic" class="form-label "><b>UPDATE PROFILE PICTURE </b></label</label>
            
                      <input type="file" name='img' accept="image/*" class="form-control" required>
                      <span ><h4 id='msg'></h4></span>
                      <input type="submit" class="form-control w-50" id="sub">
                      
            
                      
                      </form>
            </div>
    </body>
</html>


 
<?php

  




if($_SERVER['REQUEST_METHOD']=='POST')   {

$image = $_POST['img'];
$queryim = "UPDATE sitedata SET picture = '$image' WHERE username ='".$_SESSION['username']."' ";
mysqli_query($conn , $queryim);

?>
<script>
    document.getElementById('msg').innerHTML = 'PROFILE PICTURE UPDATED';
    document.getElementById('msg').style.color = 'green';
</script>
<?php

  }  


?>

