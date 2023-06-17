-- Create the users table
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL
);

-- Create the vaccination_centers table
CREATE TABLE vaccination_centers (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  address VARCHAR(200) NOT NULL,
  working_hours VARCHAR(100) NOT NULL
);

-- Create the vaccination_slots table
CREATE TABLE vaccination_slots (
  id INT PRIMARY KEY AUTO_INCREMENT,
  center VARCHAR(100) NOT NULL,
  user_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
