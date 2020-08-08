USE Pratham200447850;

-- DROP TABLE cricketPosition;
CREATE TABLE IF NOT EXISTS cricketPosition (
position VARCHAR(15));

INSERT INTO cricketPosition VALUES
('--------'),
('fielding'),
('batting'),
('bowling'),
('wicket-keeper');

SELECT * FROM cricketPosition

