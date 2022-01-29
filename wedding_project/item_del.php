
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'ลบเรียบร้อยแล้ว',
        }).then((result)=>{
            window.history.back();
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'ลบไม่สำเร็จ',
        }).then((result)=>{
         window.history.back();
            })
        }
</script>
<body>
<?php
include('condb.php');
$list_id = $_GET['id'];

$sql = "DELETE FROM item_list WHERE list_id = '$list_id' ";
$query = mysqli_query($conn,$sql );
$sql_item = "DELETE FROM activity_listitem WHERE list_id = '$list_id'";
$query_item = mysqli_query($conn,$sql_item);

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