# drop table if it exists already, then recreate it

DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
  username  VARCHAR(20),
  password  VARCHAR(20)
);
