# drop table if it exists already, then recreate it

DROP TABLE IF EXISTS vehicle;

CREATE TABLE vehicle (
  vin      VARCHAR(20),
  color    VARCHAR(15),
  make     VARCHAR(20),
  model    VARCHAR(20),
  mileage  INT(20),
  year     INT(4),
  price    INT(10)
);
