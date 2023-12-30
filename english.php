<?php 

include 'connection.php';

?>

<html>

<head>
    <style>

        body{
            background-color:black;
        }

        body::-webkit-scrollbar{
            display:none;
        }

        img{
            height:60px;
            width:60px;
            border-radius:50px;
        }

        div{
            margin-top:20px;
        }

        video{
            height:300px;
            width:250px;
            margin:25px;
        }
        img {
            height:300px;
            width:250px;
            border-radius:10px;
            
            
                      
        }
        #backimage{
            height:60px;
            width:60px;
            border-radius:50px;
        }
        #poste {
            height:300px;
            width:250px;
            margin-top:50px;
            margin-left:45px;
            border-radius:5px;
            background-color:black;
            border:none;
                      
        }
    </style>

</head>

    <body>
    <div class='navbar'>
<a href='navbar.php' class='navbar-brand'><img id='backimage' src='back.png'></a>
</div>

  <div>
  <?php
          $sal = "SELECT link , poster FROM movielist WHERE language = 'english' ;";
          $res = mysqli_query($conn , $sal);
          $num = mysqli_num_rows($res);
          $datas = array();
          while($data =  mysqli_fetch_assoc($res)){
              $datas[] = $data;
          }
          foreach($datas as $dd){
            echo "<html><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></html>";
          }
    ?>
  </div>
    </body>
</html> 
<script>

suc = document.querySelectorAll('#poste');
 for(let i  = 0 ; i < suc.length; i++){
    suc[i].addEventListener("click" , function(){
       
        let name = this.value;

        document.cookie = "moname=" + name;
        
         window.location = 'aone.php';
    });
 }


</script>