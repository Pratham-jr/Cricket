USE Pratham200447850;
-- DROP TABLE user
CREATE TABLE user (user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL);

SELECT * FROM user;