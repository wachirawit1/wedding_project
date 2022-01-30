
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'สมัครเสร็จสิ้น',
        }).then((result)=>{
			window.location = 'index.php'
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'สมัครไม่สำเร็จ',
        }).then((result)=>{
			window.location = 'index.php'
            })
        }
</script>
<body>
<?php
if (isset($_POST['register'])) {

	include('condb.php');

	$errors = array();

	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$password = mysqli_real_escape_string($conn, (($_POST["password"])));
	$cfpassword = mysqli_real_escape_string($conn, (($_POST["cfpassword"])));

	// $tel = $_POST['tel'];
	$s_email = mysqli_real_escape_string($conn, $_POST['s_email']);
	$s_name = $_POST['s_name'];
	$cate_id = $_POST['category'];
	$s_tel = $_POST['s_tel'];
	$s_address =$_POST['s_address'];

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$img = (isset($_POST['s_img']) ? $_POST['s_img'] : '');
	$upload = $_FILES['s_img']['name'];
	if ($upload != '') {

		$path = "img/";
		$type = strrchr($_FILES['s_img']['name'], ".");
		$newname = $numrand . $date1 . $type;
		$path_copy = $path . $newname;
		$path_copy1 = "img/" . $newname;
		$path_link = "img/" . $newname;
		
		move_uploaded_file($_FILES['IDcard_img']['tmp_name'], $path_copy1);
		move_uploaded_file($_FILES['s_img']['tmp_name'], $path_copy);
	} else {
		$newname = 'store.png';
	}
    
	if ($password != $cfpassword) {
		$_SESSION['errors'] = "รหัสผ่านไม่ตรงกัน";
		session_write_close();
		echo "<script>";
		echo "window.location = 'regis_store.php'; ";
		echo "</script>";
	} else {
		$check = "SELECT username,s_email FROM store WHERE username = '$username' OR s_email = '$s_email'";
		$result = mysqli_query($conn, $check);
		$rows = mysqli_num_rows($result);
		$array = mysqli_fetch_array($result);



		if ($rows > 0) { //if you have user
			if ($array['username'] == $username || $array['email'] == $email) {
				$_SESSION['errors'] = "ชื่อบัญชีหรืออีเมลซ้ำ";
				session_write_close();
				echo "<script>";
				echo "window.location = 'regis_store.php'; ";
				echo "</script>";
			}
			// if ($array['email'] == $email) {
			// 	echo "<script type='text/javascript'>";
			// 	echo "alert('อีเมลถูกนี้ใช้ไปแล้ว');";
			// 	echo "</script>";
			// }
		} else {
			$password = md5($password);
			
			$sql = "INSERT INTO `store`(`username`, `password`, `s_name`, `s_email`, `cate_id`, `s_tel`, `s_address`, `s_img`,`IDcard_img`,status, `date`) 
			VALUES ('$username','$password','$s_name','$s_email', '$cate_id' , '$s_tel','$s_address' , '$newname' ,'$newname' ,0, current_timestamp())";
			$result1 = mysqli_query($conn,$sql) ;


			if ($result1) {
				echo "<script>";
				echo "sweet01()";
				echo "</script>";
			} else {
				echo "<script>";
				echo "sweet02()";
				echo "</script>";
			}
		}
		mysqli_close($conn);
	}
}
?>
</body>