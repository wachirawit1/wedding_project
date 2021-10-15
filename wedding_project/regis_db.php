<?php
if (isset($_POST['register'])) {
	session_start();
	include('condb.php');

	$errors = array();

	$username = mysqli_real_escape_string($conn, $_POST["username"]);

	$password = mysqli_real_escape_string($conn, (($_POST["password"])));
	$cfpassword = mysqli_real_escape_string($conn, (($_POST["cfpassword"])));

	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
	$birthday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$tel = $_POST['tel'];
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$mtype = $_POST['mtype'];

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$img = (isset($_POST['img']) ? $_POST['img'] : '');
	$upload = $_FILES['img']['name'];
	if ($upload != '') {

		$path = "img/";
		$type = strrchr($_FILES['img']['name'], ".");
		$newname = $numrand . $date1 . $type;
		$path_copy = $path . $newname;
		$path_link = "img/" . $newname;
		move_uploaded_file($_FILES['img']['tmp_name'], $path_copy);
	} else {
		$newname = 'user.png';
	}

	if ($password != $cfpassword) {
		$_SESSION['errors'] = "รหัสผ่านไม่ตรงกัน";
		session_write_close();
		echo "<script>";
		echo "window.location = 'regis.php'; ";
		echo "</script>";
	} else {
		$check = "SELECT username,email FROM member WHERE username = '$username' OR email = '$email'";
		$result = mysqli_query($conn, $check);
		$rows = mysqli_num_rows($result);
		$array = mysqli_fetch_array($result);

		

		if ($rows > 0) { //if you have user
			if ($array['username'] == $username || $array['email'] == $email) {
				$_SESSION['errors'] = "ชื่อบัญชีหรืออีเมลซ้ำ";
				session_write_close();
				echo "<script>";
				echo "window.location = 'regis.php'; ";
				echo "</script>";
			}
			// if ($array['email'] == $email) {
			// 	echo "<script type='text/javascript'>";
			// 	echo "alert('อีเมลถูกนี้ใช้ไปแล้ว');";
			// 	echo "</script>";
			// }
		} else {
			$password = md5($password);

			$sql = "INSERT INTO `member` (`name`, `lastname`, `birthday`, `tel`, `email`, `type`, `img`, `username`, `password`, `date`, `gender`) 
							VALUES ('$name', '$lastname', '$birthday', '$tel', '$email', '$mtype', '$newname', '$username', '$password', current_timestamp(), '$gender')";
			$result1 = mysqli_query($conn, $sql);

			if ($result1) {
				echo "<script type='text/javascript'>";
				echo "alert('สมัครเสร็จสิ้น');";
				echo "window.location = 'login.php'; ";
				echo "</script>";
			} else {
				echo "<script type='text/javascript'>";
				echo "alert('สมัครไม่สำเร็จ');";
				echo "window.location = 'regis.php'; ";
				echo "</script>";
			}
		}
		mysqli_close($conn);
	}
}
