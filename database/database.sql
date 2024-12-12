CREATE TABLE account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL UNIQUE, 
    nickname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nickname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    setfood VARCHAR(255) NOT NULL,
    eventDate VARCHAR(255) NOT NULL,
    startTime VARCHAR(255) NOT NULL,
    eventSize VARCHAR(255) NOT NULL,
    attendees VARCHAR(255) NOT NULL,
    reservation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES account(id) 
);

CREATE TABLE foodset (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nameset VARCHAR(255) NOT NULL,
    info TEXT NOT NULL,
    link TEXT NOT NULL,
    price VARCHAR(255) NOT NULL
);

CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    foodset_id INT,
    FOREIGN KEY (foodset_id) REFERENCES foodset(id)
);

CREATE TABLE menu_choices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    menu_item_id INT,
    foodset_id INT,
    choice VARCHAR(255),
    FOREIGN KEY (foodset_id) REFERENCES foodset(id),
    FOREIGN KEY (menu_item_id) REFERENCES menu_items(id)
);

ALTER TABLE foodset AUTO_INCREMENT = 1;
ALTER TABLE menu_items AUTO_INCREMENT = 1;
ALTER TABLE menu_choices AUTO_INCREMENT = 1;