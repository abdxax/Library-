<?php
require '../controller/Admin.php';
$adm=new Admin();
$orders=$adm->getProduect($_GET['id']);
$orders_pay=$adm->getPayWay($_GET['id']);
$id_bill=$_GET['id'];
if(isset($_GET['id_bil'])){
    $adm->updataeOrdr($_GET['id_bil'],'done');
}

if(isset($_GET['id_bil_done'])){
    $adm->updataeOrdr($_GET['id_bil_done'],'deliver');
}

if(isset($_POST['sub-pay'])){
    $pay=$_POST['pays'];
    $x=$_POST['total'];
    $px=$x-$pay;

    $adm->updatePay($id_bill,$pay,$px);
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
        table{
            overflow: scroll;
        }

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
                    <a href="../logout.php" class="nav-link">تسجيل خروج</a>
                </li>
            </ul>
        </div>
    </div><!-- end side menu-->
    <!-- start contact-->
    <div class="contcat">

        <div class="container">
            <div class="row justify-content-center">

                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>رقم الطلبية</th>
                        <th>المنتج</th>
                        <th>العدد</th>
                        <th>السعر</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $orders_status='';
                    foreach ($orders as $ord){
                    $orders_status=$ord['status'];
                        echo '
                        <tr>
                         <td></td>
                         <td>'.$ord['bill_id'].'</td>
                         <td>'.$ord['title'].'</td>
                         <td>'.$ord['qu'].'</td>
                         <td>'.$ord['price'].'</td>
                        
</tr>
                         ';
                    }
                    ?>
                    </tbody>
                </table>

                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <?php
                        if($orders_status!="done"&& $orders_status!="deliver") {
                            ?>
                            <div>
                                <a href="dets.php?id_bil=<?php echo $id_bill; ?>" class="btn btn-info">جاهزه للتسليم </a>
                            </div>
                            <?php

                        }
                        else  if( $orders_status!="deliver"){

                            ?>
                                <div>
                            <a href="dets.php?id_bil_done=<?php echo $id_bill; ?>" class="btn btn-danger">تم التسليم</a>
                                </div>
                            <?php
                            }
                            $pay_way='';
                            $total=0;
                            $payed=0;
                            foreach ($orders_pay as $pay){
                                $pay_way=$pay['payway'];
                                $total=$pay['total'];
                                $payed=$pay['totalpay'];

                            }
                            $pxc=$total-$payed;
                            if($pay_way==1) {

                                if($total!=$payed) {
                                    ?>

                                    <div class="col-md-12 text-center">
                                    <p>الحساب</p>
                                    <p><?php echo $x=$total - $payed; ?></p>
                                    <?php
                                    if($payed<=$total) {
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <div class="col-4">
                                                    <input type="hidden" value="<?php echo $payed;?>" name="total">
                                                    <input type="text" name="pays" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-4">
                                                    <input type="submit" name="sub-pay" class="btn btn-info"
                                                           value="دفع">
                                                </div>
                                            </div>

                                        </form>
                                        </div>

                                        <?php
                                    }
                                }

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
