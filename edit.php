<?php
include "db.php";
if (!isset($_SESSION['user'])) die("Bạn cần đăng nhập");

// Hàm lọc HTML an toàn
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

// Lấy ID & kiểm tra
$id = $_GET['id'];
if (!is_numeric($id)) {
    die("ID không hợp lệ.");
}

// Lấy bài viết
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$post = $res->fetch_assoc();
$stmt->close();

if (!$post) {
    die("Không tìm thấy bài viết.");
}

// Xử lý cập nhật
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $t = sanitize_html($_POST['title']);
  $c = sanitize_html($_POST['content']);

  $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
  $stmt->bind_param("ssi", $t, $c, $id);
  $stmt->execute();
  $stmt->close();

  header("Location: index.php");
  exit;
}
?>

<h2>Chỉnh sửa bài viết</h2>
<form method="post">
  <input name="title" value='<?= $post["title"] ?>' required><br>
  <textarea name="content" required><?= $post['content'] ?></textarea><br>
  <button>Cập nhật</button>
</form>

<script src="script.js"></script>
