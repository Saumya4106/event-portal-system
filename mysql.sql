CREATE DATABASE event_portal;

USE event_portal;

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    date DATE,
    venue VARCHAR(255)
);

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    event_id INT,
    FOREIGN KEY (event_id) REFERENCES events(id)
);

