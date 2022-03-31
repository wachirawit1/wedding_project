<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01() {
        Swal.fire({
            icon: 'success',
            title: 'ลบข้อมูลเรียบร้อยแล้ว',
        }).then((result) => {
            window.location = "category_store.php";
        })
    }

    function sweet02() {
        Swal.fire({
            icon: 'error',
            title: 'ลบข้อมูลไม่สำเร็จ',
        }).then((result) => {
            window.location = "category_store.php";
        })
    }
</script>

<body>
    <?php
    include('condb.php');

    if (isset($_POST['cate_id'])) {
        $cate_id = $_POST['cate_id'];

        $sql = "DELETE FROM category WHERE cate_id = '$cate_id' ";
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
    } else {
        echo "<script>";
        echo "console.log('ไม่มีค่าส่งมา')";
        echo "</script>";
    }

    ?>