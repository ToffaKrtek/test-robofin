SET GLOBAL local_infile=1;

use robofin;


LOAD DATA LOCAL INFILE 'var/lib/mysql-files/testdb_dismission_reason.csv'
INTO TABLE dismission_reason
FIELDS TERMINATED BY ';'
ENCLOSED BY ''
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;


LOAD DATA LOCAL INFILE 'var/lib/mysql-files/testdb_position.csv'
INTO TABLE position
FIELDS TERMINATED BY ';'
ENCLOSED BY ''
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;


LOAD DATA LOCAL INFILE 'var/lib/mysql-files/testdb_user.csv'
INTO TABLE user
FIELDS TERMINATED BY ';'
ENCLOSED BY ''
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;


LOAD DATA LOCAL INFILE 'var/lib/mysql-files/testdb_department.csv'
INTO TABLE department
FIELDS TERMINATED BY ';'
ENCLOSED BY ''
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'var/lib/mysql-files/testdb_user_position.csv'
INTO TABLE user_position
FIELDS TERMINATED BY ';'
ENCLOSED BY ''
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE 'var/lib/mysql-files/testdb_user_dismission.csv'
INTO TABLE user_dismission
FIELDS TERMINATED BY ';'
ENCLOSED BY ''
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;
