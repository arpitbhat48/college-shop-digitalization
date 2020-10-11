CREATE DATABASE college_shop_db;
USE college_shop_db;

-- Contains information about all the items
CREATE TABLE inventory (
	item_id INT PRIMARY KEY AUTO_INCREMENT,
	item_name VARCHAR(100),
	cost INT,
	stock INT,
	description VARCHAR(100)
);

-- Contains information about all the users
CREATE TABLE users (
	user_rno INT PRIMARY KEY,
	user_name VARCHAR(50),
	email VARCHAR(50),
	phone_no VARCHAR(10),
	password VARCHAR(128)
);

-- Contains the names of all the 'filters' used on the shop page
CREATE TABLE filter_names (
	filter_id INT PRIMARY KEY AUTO_INCREMENT,
	filter_name VARCHAR(50)
);

-- Contains all the items for every 'filter' mentioned in the 'filter_name' table
CREATE TABLE filter_items (
	filter_id INT,
	item_id INT,
	FOREIGN KEY (item_id) REFERENCES inventory(item_id),
	FOREIGN KEY (filter_id) REFERENCES filter_names(filter_id)
);

-- Contains all the items in a user's cart
CREATE TABLE cart (
	user_rno INT,
	item_id INT,
	FOREIGN KEY (user_rno) REFERENCES users(user_rno),
	FOREIGN KEY (item_id) REFERENCES inventory(item_id)
);

-- To be handled later

-- CREATE TABLE orders (
-- 	user_rno INT,
-- 	order_id INT,
-- 	FOREIGN KEY (user_rno) REFERENCES users(user_rno),
-- 	FOREIGN KEY (order_id) REFERENCES order_items(order_id)
-- );

-- CREATE TABLE order_items (
-- 	order_id INT AUTO_INCREMENT,
-- 	item_id INT,
-- 	FOREIGN KEY (item_id) REFERENCES inventory(item_id)
-- );
