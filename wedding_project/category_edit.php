<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01() {
        Swal.fire({
            icon: 'success',
            title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
        }).then((result) => {
            window.location = "category_store.php";
        })
    }

    function sweet02() {
        Swal.fire({
            icon: 'error',
            title: 'แก้ไขข้อมูลไม่สำเร็จ',
        }).then((result) => {
            window.location = "category_store.php";
        })
    }
</script>

<body>
    <?php
    include('condb.php');

    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $path = "assets/category_img/";
    $type = strrchr($_FILES['cate_img']['name'], ".");
    $newname = $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "assets/category_img/" . $newname;
    move_uploaded_file($_FILES['cate_img']['tmp_name'], $path_copy);

    if (isset($_POST['cate_id']) && isset($_POST['cate_name'])) {
        $cate_id = $_POST['cate_id'];
        $cate_name = $_POST['cate_name'];

        $sql = "UPDATE category SET  cate_name = '$cate_name' , cate_img = '$newname' WHERE cate_id = '$cate_id'";
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