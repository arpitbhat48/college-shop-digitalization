CREATE DATABASE college_shop_db;
USE college_shop_db;

-- Contains information about all the items
CREATE TABLE inventory (
	item_id INT PRIMARY KEY AUTO_INCREMENT,
	item_name VARCHAR(100),
	cost INT,
	stock INT,
	description VARCHAR(100),
	image MEDIUMBLOB
);

-- Contains information about all the users
CREATE TABLE users (
	user_rno INT PRIMARY KEY,
	user_name VARCHAR(50),
	email VARCHAR(50),
	phone_no VARCHAR(10),
	password VARCHAR(128)
);

-- Contains all the items in a user's cart
CREATE TABLE cart (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_rno INT,
	item_id INT,
	FOREIGN KEY (user_rno) REFERENCES users(user_rno),
	FOREIGN KEY (item_id) REFERENCES inventory(item_id)
);

-- Contains all the orders
CREATE TABLE orders (
	order_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_rno INT,
	is_paid varchar(5) NOT NULL,
  	date_time datetime NOT NULL,
	FOREIGN KEY (user_rno) REFERENCES users(user_rno)
);

-- Contains all the orders with items
CREATE TABLE order_items (
	order_id INT,
	item_id INT,
	FOREIGN KEY (order_id) REFERENCES orders(order_id),
	FOREIGN KEY (item_id) REFERENCES inventory(item_id)
);

-- Contains information about the admin
CREATE TABLE admin (
	username VARCHAR(32) PRIMARY KEY,
	password VARCHAR(128)
);
