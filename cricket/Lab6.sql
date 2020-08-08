USE Pratham200447850;

-- DROP TABLE cricketS;
CREATE TABLE IF NOT EXISTS crickets(
firstname VARCHAR(50),
lastname VARCHAR(50),
numbers INT,
position VARCHAR(15));

INSERT INTO cricketS VALUES
('Pratham', 'Shah', 5, 'fielding'),
('Richard','Sam', 6, 'batting'),
('Susan','John', 12, 'wicketkeeper');
ALTER TABLE cricketS
ADD COLUMN cricket_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

SELECT * FROM cricketS


