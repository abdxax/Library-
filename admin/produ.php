<?php
session_start();
require "../controller/Admin.php";
$adm=new Admin();
$departs=$adm->getAllDep();
$pros=$adm->getAllProud();
if(isset($_FILES['pro_file'])){
    print_r($_FILES['pro_file']);
    $pro_name=$_POST['pro_name'];
    $pro_qua=$_POST['pro_qua'];
    $pro_price=$_POST['pro_price'];
    $pro_type=$_POST['pro_type'];

    $fname=$_FILES['pro_file']['name'];
    $ftm=$_FILES['pro_file']['tmp_name'];
    $path="../poster/".$fname;
    if(move_uploaded_file($ftm,$path)){
        echo "done";
    }
    //$dep=$_POST['dep'];
    $adm->addNewProudect($pro_name, $pro_price,$pro_qua,$pro_type,$path);
}

if(isset($_GET['id_del'])){
    $adm->deletePro($_GET['id_del']);
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
                    <a href="" class="nav-link">تسجيل خروج</a>
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
تم اضافة المنتج بنجاح 
</div>';
                }
                ?>
                <div class="col-6">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-8">
                                <input type="text" name="pro_name" class="form-control" placeholder="اسم المنتج ">
                            </div>

                            <div class="col-8">
                                <input type="text" name="pro_qua" class="form-control" placeholder="الكمية">
                            </div>

                            <div class="col-8">
                                <input type="text" name="pro_price" class="form-control" placeholder="السعر">
                            </div>

                            <div class="col-8">
                                <select class="form-control" name="pro_type">
                                    <?php
                                    foreach ($departs as $depart){
                                       echo '
                                       <option value="'.$depart['id'].'">'.$depart['dep_name'].'</option>
                                       ';
                                    }
                                    ?>
                                </select>
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
                            <th>المنتج</th>
                            <th>الكمية</th>
                            <th>السعر</th>
                            <th>القسم</th>
                            <th>المرفق</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;
                        $qus=0;
                        foreach ($pros as $pro) {
                            $qus=$pro['quenity'];
                            echo '
                            <tr>
                            <td>'.$count.'</td>
                             <td>'.$pro['title'].'</td>
                               <td>'.$pro['quenity'].'</td>
                                 <td>'.$pro['price'].'</td>
                                   <td>'.$pro['id_types'].'</td>
                                    <td><a href="'.$pro['file_path'].'">k</a></td>
                                
                                 <td><a href="" class="btn badge-info" data-toggle="modal" data-target="#exampleModal">تعديل </a></td>   
                             <td><a href="produ.php?id_del='.$pro['id'].'" class="btn badge-danger">حذف </a></td>
                             
                             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الكمية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="POST">
                   <div class="form-group">
                   <p>'.$pro['id'].'</p>
                       <input type="text" name="qu_num" class="form-control" value='.$pro['quenity'].'>>
                   </div>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


</tr>

<!-- pop -->



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
