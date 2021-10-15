<head>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>wedding</title>

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0e1dc;


        }
    </style>
</head>

<body>
    <div class="container">

        <?php
        include('condb.php');

        $t_id = $_POST['t_id'];


        $pic = "SELECT trad_img FROM traditional WHERE t_id = '$t_id'";
        $query = mysqli_query($conn, $pic);
        $result = mysqli_fetch_array($query);

        $pic_name = $result['trad_img'];

        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $img = (isset($_FILES['trad_img']) ? $_FILES['trad_img'] : '');
        $upload = $_FILES['trad_img']['name'];
        
        if ($upload != '') {
            $path = "assets/tradition_img/";
            $type = strrchr($_FILES['trad_img']['name'], ".");
            $newname = $numrand . $date1 . $type;
            $path_copy = $path . $newname;
            $path_link = "assets/tradition_img/" . $newname;
            move_uploaded_file($_FILES['trad_img']['tmp_name'], $path_copy);
        } else {
            $newname = $pic_name;
        }


        if (isset($t_id)) {
            $trad_name = $_POST['trad_name'];
            $sql = "UPDATE traditional SET  trad_name = '$trad_name' , trad_img = '$newname' WHERE t_id='$t_id'";
            $query = mysqli_query($conn, $sql);
        }

        if ($sql) { ?>
            <div class="card box d-flex mt-5">
                <div class="card-header">แจ้งเตือน</div>
                <div class="card-body">
                    <div class="alert alert-success " role="alert">
                        <h5 class="card-title text-center">แก้ไขสำเร็จ !!</h5>
                    </div>
                    <meta http-equiv="refresh" content="2; url=traditional.php">
                </div>
            </div>
        <?php } else { ?>
            <div class="card box d-flex mt-5">
                <div class="card-header">แจ้งเตือน</div>
                <div class="card-body">
                    <div class="alert alert-success " role="alert">
                        <h5 class="card-title text-center">แก้ไขไม่สำเร็จ !!</h5>
                    </div>
                    <meta http-equiv="refresh" content="2; url=traditional.php">
                </div>
            </div>
        <?php } ?>

    </div>
</body>