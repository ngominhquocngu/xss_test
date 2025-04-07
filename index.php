<?php include "db.php"; ?>
<h1>Bài viết mới nhất</h1>

<?php if (isset($_SESSION['user'])): ?>
  <div style="margin-bottom: 20px;">
    <p>Xin chào <strong><?= htmlspecialchars($_SESSION['user']) ?></strong></p>
    <div style="margin-top: 10px;">
      <a href="create.php" class="btn">Viết bài</a>
      <a href="logout.php" class="btn logout">Đăng xuất</a>
    </div>
  </div>
<?php else: ?>
  <div style="margin-bottom: 20px;">
    <a href="login.php" class="btn">Đăng nhập</a>
    <a href="register.php" class="btn">Đăng ký</a>
  </div>
<?php endif; ?>


<ul>
<?php
$res = $conn->query("SELECT id, title FROM posts ORDER BY created_at DESC LIMIT 5");
while ($row = $res->fetch_assoc()):
?>
  <li>
    <a href="post.php?id=<?= (int)$row['id'] ?>">
      <?= htmlspecialchars($row['title']) ?>
    </a>
  </li>
<?php endwhile; ?>
</ul>

<script src="script.js"></script>
