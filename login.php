<?php
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

                       <form class="">
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

                           <div class="form-group  text-center">
                               <input type="submit" class="btn btm-bas btn-center"  name="sub" value="تسجيل دخول ">
                           </div>

                       </form>
                   </div>

                </div>

        </div>
    </div>

</div>

<!-- JS bootstap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
