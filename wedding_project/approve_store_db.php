<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'อนุมัติร้านค้าแล้ว',
        }).then((result)=>{
            window.location="member_store.php";
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'อนุมัติไม่สำเร็จ',
        }).then((result)=>{
         window.history.back();
            })
        }
</script>
<body>
<?php
include('condb.php');
$id = $_GET['id'];
$sql = "UPDATE store SET status = 1 WHERE s_id = $id";
$query = mysqli_query($conn,$sql);




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