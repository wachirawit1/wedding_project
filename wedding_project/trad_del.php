<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'ลบข้อมูลเรียบร้อยแล้ว',
        }).then((result)=>{
            window.location="traditional.php"
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'ลบข้อมูลไม่สำเร็จ',
        }).then((result)=>{
            window.location="traditional.php"
            })
        }
</script>
<body>
<?php
include('condb.php');

$t_id = $_GET['id'];

$sql = "DELETE FROM traditional WHERE t_id = '$t_id' ";
$query = mysqli_query($conn,$sql );


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
</div>