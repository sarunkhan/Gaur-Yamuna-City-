CREATE DATABASE IF NOT EXISTS gbu_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gbu_website;

CREATE TABLE admins (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE notices (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  notice_date DATE NOT NULL,
  status ENUM('published','draft') NOT NULL DEFAULT 'published',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE courses (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  school VARCHAR(180) NOT NULL,
  name VARCHAR(255) NOT NULL,
  level VARCHAR(80) DEFAULT 'UG',
  description TEXT,
  status ENUM('active','inactive') NOT NULL DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE events (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  event_date DATE NOT NULL,
  venue VARCHAR(255),
  description TEXT,
  status ENUM('published','draft') NOT NULL DEFAULT 'published',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE settings (
  setting_key VARCHAR(100) PRIMARY KEY,
  setting_value TEXT NOT NULL
);

INSERT INTO settings(setting_key, setting_value) VALUES
('university_name','Gautam Buddha University'),
('location','Greater Noida, Uttar Pradesh'),
('admission_text','Admissions Open 2026–27')
ON DUPLICATE KEY UPDATE setting_value=VALUES(setting_value);

-- IMPORTANT: replace this demo password immediately.
-- Password: ChangeMe@123
INSERT INTO admins(name,email,password_hash)
VALUES ('Super Admin','admin@gbu.local',
'$2y$10$6uW8o2ZJXh3w7eG5m8hQ4Oe0kP7V8o4o4bq3o6mJQm5aYf0xG1c6S');
