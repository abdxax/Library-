<?php
session_start();
require 'controller/login.php';
$log=new Register();
$cols=$log->getColl();
$msg='';
if(isset($_POST['sub'])){
    $name=strip_tags($_POST['name']);
    $id_job=strip_tags($_POST['id_job']);
    $email=strip_tags($_POST['email']);
    $phone=strip_tags($_POST['phone']);
    $password=strip_tags($_POST['password']);
    $typ=strip_tags($_POST['typ']);
    $cols=$_POST['cols'];
    $log->register($name,$id_job,$email,$phone,$password,$typ,$cols);

}

if(isset($_POST['sub-login'])){
$user=strip_tags($_POST['id']);
$pass=strip_tags($_POST['pass']);
$log->login($user,$pass);
}
?>
<html lang="ar">
<head>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rakkas&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title></title>

    <style>
     h2{
         font-family: 'Rakkas', cursive;
         margin: 10px;

     }

     ::placeholder {
         font-family: 'Rakkas', cursive;
     }

    </style>
</head>
<body >

<div class="row">
    <div class="col-md-6 left-login"></div>

    <div class="col-md-6">
        <div class="container">
            <div class="col-12 mt-5">
                <div class="col-7 text-center">
                    <img src="bais.png" class="mx-auto d-block" alt="">

                </div>

                <div class="text-center">
                    <h2>المكتبة الالكترونية </h2>
                </div>

                   <div class="row justify-content-center">

                       <form class="" method="post">
                           <div class="form-group ">
                               <label>
                                   <input type="text" class="form-control text-center"  name="id" placeholder="معرف المستخدم">
                               </label>
                           </div>

                           <div class="form-group ">
                               <label>
                                   <input type="password" class="form-control text-center"  name="pass" placeholder="كلمة المرور ">
                               </label>
                           </div>

                           <div class="form-group text-right">
                               <a href="" data-toggle="modal" data-target="#exampleModal">تسجيل جديد</a>
                           </div>

                           <div class="form-group  text-center">
                               <input type="submit" class="btn btm-bas btn-center"  name="sub-login" value="تسجيل دخول ">
                           </div>

                       </form>
                   </div>

                </div>

        </div>
    </div>

</div>
<!-- start model pop-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-center" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post">
                   <div class="form-group">
                       <input type="text" name="name" class="form-control" placeholder="الاسم">
                   </div>
                   <div class="form-group">
                       <input type="text" name="id_job" class="form-control"  placeholder="الرقم الوظيفي او الرقم الجامعي">
                   </div>
                   <div class="form-group">
                       <select class="form-control" name="cols">
                           <?php
                           foreach ($cols as $col){
                               echo '
                               <option value="'.$col['id'].'">'.$col['name_col'].'</option>
                               ';
                           }

                           ?>
                       </select>
                   </div>
                   <div class="form-group">
                       <input type="text" class="form-control" name="email"  placeholder="البريد الالكتروني">
                   </div>
                   <div class="form-group">
                       <input type="text" name="phone" class="form-control"  placeholder="رقم التواصل">
                   </div>
                   <div class="form-group">
                       <input type="text" name="password" class="form-control"  placeholder="كلمة المرور">
                   </div>

                   <div class="form-group" >
                      <select name="typ" class="form-control">
                          <option value="2">طالب</option>
                          <option value="3">عضو هيئة تدريس</option>
                      </select>
                   </div>

                   <div class="form-group text-center">
                       <input type="submit" name="sub" class="btn btn-info" value="تسجيل جديد ">
                   </div>


               </form>
            </div>

        </div>
    </div>
</div>

<!-- end model pop -->
<!-- JS bootstap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
