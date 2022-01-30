<?php
include('condb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Wedding Planner</title>

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f7d7c0;
        }

        html {
            height: 100%;
        }

        #content {
            position: absolute;
            top: 40%;
            left: 50%;
            width: 100%;
            text-align: center;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <?php
    $id = $_GET['id'];
    ?>
    <div class="mt-3" id="content">
        <div class="card text-center shadow mx-auto my-auto" style="width: 30rem;">
            <div class="card-body">
                <h3>เปลี่ยนรหัสผ่าน</h3>
                <div id="show">
                    <div id="alert" class="alert alert-danger" style="display: none;font-size: 15px;">
                        <strong>รหัสผ่านไม่ตรงกัน</strong>
                    </div>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" placeholder="รหัสผ่านใหม่" pattern=".{6,}" id="newpass">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="ยืนยันรหัสผ่าน" id="verifypass">
                    <input type="hidden" id="id" value="<?= $id ?>">
                </div>
                <button type="button" class="btn btn-block btn-primary" onclick="changePass()">ยืนยัน</button>
            </div>
        </div>
        <!-- <div class="card text-center shadow mx-auto my-auto" id="card" style="width: 30rem;display: none;">
            <div class="card-body">
                <h3>เปลี่ยนรหัสผ่านเสร็จสิ้น</h3>
                <h1><i class="bi bi-check-circle text-success"></i></h1>


            </div>
        </div> -->
    </div>











    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
        // AOS.init({
        //     duration: 1000
        // });

        let newpass = $('#newpass');
        let verifypass = $('#verifypass');
        let id = $('#id');

        function changePass() {
            if (newpass.val() != verifypass.val()) {
                newpass.css('border', '1px solid red');
                verifypass.css('border', '1px solid red');
                $('#alert').css('display', 'block');
                verifypass.val(null);
            } else {
                console.log(newpass.val());
                console.log(id.val());
                $.ajax({
                    url: 'change_password_db.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        newpass: newpass.val(),
                        id: id.val()
                    },
                    success: function(data) {
                        $('#show').append('<div class="alert alert-success" role="alert">เปลี่ยนรหัสผ่านเสร็จสิ้น</div>')
                        // $('.card').css('dispaly', 'none');
                        // $('#card').css('display', 'block');
                        setTimeout(function() {
                            window.location.replace('login.php');
                        }, 2000);
                    },
                    error: function(data) {
                        console.error(data)
                        $('#show').append('<div class="alert alert-danger" role="alert">เกิดปัญหา</div>')

                    }
                });
            }

        }
    </script>

</body>

</html>