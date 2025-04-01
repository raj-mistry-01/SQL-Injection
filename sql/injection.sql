CREATE DATABASE vuln_db;
USE vuln_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES
('admin', 'secret123'),
('john', 'pass456'),
('alice', 'qwerty789');