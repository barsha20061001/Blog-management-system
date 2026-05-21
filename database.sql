CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(100)
);

INSERT INTO admins (email, password)
VALUES ('admin@gmail.com', 'admin123');

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
);

INSERT INTO categories (name) VALUES
('Admit Card'),
('Result'),
('Latest Jobs'),
('Government Jobs'),
('Private Jobs'),
('Technology'),
('Education');

CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    short_description TEXT,
    content LONGTEXT,
    category_id INT,
    image VARCHAR(255),
    created_at DATE
);