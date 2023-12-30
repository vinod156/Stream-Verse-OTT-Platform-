<html>
    <head>
        <title>SEARCH</title>
        <meta name='viewport' content='width=devise-width, initial-scale=1.0'>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script src="bootstrap.min.js"></script>
    </head>
    <style>

        body{
            background-color: black;
        }

        body::-webkit-scrollbar{
            display:none;
        }
        .navbar{
            margin-top: 50px;
            background-color: siver;
            border-radius: 15px;
        }
        input{
            width:400px;
            height: 50px;
            border:none;
            
            
        }
        #search{
            position:absolute;
            right:300px;
            margin-bottom:100px;
        }
        button{
            border: none;
        
        }

        img {
            height:300px;
            width:250px;
            border-radius:10px;
            
            
                      
        }
        #poste {
            height:300px;
            width:250px;
            margin-top:50px;
            margin-left:45px;
            border-radius:5px;
            background-color:black;
                      
        }

        #backimage{
            height:60px;
            width:60px;
            border-radius:50px;
        }

        h2{
            color:white;
            text-align:center;
            margin-top:50px;
        }
        #filter{
           margin-top:100px;
            margin-bottom:20px;
            margin-right:150px;
        }
        select , #year{
            margin-right:50px;
            height:40px;
            width:170px;
        }
        #apply{
            height:50px;
            width:90px;
        }
        h5{
            padding:10px;
            color:white;
        }
        
        #allmovies{
            margin-top:30px;
            margin-left:550px;
            height:50px;
            border-radius:10px;
        }
       

    </style>
    <body>

       <div class="container">
        <div class="navbar">
            <a href='navbar.php' class='navbar-brand'><img  id='backimage' src='back.png'></a>
           <form id='search' method="post">
            <div class="input-group">
                <input class=" nav-item" type="text" name="movname" required >
                <div class="input-group-text">
                    <button type="submit"><b>Search</b></button>
                </div>
            </div>
            </form>
            <div >
            
            <form id='filter' method='GET'>
            <h5>Filter</h5>
                <select name = 'genre'>
                    <option value='null'>Genre</option>
                    <option value='scifi'>Sci-fi</option>
                    <option value='comedy'>Comedy</option>
                    <option value='crime'>Crime</option>
                    <option value='Thriller'>Thriller</option>
                    <option value='Action'>Action</option>
                    <option value='Adventure'>Adventure</option>
                    <option value='Fantasy'>Fantasy</option>
                    <option value='Romance'>Romance</option>
                    <option value='mystery'>Mystery</option>

                </select>   
                   <select name='year'>
                   <option value='null'>Year</option>
                    <option value='2022'>2022</option>
                    <option value='2021'>2021</option>
                    <option value='2020'>2020</option>
                    <option value='2019'>2019</option>
                    <option value='2018'>2018</option>
                    <option value='2017'>2017</option>

                   </select>
                
                  <select name = 'rating'>
                    <option value='null'>Rating</option>
                    <option value='4'>Above 4</option>
                    <option value='5'>Above 5</option>
                    <option value='6'>Above 6</option>
                    <option value='7'>Above 7</option>
                    <option value='8'>Above 8</option>
                    <option value='9'>Above 9</option>
                    
                    
                </select>
                <button id='apply' type='submit'><b>Apply</b></button>
            </form>
            </div>
 
         </div>
       </div>

    </body>
</html>

<?php

error_reporting(E_ALL ^ E_WARNING);
 
       include 'connection.php';
       
    if($_SERVER['REQUEST_METHOD']=='POST'){
            $name = $_POST['movname'];
   
      $sal = "SELECT  poster FROM movielist WHERE name LIKE  '%$name%' ";
        $res = mysqli_query($conn , $sal);
        $num = mysqli_num_rows($res);
       if($num>0){
        $datas = array();
        while($data =  mysqli_fetch_assoc($res)){
            $datas[] = $data;
        }
        foreach($datas as $dd){
            echo "<html><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></html>"; 
        }
       }
       else{
           echo "<html><h2>No Results Found</h2></html>";
       }

    }

    if($_SERVER['REQUEST_METHOD']=='GET'){
        $genre = $_GET['genre'];
        $year = $_GET['year'];
        $rating = $_GET['rating'];


       if($genre != 'null' and $year != 'null' and $rating != 'null'){
             $sal = "SELECT poster FROM movielist WHERE genre LIKE '%$genre%'  AND year = '$year' AND rating > '$rating' " ;
  
       }
       else{

        if($genre != 'null' and $year != 'null'and $rating == 'null'){
            $sal = "SELECT poster FROM movielist WHERE genre LIKE '%$genre%' AND year = '$year' " ;
  
        }

        if($genre != 'null' and $year =='null' and $rating != 'null'){
            $sal = "SELECT poster FROM movielist WHERE genre LIKE '%$genre%' AND rating > '$rating' " ;
  
        }

        if($genre == 'null' and $year != 'null' and $rating != 'null'){
            $sal = "SELECT poster FROM movielist WHERE year = '$year' AND rating > '$rating' " ;
  
        }


        if($genre != 'null' and $year == 'null' and $rating == 'null'){
            $sal = "SELECT poster FROM movielist WHERE genre LIKE '%$genre%' " ;
  
        }
  
        if($genre == 'null' and $year != 'null' and $rating == 'null'){
            $sal = "SELECT poster FROM movielist WHERE year = $year " ;
  
        }
        if($genre == 'null' and $year != 'null' and $rating != 'null'){
            $sal = "SELECT poster FROM movielist WHERE rating >'$rating' " ;
  
        }
       }
       $res = mysqli_query($conn , $sal);
       $num = mysqli_num_rows($res);
      if($num>0){
       $datas = array();
       while($data =  mysqli_fetch_assoc($res)){
           $datas[] = $data;
       }
       foreach($datas as $dd){
           echo "<html><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></html>";
       
       }
   
      }
      else{
          echo "<html><h2>No Results Found</h2></html>";
      }      

}



    // $sal = "SELECT link , poster FROM movielist ORDER BY rand()";
    //     $res = mysqli_query($conn , $sal);
    //     $num = mysqli_num_rows($res);
    //    if($num>0){
    //     $datas = array();
    //     while($data =  mysqli_fetch_assoc($res)){
    //         $datas[] = $data;
    //     }
    //     foreach($datas as $dd){
    //         echo "<html><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></html>";
        
    //     }
    // }
        
?> 


    <script>

suc = document.querySelectorAll('#poste');
 for(let i  = 0 ; i < suc.length; i++){
    suc[i].addEventListener("click" , function(){
       
        let name = this.value;

        document.cookie = "moname=" + name;
        
         window.location = 'aone.php';
    });
 }

 
    // <?php 

    //   $sal = "SELECT  poster FROM movielist ORDER BY rand()";
    //     $res = mysqli_query($conn , $sal);
    //     $num = mysqli_num_rows($res);
    //    if($num>0){
    //     $datas = array();
    //     while($data =  mysqli_fetch_assoc($res)){
    //         $datas[] = $data;
    //     }
    //     foreach($datas as $dd){
    //         echo "<html><button id='poste' value='$dd[poster]'><img src='$dd[poster]'></button></html>";
        
    //     }
    // }
        
        
    //     ?>
 }


</script>