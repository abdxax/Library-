<?php
session_start();
require '../controller/student.php';
$student=new Student();
$dep=$student->getAllDep();
$orders=$student->getOrder($_SESSION['user']);
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
                    <a href="car.php" class="nav-link">االسلة</a>
                </li>

                <li class="nav-item">
                    <a href="contact.php" class="nav-link">رفع محتوى</a>
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
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>رقم الطلبية</th>
                        <th>تاريخ الطلب</th>
                        <th>الحالة</th>
                        <th>تاريخ الاستلام</th>
                        <th>السعر</th>
                       <!-- <th>التفاصيل </th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                     foreach ($orders as $ord){
                         $stu='';
                         if($ord['status']=='newOrder'||$ord['status']==''){
                             $stu='تحت التنفيذ';
                         }
                         else if($ord['status']=='deliver'){
                              $stu="تم التسليم ";
                         }
                         else{
                             $stu="جاهز للاستلام ";
                         }
                         echo '
                        <tr>
                         <td></td>
                         <td>'.$ord['id'].'</td>
                         <td>'.$ord['date_req'].'</td>
                         <td>'.$stu.'</td>
                         <td>'.$ord['date_arv'].'</td>
                         <td>'.$ord['total'].'</td>
</tr>
                         ';
                     }
                    ?>
                    </tbody>
                </table>
                
                <div class="cv"></div>

            </div>



        </div>

    </div>
</div><!-- end wrapper-->



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
