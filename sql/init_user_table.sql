# drop table if it exists already, then recreate it

DROP TABLE IF EXISTS user;

CREATE TABLE user (
  username    VARCHAR(20),
  password    VARCHAR(20),
  phone_num   VARCHAR(20),
  first_name  VARCHAR(20),
  last_name   VARCHAR(20),
  age         INT(3),
  email       VARCHAR(40),
  address     VARCHAR(50)
);
