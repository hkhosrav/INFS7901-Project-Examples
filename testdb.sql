CREATE DATABASE testdb;
USE testdb;
CREATE TABLE testtable (
    studentNum VARCHAR(8) PRIMARY KEY,
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    phone VARCHAR(10)
);
INSERT INTO testtable VALUES ('s151251', 'Hassan', 'Khosravi', '0402893253');
INSERT INTO testtable VALUES ('s426912', 'Nicholas', 'Joseph', '0407283474');