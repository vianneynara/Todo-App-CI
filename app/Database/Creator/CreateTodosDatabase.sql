CREATE TABLE todos (
  todo_id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  isDone TINYINT(1) DEFAULT 0
);