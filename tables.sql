CREATE TABLE inventory (
	item_id INT PRIMARY KEY,
	item_name VARCHAR(40),
	cost INT,
	stock INT,
	description VARCHAR(100)
);

CREATE TABLE users (
	user_rno INT PRIMARY KEY,
	user_name VARCHAR(30),
	email VARCHAR(30),
	phone_no INT,
	password VARCHAR(30)
);

CREATE TABLE filter_names (
	filter_id INT PRIMARY KEY,
	filter_name VARCHAR(20)
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
	user_id INT PRIMARY KEY,
	order_id INT,
	FOREIGN KEY (order_id) REFERENCES order_items(order_id)
);

CREATE TABLE cart (
	user_id INT,
	item_id INT,
	FOREIGN KEY (user_id) REFERENCES orders(user_id),
	FOREIGN KEY (item_id) REFERENCES inventory(item_id)
);

