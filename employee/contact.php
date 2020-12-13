<?php
session_start();
require "../controller/Admin.php";
$adm=new Admin();
$dep=$adm->getAllDep();
$departs2=$adm->getContact();
$drp=$adm->getAllDep();
if(isset($_GET['id_cou'])){
$adm->AddPros($_GET['id_cou']);
}
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

                <li class="nav-item">
                    <a href="depart.php" class="nav-link">الاقسام</a>
                </li>

                <li class="nav-item">
                    <a href="produ.php" class="nav-link">المنتجات</a>
                </li>

                <li class="nav-item">
                    <a href="orders.php" class="nav-link">الطلبات</a>
                </li>

                <li class="nav-item">
                    <a href="contact.php" class="nav-link">المحتوى</a>
                </li>

                <li class="nav-item">
                    <a href="addColloeg.php" class="nav-link">الكليات</a>
                </li>



                <li class="nav-item">
                    <a href="report.php" class="nav-link">التقارير </a>
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
                <?php

                if(isset($_GET['msg'])){
                    echo '<div class="col-12 alert alert-success text-center">
تم اضافة القسم بنجاح 
</div>';
                }
                ?>

                <div class="col-10">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>العنوان</th>
                            <th>الوصف</th>
                            <th>عضو هيئة التدريس</th>
                            <th>الكلية</th>
                            <th>المحتوى</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;
                        foreach ($departs2 as $depart) {
                            echo '
                            <tr>
                            <td>'.$count.'</td>
                             <td>'.$depart['title'].'</td>
                               <td>'.$depart['descrip'].'</td>
                               <td>'.$adm->getName($depart['user_id']).'</td>
                               <td>'.$depart['name_col'].'</td>
                                 <td><a href="'.$depart['file_path'].'">عرض</a></td>

<td>
<a href="contact.php?id_cou='.$depart['title'].'">اضافة</a>
</td>
</tr>
                            ';
                        }
                        ?>
                        </tbody>
                    </table>
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
