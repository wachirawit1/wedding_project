<?php $t_id = $_POST['t_id'] ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
        }).then((result)=>{
            window.location="t_action.php?t_id=<?=$t_id?>";
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'แก้ไขข้อมูลไม่สำเร็จ',
        }).then((result)=>{
            window.location="t_action.php?t_id=<?=$t_id?>";
            })
        }
</script>
<body>
<?php include('condb.php');

    $a_id = $_POST['a_id'];
    $a_name = $_POST['a_name'];
    $a_detail = $_POST['a_detail'];
    $t_id = $_POST['t_id'];
    if(isset($a_id)){
        $sql = "UPDATE activity SET  a_name = '$a_name',a_detail = '$a_detail',t_id = '$t_id' WHERE a_id = '$a_id'";
        $query = mysqli_query($conn,$sql) ;
         $sql_del = "DELETE FROM activity_listitem WHERE a_id = '$a_id' ";
        $query_del =  mysqli_query($conn,$sql_del);
    if(isset($_POST['item_list'])){
        for($i=0;$i<count($_POST['item_list']);$i++){
            $list_id = $_POST['item_list'][$i];
            $sql_item = "INSERT into activity_listitem (a_id,list_id)VALUES('$a_id','$list_id')";
            $query_item = mysqli_query($conn,$sql_item);
        }
    }
    if ($sql) {
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