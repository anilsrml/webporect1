CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    birthday DATE,
    text TEXT,
    rating INT,
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
