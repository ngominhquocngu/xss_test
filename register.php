<?php include "db.php";
if ($_POST) {
  $u = $_POST['username'];
  $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $conn->query("INSERT INTO users (username, password) VALUES ('$u', '$p')");
  header("Location: login.php");
}
?>
<h2>Đăng ký</h2>
<form method="post">
  <input name="username" required><br>
  <input name="password" type="password" required><br>
  <button>Đăng ký</button>
</form>
<script src="script.js"></script>