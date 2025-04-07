<?php include "db.php";
if ($_POST) {
  $u = $_POST['username'];
  $p = $_POST['password'];
  $res = $conn->query("SELECT * FROM users WHERE username='$u'");
  $user = $res->fetch_assoc();
  if ($user && password_verify($p, $user['password'])) {
    $_SESSION['user'] = $u;
    header("Location: index.php");
  } else {
    echo "Sai tài khoản hoặc mật khẩu";
  }
}
?>
<h2>Đăng nhập</h2>
<form method="post">
  <input name="username" required><br>
  <input name="password" type="password" required><br>
  <button>Đăng nhập</button>
</form>
<script src="script.js"></script>