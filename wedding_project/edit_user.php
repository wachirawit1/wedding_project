<html>

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<title>wedding</title>


<style>
    body {
        font-family: 'Prompt', sans-serif;
        background-color: #f0e1dc;
    }
</style>

<body>
    <div class="container">
        <?php
        session_start();
        include('condb.php');
        $userid = $_SESSION['userid'];

        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];


        $pic = "SELECT img FROM member WHERE id = '$userid'";
        $query = mysqli_query($conn, $pic);
        $result = mysqli_fetch_array($query);
        $pic_name = $result['img'];

        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $img = (isset($_FILES['img']) ? $_FILES['img'] : '');
        $upload = $_FILES['img']['name'];
        if ($upload != '') {
            $path = "img/";
            $type = strrchr($_FILES['img']['name'], ".");
            $newname = $numrand . $date1 . $type;
            $path_copy = $path . $newname;
            $path_link = "img/" . $newname;
            move_uploaded_file($_FILES['img']['tmp_name'], $path_copy);
        } else {
            $newname = $pic_name;
        }

        $sql = " UPDATE member SET name = '$name', lastname = '$lastname', birthday = '$birthday',gender = '$gender', tel = '$tel', email = '$email', img = '$newname' WHERE id = '$userid'";



        $result = mysqli_query($conn, $sql);



        if ($sql) { ?>

            <!-- <div class="card box d-flex mt-5">
                <div class="card-header">???????????????????????????</div>
                <div class="card-body">
                    <div class="alert alert-success " role="alert">
                        <h5 class="card-title text-center">??????????????????????????????????????????????????? !!</h5>
                    </div>
                </div>
            </div> -->

            <script>
                swal({
                    title: "????????????????????????????????????",
                    text: "???????????????????????????????????????????????????",
                    icon: "success",
                    button: false
                });
            </script>

            <meta http-equiv="refresh" content="2; url=profile.php">


        <?php
        } else { ?>
            <div class="card box d-flex mt-5">
                <div class="card-header">???????????????????????????</div>
                <div class="card-body">
                    <div class="alert alert-danger " role="alert">
                        <h5 class="card-title text-center">???????????????????????????????????????????????????????????? !!</h5>
                    </div>
                    <meta http-equiv="refresh" content="2; url=profile.php">
                </div>
            </div>
        <?php } ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>