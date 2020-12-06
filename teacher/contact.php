<?php
session_start();
require "../controller/teacher.php";
$adm=new teacher();
$departs=$adm->getAllContact($_SESSION['user']);
if(isset($_FILES['pro_file'])){
    //print_r($_FILES['pro_file']);
    $pro_name=$_POST['pro_name'];
    $pro_qua=$_POST['pro_qua'];


    $fname=$_FILES['pro_file']['name'];
    $ftm=$_FILES['pro_file']['tmp_name'];
    $path="../pdfs/".$fname;
    if(!empty($pro_name)){
        if(move_uploaded_file($ftm,$path)){
            $adm->addContact($_SESSION['user'],$path,$adm->getCol($_SESSION['user']),$pro_name,$pro_qua);
            echo "done";
        }
    }

    //$dep=$_POST['dep'];

}

if(isset($_GET['id_del'])){
    $adm->deleteContact($_GET['id_del']);
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
        <ul class="navbar-nav mr-auto">


            <li class="nav-item dropdown">


                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    حسابي
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>

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
                <?php

                if(isset($_GET['msg'])){
                    echo '<div class="col-12 alert alert-success text-center">
تم اضافة القسم بنجاح 
</div>';
                }
                ?>
                <div class="col-6">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-8">
                                <input type="text" name="pro_name" class="form-control" placeholder="العنوان">
                            </div>

                            <div class="col-8">
                                <input type="text" name="pro_qua" class="form-control" placeholder="الوصف">
                            </div>



                            <div class="col-8">
                                <input type="file" name="pro_file" class="form-control" placeholder=" ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-8 text-center">
                                <input type="submit" name="sub" class="btn btn-info" value="اضافة">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-10">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>العنوان</th>
                            <th>الوصف</th>

                            <th>المحتوى</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;
                        foreach ($departs as $depart) {
                            echo '
                            <tr>
                            <td>'.$count.'</td>
                             <td>'.$depart['title'].'</td>
                               <td>'.$depart['descrip'].'</td>
                              
                                 <td><a href="'.$depart['file_path'].'">عرض</a></td>
                             <td><a href="contact.php?id_del='.$depart['id'].'" class="btn badge-danger">حذف </a></td>
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
