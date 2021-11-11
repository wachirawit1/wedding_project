<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</head>

<!-- icon -->
<script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->

<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<title>Wedding</title>

<style>
    body {
        font-family: 'Prompt', sans-serif;
        background-color: #ffffff;
    }

    .nav-item {
        font-size: 16px;
        padding-left: 16px;
        padding-right: 16px;
    }

    a.nav-link {
        color: grey;
    }


    a.nav-link:hover {
        color: #dbb89a !important;
    }

    div.card-body {
        font-family: 'Chakra Petch', sans-serif
    }
</style>


<body>



    <?php include('navbaruser.php') ?>

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item"><a href="card_template.php">template</a></li>
            <li class="breadcrumb-item active" aria-current="page">create card</li>
        </ol>
    </nav>




    <div class="container">
        <h3 class="text-center m-3">สร้างการ์ดเชิญ</h3>
        <div class="d-flex justify-content-center">
            <div class="m-4 text-center">
                <div class="col">
                    <div class="row ">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="husband_input" placeholder="ชื่อเจ้าบ่าว" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="wife_input" placeholder="ชื่อเจ้าสาว" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="#" placeholder="สถานที่" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary" id="btn-Preview-Image" type="button" value="ดูตัวอย่างรูปภาพ" />
            </div>

            <div class="pl-4 pr-4 pb-4" id="html-content-holder">
                <div class="row justify-content-md-center">
                    <div class="card text-center border-0" style="width: 30rem;">
                        <div class="card-body position-relative">
                            <div class=""><img src="assets/images/invite_card/c1_template.png" class="img-responsive position-relative" style="width: 100%;"></div>
                            <div class="position-absolute mx-auto" id="husband" style="color:white;top: 250px; left:0; right: 0; ">ชื่อเจ้าบ่าว</div>
                            <div class="position-absolute" id="wife" style="color:white;top: 340px;left:0; right: 0;">ชื่อเจ้าสาว</div>
                            <div class="position-absolute" style=" color:white;top: 400px;left:0; right: 0;">วันแต่งงาน</div>
                            <div class="position-absolute" style="color:white;top: 450px;left:0; right: 0;">สถานที่</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a id="btn-Convert-Html2Image" href="#">Download</a>
        <br />
        <h3>Preview :</h3>
        <div id="previewImage">
        </div>

    </div>












    <script>
        $(document).ready(function() {


            var element = $("#html-content-holder"); // global variable
            var getCanvas; // global variable

            $("#btn-Preview-Image").on('click', function() {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;
                    }
                });
            });

            $("#btn-Convert-Html2Image").on('click', function() {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
            });

        });
    </script>
</body>

</html>