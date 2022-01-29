<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
        }).then((result)=>{
            window.location="traditional.php"
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'แก้ไขข้อมูลไม่สำเร็จ',
        }).then((result)=>{
            window.location="traditional.php"
            })
        }
</script>

<body>


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

        if ($query) {
            echo "<script>";
            echo "sweet01()";
            echo "</script>";
        } else {
            echo "<script>";
            echo "sweet02()";
            echo "</script>";
        }
       ?>

</body>