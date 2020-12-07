<?php
session_start();
require '../controller/student.php';
$student=new Student();
$dep=$student->getAllDep();
$info=$student->getName($_SESSION['user']);
$contas=$student->getAllContacts();
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rakkas&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <style>


    </style>
</head>
<body dir="rtl">
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="../bais.png" height="40px" width="100px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">


    </div>
</nav><!-- end nav-->
<!-- start wrrap class-->
<div class="wrapper d-flex">
    <div class="sideMenu">
        <div class="sidebar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">الصفحة الرئيسية</a>
                </li>

                <?php
                  foreach ($dep as $d){
                      echo '
                          <li class="nav-item">
                    <a href="produ.php?id='.$d['id'].'" class="nav-link">'.$d['dep_name'].'</a>
                </li>
                      ';
                  }
                ?>


                <li class="nav-item">
                    <a href="myorder.php" class="nav-link">طلباتي</a>
                </li>

                <li class="nav-item">
                    <a href="car.php" class="nav-link">السلة</a>
                </li>



                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">تسجيل خروج</a>
                </li>


            </ul>
        </div>
    </div><!-- end side menu-->
    <!-- start contact-->
    <div class="contcat">

           <div class="container">
               <div class="row justify-content-center">
                   <div class="text-center">
                       <div class="card">
                           <div class="card-body">
                               <?php
                               foreach ($info as $i){
                                   echo'
                      <p>الاسم: '.$i['name'].'</p>
                      <p>الرقم الوظيفي : '.$i['user_id'].'</p>
                      ';
                               }
                               ?>
                           </div>
                       </div>

                   </div>
                   <div class="col-md-12">
                       <div class="text-center">
                           <h4>المنتجات </h4>
                       </div>
                       <div class="col-md-12 row">
                           <?php

                           foreach ($contas as $p){
                               echo '
                     <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="'.$p['file_path'].'" width="200px" height="200px">
                            <p>'.$p['title'].'</p>
                            <p>'.$p['quenity'].'</p>
                            <p>'.$p['price'].'</p>
                            <form method="POST" class="">
                          <div class="form-group">
                          <div class="row">
                          <div class="col-3 ">
                            <input type="number" class="form-control" name="que" value="1" width="30px">
                           
</div>

<div class="col-7 text-center">
                            <input type="submit" class="btn btn-info" name="subsa" value="اضافة الى السلة ">
</div>


</div>
</div>

 
</form>
                            
                        </div>
                    </div>
                </div>
                    
                    ';
                           }
                           ?>
                       </div>
                   </div>




                   
                   <div class="cv"></div>

               </div>



           </div>

    </div>
</div><!-- end wrapper-->



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
