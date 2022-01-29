<?php $t_id = $_POST['t_id'] ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
        }).then((result)=>{
            window.location="item.php?t_id=<?=$t_id?>"
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'เพิ่มข้อมูลไม่สำเร็จ',
        }).then((result)=>{
            window.location="item.php?t_id=<?=$t_id?>"
            })
        }
</script>
<body>
<?php include('condb.php');
$sql_id = "SELECT * FROM item_list ORDER BY list_id DESC LIMIT 1";
$query_id = mysqli_query($conn, $sql_id);
$row_id = mysqli_fetch_assoc($query_id);
$list_id = ++$row_id['list_id'];
$item_name = $_POST['item_name'];
$amount = $_POST['amount'];
$t_id = $_POST['t_id'];
$sql = "INSERT INTO item_list (list_id,item_name,t_id,amount) VALUES ( '$list_id','$item_name','$t_id','$amount')";
$query = mysqli_query($conn, $sql);
// echo count($_POST['item_list']);
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