<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">


<style>
  body {
    font-family: 'Prompt', sans-serif;
    background-color: #f0e1dc;

  }
</style>

<body>
  <div class="container">

    <?php


    include("condb.php");
    session_start();
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $password = md5($password);


      $check_user = "SELECT * FROM store WHERE username='$username' AND password='$password'";

      $result = $conn->query($check_user);

      $row = mysqli_fetch_array($result);

      if ($result->num_rows > 0) {

        $_SESSION['s_id'] = $row['s_id'];
        $_SESSION['username'] = $username;
        $_SESSION['s_name'] = $row['s_name']; ?>

        <div class="card box d-flex mt-5">
          <div class="card-header">แจ้งเตือน</div>
          <div class="card-body">
            <div class="alert alert-success " role="alert">
              <h5 class="card-title text-center">เข้าสู่ระบบสำเร็จ !!</h5>
            </div>
            <meta http-equiv="refresh" content="2; url=storepost.php">
          </div>
        </div>
    <?php } else {
        $_SESSION['errors'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        session_write_close();
        echo "<script>";
        echo "window.location = 'login_store.php'; ";
        echo "</script>";
      }
    }
    ?>

  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>