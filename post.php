<?php
include "db.php";
$id = (int)$_GET['id'];
$res = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $res->fetch_assoc();

if (!$post):
?>
  <h1>Không tìm thấy bài viết <?= htmlspecialchars($id) ?></h1>
  <a href="index.php">Quay lại trang chủ</a>
<?php else: ?>
  <h1><?= htmlspecialchars($post['title']) ?></h1>
  <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

  <?php if (isset($_SESSION['user'])): ?>
    <a href="edit.php?id=<?= (int)$post['id'] ?>" class="edit-btn">Chỉnh sửa</a>
    <a href="delete.php?id=<?= (int)$post['id'] ?>" class="delete-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">Xóa</a>
  <?php endif; ?>

  <a href="index.php">Quay lại</a>
<?php endif; ?>

<script src="script.js"></script>
