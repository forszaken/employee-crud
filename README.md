# TestWork-72822

Запустить можно через make up.
1. make up
2. .env backend (креды ниже)
3. make ci в корне проекта
4. npm install в frontend

Если нет Gnu Make, то внутри Makefile есть все Docker-команды для поднятия нужных контейнеров, можно их ввести.
Для .env, доступы к бд:
```
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=root
DB_PASSWORD=root
```