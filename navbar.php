<?php

session_start();

include 'connection.php';

$sql =  "SELECT picture FROM sitedata WHERE username = '".$_SESSION['username']."'; ";
$res = mysqli_query($conn , $sql);
$row = mysqli_fetch_assoc($res);
$img = $row['picture'];

?>


<html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script src="bootstrap.min.js"></script>

        <style>

            #body{
                margin: 20px;
                background-color: black ;
        

            }

            #body::-webkit-scrollbar{
                display: none;

            }

            #navmain{
                background-color: rgba(29, 27, 27, 0.2);
                border-radius:10px;
                height: 100px;
                width: 100%;
            }

            #navli {
                float: right;
            }

            #userdiv{
                height:70px;
                width:70px;
                border-radius:50px;
                background-color:white;
            
            }

            img{
                border-radius:50px;
                
            }
            #slider{
                margin-top: 50px;
                height:400px;
                border-radius:20px;
            }

            #main{
                height: 350px;
                width:100%  ;
                overflow-x: scroll;
                overflow-y: hidden;
                border-radius: 30px;
                
            
            }

            #vid{

                width:100%;
                height:100%;
            }
            #main::-webkit-scrollbar{
                display : none;
            }


            .carousel , .card{
                scale:0.95;
            }
           
            .carousel:hover {
                scale:1;
                transition:0.2s;
            }

            .card:hover{
                scale:1.03;
                transition:0.2s;
            }


            video , .card ,#poste{
                height: 300px;
                width: 250px;
                border-radius:20px;
                object-fit:fill;
            
            }

            li{
                padding: 10px;
            
            }

            figcaption{
                
                text-align: center;
                font-size: large;
                color: white;
            }

            h3{
                color: red;
                margin-top: 50PX;
                margin-left: 50px;
            }

            a {
                text-decoration: none;
            }

            #bar{
                padding:30px;
            }

            #prof{
                padding:20px;
            }
            
            #accmenu{
                width:220px;
                
            }

            img{
                width:100%;
                height:100%;
            }

            #box{
                height:300px;
                width:750px;
                position:absolute;
                top:150px;
                left:180px;
                background-color:silver;
                border-radius:10px;
                display:none;
            
            }

            td{
                padding:20px;
            }

            button{
                width:100px;
                height:50px;
                border-radius: 10px;
                border:none;
                font-family:italic;
            }

            footer a{
                color:white;
                float:right;
                margin-right:40px;
            }

            p{
                float:right;
            }

            #logo{
                height:100px;
                width:100px;
                border-radius:20px;
            }

       
         
        </style>
    </head>


    <body id="body">



        <div  id="navmain" '>

        <img id='logo' src='logo.jpg'>
            <nav class="navbar navbar-expand  " id='navli' >

              
                
                <ul class="navbar-nav "  >
                   
                    <li id='bar' class="nav-item active"><a href="" style='color:white;' ><b>Home</b></a></li>
                    <li id='bar' class='nav-item'><a href='social.html'><b>Social Media</b></a></li>
                    <li id='bar' class="nav-item"><a  href="search.php"><b> Search</b></a></li> 
                    <li id='bar' class="nav-item dropdown" id='acc'><a  href="" class='nav-link dropdown-toggle'  data-bs-toggle='dropdown'><b><?php echo $_SESSION['username']; ?></b></a>

                        <ul class='dropdown-menu' id='accmenu'>
                            
                            <li><a href='profile.php' class='dropdown-item'><b>PROFILE</b></a></li>
                            <li><button  onclick ='theme()' class='dropdown-item'><b>CHANGE THEME</b></button></li>
                            <li><a href='logout.php' class='dropdown-item'><b>LOG OUT</b></a></li>
                            
                        </ul>       


                    </li>
                    <li  class='nav-item'><div id = 'userdiv'> <img id = 'userfig' src='<?php  echo $img; ?>'></div><li>
                </ul>
            </nav>

        </div>


            <div class="carousel slide bg-info " id="slider" data-bs-ride="carousel">

                <ol class="carousel-indicators">

                    <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="2"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="3"></li>

                </ol>

                <div class="carousel-inner">

                    <div class="carousel-item active" data-bs-interval="3000">
                        <video id="vid" poster="dunes.jpg" controls ><source src="Dune.mp4"></video>
                    </div>

                    <div class="carousel-item" data-bs-interval="5000">
                        <video  id="vid" poster='images.jpeg' controls>  <source src="Major.mkv"></video>
                    </div>

                    <div class="carousel-item" data-bs-interval="5000">
                        <video  id="vid" poster='kashs.jpg' controls>  <source src="The Kashmir Files.mkv"></video>
                    </div>

                    <div class="carousel-item" data-bs-interval="5000">
                        <video  id="vid" poster='ransss.jpg' controls>  <source src="Rangasthalam.mp4"></video>
                    </div>

                </div>


                <a href="#slider" class="carousel-control-prev" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                <a href="#slider" class="carousel-control-next" data-bs-slide="next"><span class="carousel-control-next-icon"></span></a>
    
            </div>



    <fieldset>
            <legend><h3>Oscar Movies</h3></legend>
            
            <div class=" bg-dark" id='main'>
                 <nav class="navbar navbar-expand">
                    <ul class="navbar-nav">

                        <?php   
                            $sal = "SELECT link , poster FROM movielist WHERE language = 'english' ORDER BY rand() LIMIT 6";
                            $res = mysqli_query($conn , $sal); 
                            $num = mysqli_num_rows($res);
                            if($num>0){
                                $datas = array();
                                while($data =  mysqli_fetch_assoc($res)){
                                    $datas[] = $data;
                                }
                                foreach($datas as $dd){
                                    echo "<html><li class='nav-item'><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></li></html>";
                                }   
                            }
                        ?>

                        <li class="nav-item"><div class="card"><a href='english.php'><img src='view.jpg'></a></li>

                    </ul>
                </nav>
            </div>
    </fieldset>

    <fieldset>
        <legend><h3>Tollywood Movies</h3></legend>
             <div class=" bg-dark" id='main'>
                <nav class="navbar navbar-expand">
                    <ul class="navbar-nav">

                    <?php   
                        $sal = "SELECT link , poster FROM movielist WHERE language = 'telugu' ORDER BY rand() LIMIT 6";
                        $res = mysqli_query($conn , $sal); 
                        $num = mysqli_num_rows($res);
                       if($num>0){
                            $datas = array();
                            while($data =  mysqli_fetch_assoc($res)){
                                $datas[] = $data;
                            }
                            foreach($datas as $dd){
                                echo "<html><li class='nav-item'><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></li></html>";
        
                            }
                        }
                    ?>
                    <li class="nav-item"><div class="card"><a href='telugu.php'><img src='view.jpg'></a></li>

                    </ul>   
                </nav>
            </div>
    </fieldset>
    <fieldset>
        <legend><h3>Bollywood Movies</h3></legend>
            <div class=" bg-dark" id='main'>
                <nav class="navbar navbar-expand">
                    <ul class="navbar-nav">

                    <?php   
                        $sal = "SELECT link , poster FROM movielist WHERE language = 'hindi' ORDER BY rand() LIMIT 6";
                        $res = mysqli_query($conn , $sal); 
                        $num = mysqli_num_rows($res);
                        if($num>0){
                            $datas = array();
                            while($data =  mysqli_fetch_assoc($res)){
                                $datas[] = $data;
                            }
                            foreach($datas as $dd){
                                echo "<html><li class='nav-item'><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></li></html>";
        
                            }      
                        }
                    ?>
                    <li class="nav-item"><div class="card"><a href='hindi.php'><img src='view.jpg'></a></li>

                    </ul>
                </nav>
            </div>

    </fieldset>
   



<div class="container" id='box'>
       

       <table>
           <tr>
               <td> <button class="bg-info" id='thmsel1' value="lightblue" onclick='colo1()'>         LIGHT BLUE        </button></td>
               <td> <button class="bg-success" id='thmsel2' value="aquamarine" onclick='colo2()'>     AQUA MARINE       </button></td>
               <td> <button class="bg-light" id='thmsel3' value="white" onclick='colo3()'>             WHITE             </button></td>
               <td> <button class="bg-danger" id='thmsel4' value="brown"  onclick='colo4()'>          BROWN             </button></td>
               <td> <button class="bg-dark" id='thmsel5' value="black" onclick='colo5()'>             BLACK         </button></td>
              
           </tr>
           <tr>
               <td> <button id='thmsel6' value="violet" onclick='colo6()' style='background-color:violet'>      VIOLET      </button></td>
               <td><button id='thmsel7'  value="cyan" onclick='colo7()' style='background-color:cyan'>          CYAN        </button></td>
               <td> <button class='bg-secondary' id='thmsel8' value="grey" onclick='colo8()'>                   GREY        </button></td>
               <td><button id='thmsel9'  value="pink" onclick='colo9()' style='background-color:pink'>          PINK        </button></td>
               <td> <button id='thmsel10' value="silver" onclick='colo10()' style='background-color:silver'>    SILVER      </button></td>
           </tr>
           <tr>
               <td></td>
               <td></td>
               <td><button id='done' onclick='done()'><b>DONE</b></button></td>
               <td></td>
               <td></td>
           </tr>    
       </table>

     </div>
<footer class='container mt-5'><p>Developed by : Y.VINOD KUMAR</p><a href='mailto:r180780@rguktrkv.ac.in'>Contact us</a></footer>

</body>  
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

<script>


       function theme(){
        let them = document.getElementById('box');
        them.style.display = 'block';
       }
      
       function colo1(){
         let val =   document.getElementById('thmsel1').value;
           document.getElementById('body').style.backgroundColor = val ;
       }     
       function colo2(){
         let val =   document.getElementById('thmsel2').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo3(){
         let val =   document.getElementById('thmsel3').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo4(){
         let val =   document.getElementById('thmsel4').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo5(){
         let val =   document.getElementById('thmsel5').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo6(){
         let val =   document.getElementById('thmsel6').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo7(){
         let val =   document.getElementById('thmsel7').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo8(){
         let val =   document.getElementById('thmsel8').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo9(){
         let val =   document.getElementById('thmsel9').value;
           document.getElementById('body').style.backgroundColor = val ;
       }
       function colo10(){
         let val =   document.getElementById('thmsel10').value;
           document.getElementById('body').style.backgroundColor = val ;
       }

       function done(){
        let them = document.getElementById('box');
        them.style.display = 'none';
       
       }

        
</script>


</html>

