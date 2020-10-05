USE college_shop;

CREATE TABLE inventory (
	item_id INT PRIMARY KEY,
	item_name VARCHAR(100),
	cost INT,
	stock INT,
	description VARCHAR(100)
);

CREATE TABLE users (
	user_rno INT PRIMARY KEY,
	user_name VARCHAR(50),
	email VARCHAR(50),
	phone_no VARCHAR(10),
	password VARCHAR(128)
);

CREATE TABLE filter_names (
	filter_id INT PRIMARY KEY,
	filter_name VARCHAR(50)
);

CREATE TABLE filter_items (
	filter_id INT,
	item_id INT,
	FOREIGN KEY (item_id) REFERENCES inventory(item_id),
	FOREIGN KEY (filter_id) REFERENCES filter_names(filter_id)
);

CREATE TABLE order_items (
	order_id INT PRIMARY KEY,
	item_id INT,
	FOREIGN KEY (item_id) REFERENCES inventory(item_id)
);

CREATE TABLE orders (
	user_rno INT,
	order_id INT,
	FOREIGN KEY (user_rno) REFERENCES inventory(user_rno),
	FOREIGN KEY (order_id) REFERENCES order_items(order_id)
);

CREATE TABLE cart (
	user_rno INT,
	item_id INT,
	FOREIGN KEY (user_rno) REFERENCES inventory(user_rno),
	FOREIGN KEY (item_id) REFERENCES inventory(item_id)
);