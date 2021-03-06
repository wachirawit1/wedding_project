<?php session_start();
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

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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

    <div class="mt-3" id="content">
        <div data-aos="zoom-in-up">
            <div class="card text-center shadow mx-auto my-auto" style="width: 30rem;">
                <div class="card-body">
                    <h2 class="card-title">??????????????????????????????????????????</h2>
                    <div id="show">
                        <div class="alert alert-danger alert-dismissible fade show" style="display: none;" id="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            ??????????????????????????????????????????
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>

                    <button id="submit" type="submit" class="btn btn-block btn-primary" onclick="sendEmail()">?????????</button>
                </div>
            </div>

        </div>
    </div>






    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 1000
        });

        function sendEmail() {
            let email = $('#email');

            if (isNotEmty(email)) {
                $('#submit').empty();
                $('#submit').append('<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>')
                $.ajax({
                    url: 'checkEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        email: email.val()
                    },
                    success: function(data) {
                        console.log(data);
                        // alert(data.status);
                        $('#submit').text('?????????');
                        $('#show').empty();
                        email.val(null);
                        $('#show').html('<div class="alert alert-success" role="alert">????????????????????????????????????????????????????????? ???????????????????????????????????????????????????</div>');
                        email.css('border', '1px solid #d4edda')
                    },
                    error: function(data) {
                        $('#show').html('<div class="alert alert-danger" role="alert">????????????????????????????????????????????????????????????????????? ????????????????????????????????????????????????????????????????????????</div>');
                        email.css('border', '1px solid red')
                        $('#submit').text('?????????');
                        console.error(data);
                    }
                });
            }

            function isNotEmty(caller) {
                if (caller.val() == "") {
                    caller.css('border', '1px solid #dc3546');
                    $('#alert').css('display', '');
                    return false;
                } else caller.css('border', '');

                return true;
            }

        }
    </script>

</body>

</html>