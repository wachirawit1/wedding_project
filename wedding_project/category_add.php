<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01() {
        Swal.fire({
            icon: 'success',
            title: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
        }).then((result) => {
            window.location = "category_store.php";
        })
    }

    function sweet02() {
        Swal.fire({
            icon: 'error',
            title: 'เพิ่มข้อมูลไม่สำเร็จ',
        }).then((result) => {
            window.location = "category_store.php";
        })
    }
</script>

<body>
    <?php
    include('condb.php');

    if (isset($_POST['cate_name'])) {
        $sql_id = "SELECT * FROM category ORDER BY cate_id DESC LIMIT 1";
        $query_id = mysqli_query($conn, $sql_id);
        $row_id = mysqli_fetch_assoc($query_id);

        $cate_id = ++$row_id['cate_id'];
        $cate_name = $_POST['cate_name'];
        $cate_img = $_POST['cate_img'];

        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $img = (isset($_FILES['cate_img']) ? $_FILES['cate_img'] : '');
        $upload = $_FILES['cate_img']['name'];

        if ($upload != '') {
            $path = "assets/category_img/";
            $type = strrchr($_FILES['cate_img']['name'], ".");
            $newname = $numrand . $date1 . $type;
            $path_copy = $path . $newname;
            $path_link = "assets/category_img/" . $newname;
            move_uploaded_file($_FILES['cate_img']['tmp_name'], $path_copy);
        } else {
            $newname = "";
        }

        $sql = "INSERT INTO category (cate_id,cate_name,cate_img) VALUES ( '$cate_id','$cate_name','$newname')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>";
            echo "sweet01()";
            echo "</script>";
        } else {
            echo "<script>";
            echo "sweet02()";
            echo "</script>";
        }
    }
    ?>
</body>