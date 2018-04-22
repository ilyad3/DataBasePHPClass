# DataBasePHPClass

# Подключение класса
```php
// Подключение файла соединения с БД
include_once 'db.class.php';

// хост БД
define('db_host','localhost');

// Имя БД
define('db_name','name');

// Пользователь БД
define('db_user','root');

// Пароль БД
define('db_pass','password');

// Обявление класса для подключения к бд
$db = new DB_class(db_host,db_name,db_user,db_pass);
```

# Запросы к базе данных
**Вывод данных из базы**
```php
$query = $db->select(true,"*","bdname","example='".$example."'");
```
В данном запросе передаётся 4 параметра:

1. Нужен ли циклический вывод
2. Что именно нужно достать из базы данных
3. Название базы данных
4. Ключевое слово (WHERE)

`Циклический вывод:`
Если первый параметр передан, как *TRUE*, то вывод происходит следующим образом:
```php
print_r($query[0]['название колонки']);
print_r($query[1]['название колонки']);
print_r($query[2]['название колонки']);
```
Если Этот параметр передан, как *FALSE*, то вывод происходит вот так:
```php
print_r($query['название колонки']);
```

**Обновление данных базы**
```php
$db->update('bdname',"`text`='$text',`step`='$step'","example='$example'");
```
В данном запросе передаётся 3 параметра:

1. Название базы данных
2. Что нужно изменить и на что
3. Ключевое слово (WHERE)

**Добавление данных в базу**
```php
$db->insert('`dbname`',"`text`, `step`","$text,'$step'");
```
В данном запросе передаётся 3 параметра:

1. Название базы данных
2. Поля внутри базы данных в которые нужно вставить данные
3. Данные для вставки в эти поля

**Удаление данных из базы**
```php
$db->delete('`dbname`',"example='$example'");
```
В данном запросе передаётся 2 параметра:

1. Название базы данных
2. Ключевое слово (WHERE)
