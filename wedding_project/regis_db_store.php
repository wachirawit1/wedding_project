<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<style>
		body {
			font-family: 'Prompt', sans-serif;
			background-color: #f0e1dc;

		}
	</style>

</head>

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


		$date1 = date("Ymd_His");
		$numrand = (mt_rand());
		$img = (isset($_POST['s_img']) ? $_POST['s_img'] : '');
		$upload = $_FILES['s_img']['name'];
		if ($upload != '') {

			$path = "img/";
			$type = strrchr($_FILES['s_img']['name'], ".");
			$newname = $numrand . $date1 . $type;
			$path_copy = $path . $newname;
			$path_copy1 = "assets/category_img/" . $newname;
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

				$sql = "INSERT INTO `store`(`username`, `password`, `s_name`, `s_email`, `cate_id`, `s_tel`, `s_img`,`IDcard_img`,status, `date`) 
			VALUES ('$username','$password','$s_name','$s_email', '$cate_id' , '$s_tel' , '$newname' ,'$newname' ,0, current_timestamp())";
				$result1 = mysqli_query($conn, $sql);


				if ($result1) { ?>
					<script>
						swal({
							title: "การแจ้งเตือน",
							text: "สมัครสำเร็จ",
							icon: "success",
							button: false
						});
					</script>
					<meta http-equiv="refresh" content="2; url=index.php">

				<?php
				} else { ?>
					<script>
						swal({
							title: "การแจ้งเตือน",
							text: "สมัคไม่รสำเร็จ",
							icon: "error",
							button: false
						});
					</script>
					<meta http-equiv="refresh" content="2; url=regis.php">
	<?php
				}
			}
			mysqli_close($conn);
		}
	} ?>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>