# TestSibers
Test case for Sibers

Настройки базы данных в файле "\src\config.php"

---------------------
Структура базы данных "test_sibers"

```SQL
create table user
(
  id         int auto_increment
    primary key,
  user_login text             not null,
  user_pass  text             not null,
  first_name text             null,
  last_name  text             null,
  gender     tinytext         null,
  birth      date             null,
  access     int(2) default 0 not null
);
```
