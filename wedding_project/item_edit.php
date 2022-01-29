<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
        }).then((result)=>{
            window.history.back();
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'แก้ไขข้อมูลไม่สำเร็จ',
        }).then((result)=>{
            window.history.back();
            })
        }
</script>
<body>

<?php include('condb.php');

$list_id = $_POST['list_id'];
if(isset($list_id)){
    $item_name = $_POST['item_name'];
    $amount = $_POST['amount'];
    $sql = "UPDATE item_list SET  item_name = '$item_name' , amount = '$amount' WHERE list_id='$list_id'";
    $query = mysqli_query($conn,$sql) ;
  

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

