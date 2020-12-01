
-- password: password@123
INSERT INTO users (user_rno, user_name, email, phone_no, password) VALUES
	(501808, 'Arpit Bhat', 'arpitbhatx@gmail.com', '7666610976', '$2y$10$T8m4WdPjRHC2pTBC4jkNKuJaaP/usx3bGMDQO.TuMpbrzpU/FzSE.'),
	(501810, 'Archit Bhonsle', 'architbhonsle@gmail.com', '9182736455', '$2y$10$T8m4WdPjRHC2pTBC4jkNKuJaaP/usx3bGMDQO.TuMpbrzpU/FzSE.'),
	(501807, 'Omkar Bhabal', 'bhabalomkar@gmail.com', '9876543210', '$2y$10$T8m4WdPjRHC2pTBC4jkNKuJaaP/usx3bGMDQO.TuMpbrzpU/FzSE.');

INSERT INTO inventory (item_name, cost, stock, description) VALUES
	('Journal sheet set', 120, 40, '500 pages Journal Sheets'),
	('Hard Bound Cover', 20, 35, 'Hard Bound Cover for Journals'),
	('Drawing Sheets', 10, 50, 'Engineering Drawing Sheets');