<?php
session_start();
include "koneksi.php";

$isLogin = isset($_SESSION['isLogin']) && $_SESSION['isLogin'];
$currentUsername = isset($_SESSION['username']);

if ($isLogin) { 
	header("location: admin.php"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

  $stmt->bind_param("ss", $username, $password);
  
  $stmt->execute();

  $hasil = $stmt->get_result();
  
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  if (!empty($row)) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['isLogin'] = true;

    header("location:admin.php");
  } else {
    header("location:login.php");
  }

  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | My Wonderful Indoensia</title>
    <link
        rel="shortcut icon"
        href="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3197005/person-circle-icon-md.png"
        type="image/x-icon" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
</head>

<body class="bg-danger-subtle">
    <a href="index.php" class="btn btn-primary m-3 px-5">Kembali</a>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-8 m-auto">
                <div class="card border-0 shadow rounded-5">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="bi bi-person-circle h1 display-4"></i>
                            <p>Welcome to My Wonderful Indoensia</p>
                            <hr />
                        </div>
                        <form action="" method="post">
                            <input
                                type="text"
                                name="username"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Username" required />
                            <input
                                type="password"
                                name="password"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Password" required />
                            <div class="text-center my-3 d-grid">
                                <button class="btn btn-danger rounded-4">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>

</html>

<?php 
}
?>