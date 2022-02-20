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
					$_SESSION['username'] = $username;
					$_SESSION['name'] = $name;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['type'] = $type;
	?>
					<script>
						swal({
							title: "การแจ้งเตือน",
							text: "สมัครสำเร็จ",
							icon: "success",
							button: false
						});
					</script>
					<meta http-equiv="refresh" content="2; url=index.php">


				<?php } else { ?>
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
	}
	?>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>