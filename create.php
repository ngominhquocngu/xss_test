<?php
include "db.php";
if (!isset($_SESSION['user'])) die("Bạn cần đăng nhập");

function sanitize_html($html) {
  $html = preg_replace('#<(script|iframe|object|embed)[^>]*?>.*?</\1>#is', '', $html);

  return preg_replace_callback(
    '#<(\w+)([^>]*)>#is',
    function ($matches) {
      $tag = $matches[1];
      $attrs = $matches[2];

      preg_match_all('/\s*(href|src)\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^"\'>\s]+))/i', $attrs, $attr_matches, PREG_SET_ORDER);

      $clean_attrs = '';
      foreach ($attr_matches as $m) {
        $name = strtolower($m[1]);
        $value = $m[2] !== '' ? $m[2] : ($m[3] !== '' ? $m[3] : $m[4]);

        if (preg_match('/^(javascript|data):/i', $value)) continue;

        $clean_attrs .= " $name=\"$value\"";
      }

      return "<$tag$clean_attrs>";
    },
    $html
  );
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $t = sanitize_html($_POST['title']);
  $c = sanitize_html($_POST['content']);

  $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
  $stmt->bind_param("ss", $t, $c);

  if ($stmt->execute()) {
    header("Location: index.php");
    exit;
  } else {
    echo "<p class='alert'>Lỗi khi lưu bài viết.</p>";
  }

  $stmt->close();
}
?>

<div class="container">
  <h2>Viết bài mới</h2>
  <form method="post">
    <input name="title" placeholder="Tiêu đề" required><br>
    <textarea name="content" placeholder="Nội dung bài viết..." required></textarea><br>
    <button class="btn">Đăng</button>
  </form>
</div>

<script src="script.js"></script>
