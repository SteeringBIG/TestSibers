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
  user_login varchar(100)     not null,
  user_pass  varchar(100)     null,
  first_name varchar(100)     null,
  last_name  varchar(100)     null,
  gender     tinytext         null,
  birth      date             null,
  access     int(2) default 0 not null
);
```

Выгрузка базы с демо данными в файле "user_table_demo.sql"
Пользователь с правами администратора: admin с паролем 123
у остальных пользователей пароль - 321