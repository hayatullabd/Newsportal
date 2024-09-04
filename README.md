# Newsportal
CREATE DATABASE your_blog_db;

USE your_blog_db;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'author') NOT NULL
);

CREATE TABLE posts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_id INT(11),
    FOREIGN KEY (author_id) REFERENCES users(id)
);

