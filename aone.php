<?php
session_start();
include 'connection.php';
?>

<html>
    <head>
        <style>
            body{
                margin-left: 40px;
                background-color:black;
                
                
            }
            body::-webkit-scrollbar{
                display : none;
            }
            img{
                margin-left:20px;
            }
            video{
                width: 500px;
                height: 400px;
                border: 1px solid black;
                border-radius :20px;
                margin-top:20px;
                
                
            }
            #title{
                
                position: absolute;
                top: 50px;
                left: 700px;
                color:white;
            }
            #about{
                position: absolute;
                top: 130px;
                left: 700px;
                font-size:20px;
                max-width:430px;
                color:white;
            }
            #rating{
                display: inline;
                position:absolute;
                left:700px;
                top:380px;
                color:white;

            }
            #videospace{
                margin-top:40px;
               
            }

            #info{
                margin-top:40px;
                
            }
      
            #backbutton {
                border-radius:50px;
                width:50px;
                height:50px;
                float:left;
            }
            #totalpage{
                margin-left:60px;
            }
            #reviews{
                margin-left:20px;
                color:red;
                
            }

            #reviewsview{
                height:500px;
                width:500px;
                border:1px solid black;
                color:white;
            }
      
            #reviewbutton{
                height:50px;
                width:200px;
                border-radius:10px;
                position:absolute;
                top:800px;
                left:500px;
                background-color:lightgreen;
                
            
            }

            #reviewbox::-webkit-scrollbar{
                opacity:;
            }
        
            #reviewbox{
                
                max-height:350px;
                overflow:auto;
                
                
            
            }
            /* #commentbox{
                position:absolute;
                left:740px;
                top:510px;
                height:700px;
                width:400px;
              

            } */
            #but{
                margin-left:25px;
                font-size:15px;
                max-width:500px;
                overflow-wrap:break-word;
                color:white;
                padding:10px;
            }
        #noreview{
                margin-top:110px;
                margin-left:400px;
                color:white;
            }
            hr{
                border:1px dashed blue;
                width:1000px;
            }
            /* #rat{
                
                height:80px;
                width:50px;
                border-radius:50px;
            } */
          
/* 
            #line{
                border : 4px solid black;
                height:650px;
                width:0.1px;
                border-radius:50px;
                position:absolute;
                left:720px;
                top:510px;
            } */

        </style>
    </head>
    <body>
       
        <a href='navbar.php'><img id='backbutton' src='back.png'></a>
 <div id='totalpage'>
 <div id='videospace'>
 <?php
         $name = $_COOKIE['moname'];?>  
        
     <?php   
        
         $sal = "SELECT * FROM movielist WHERE poster = '$name' ";
          $res = mysqli_query($conn , $sal); 
          $num = mysqli_num_rows($res);
          if($num>0){
            $datas = array();
            while($data =  mysqli_fetch_assoc($res)){
                $datas[] = $data;
        
            }
            foreach($datas as $dd){
                $moviename = $dd['title'];
                $moname = $dd['name'];
                echo "<html><video controls poster='$dd[poster]'><source src='$dd[link]' ></video></html>";

            }
        }

        ?> 
      
        
        
        <h1 id='title'><?php echo $moviename ?></h1>
        
            <b><?php echo "<html><p id='about'><b>$dd[descriptin]</b></p></html>"?></b>
    
       <?php echo "<html> <h1 id='rating'>Rating : $dd[rating]</h1></html>" ?></h1>
        </div>
       <div id='info'>
       
        <div id='reviewbox'>
        <h1 id='reviews'>
            Reviews</h1>

            <?php 
            $nam = $dd['name'];
            $sall = "SELECT * FROM $nam  ";
            $resu = mysqli_query($conn , $sall); 
            $num = mysqli_num_rows($resu);
           if($num>0){
            $datta =array();
            while($dataa =  mysqli_fetch_assoc($resu)){
                $datta[] = $dataa;
            }
            foreach($datta as $ddd){
                echo "<html><hr><p id='but'>$ddd[reviews]</p></html>";
            } 
           }
           else{
            echo "<html><h1 id='noreview'>No review Yet</h1></html>";
           }


            ?>
            
       

        </div>
        <a href='addreview.php'><button id='reviewbutton'><b>Write a Review</b></button></a>


        <!-- <div id='commentbox'>
             <h1 id='comments'>Comments</h1>
        </div>

        <div id='line'></div> -->
    
    
        </div>
    </body>
</html>