CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255)
);
ALTER TABLE posts ADD COLUMN user_id INT NOT NULL DEFAULT 1;
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  content TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO posts (title, content) VALUES
('Lập trình PHP từ con số 0: Hướng dẫn cho người mới bắt đầu',
 'Nếu bạn đang tìm hiểu về lập trình web, PHP là một lựa chọn tuyệt vời để bắt đầu. Bài viết này sẽ hướng dẫn bạn các bước đầu tiên để xây dựng trang web động bằng PHP, từ cài đặt môi trường đến viết đoạn mã đầu tiên.'),

('5 thủ thuật tăng tốc website PHP bạn nên biết',
 'Hiệu năng luôn là yếu tố quan trọng với website. Trong bài viết này, chúng ta sẽ cùng khám phá 5 cách đơn giản nhưng hiệu quả để tăng tốc website PHP của bạn.'),

('Hướng dẫn tạo hệ thống blog bằng PHP thuần và MySQL',
 'Bạn muốn tự tay xây dựng một hệ thống blog? Bài viết này hướng dẫn từng bước tạo blog cơ bản sử dụng PHP thuần, kết nối cơ sở dữ liệu MySQL, và cách hiển thị bài viết.'),

('Responsive Web Design: Làm sao để website hiển thị đẹp trên mọi thiết bị?',
 'Ngày nay, người dùng truy cập web qua nhiều thiết bị khác nhau. Bài viết này sẽ chỉ bạn cách thiết kế giao diện web phản hồi (responsive) để tối ưu trải nghiệm người dùng trên cả desktop lẫn mobile.'),

('Tối ưu SEO on-page cho blog cá nhân: Những điều cơ bản cần biết',
 'SEO giúp bài viết của bạn tiếp cận được nhiều độc giả hơn. Bài viết này chia sẻ những nguyên tắc tối ưu SEO on-page đơn giản mà hiệu quả, đặc biệt dành cho người mới làm blog.');
