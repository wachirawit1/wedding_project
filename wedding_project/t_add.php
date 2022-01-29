<?php $t_id = $_POST['t_id'] ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
        }).then((result)=>{
            window.location="t_action.php?t_id=<?=$t_id?>"
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'เพิ่มข้อมูลไม่สำเร็จ',
        }).then((result)=>{
            window.location="t_action.php?t_id=<?=$t_id?>"
            })
        }
</script>
<body>
<?php
// print_r($_POST);
// exit();
include('condb.php');
$sql_id = "SELECT * FROM activity ORDER BY a_id DESC LIMIT 1";
$query_id = mysqli_query($conn, $sql_id);
$row_id = mysqli_fetch_assoc($query_id);
$a_id = ++$row_id['a_id'];
$a_name = $_POST['a_name'];
$t_id = $_POST['t_id'];
$a_detail = $_POST['a_detail'];
$sql = "INSERT INTO activity (a_id,a_name, t_id, a_detail) VALUES ( '$a_id','$a_name', '$t_id', '$a_detail')";
$query = mysqli_query($conn, $sql);
// echo count($_POST['item_list']);
// exit();
if (isset($_POST['item_list'])) {
    for ($i = 0; $i < count($_POST['item_list']); $i++) {
        $item_list = $_POST['item_list'][$i];
        $sql2 = "INSERT INTO activity_listitem (a_id,list_id) VALUES ('$a_id','$item_list')";
        $query2 = mysqli_query($conn, $sql2);
    }
}

// exit();
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