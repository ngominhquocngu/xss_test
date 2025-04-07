<?php
include "db.php";
if (!isset($_SESSION['user'])) die("Bạn cần đăng nhập");

$id = $_GET['id'];

try {
    $stmt = $conn->prepare("SELECT id FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $post = $res->fetch_assoc();
    $stmt->close();

    if (!$post) {
        die("Không tìm thấy bài viết".$id."để xóa.");
    }

    // Thực hiện xóa
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        die("Lỗi khi xóa bài viết.");
    }

    $stmt->close();

} catch (Exception $e) {
    die("Đã xảy ra lỗi khi xóa bài viết.");
}
?>
