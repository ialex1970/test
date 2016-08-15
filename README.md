# test
Тестовое задание

Дамп базы данные в архиве.
Имя БД = 'guest_book',
login = 'root',
password = 'root'

Настройка БД в файле 'App/Db.php'

Настройки сервера:
файл /etc/hosts

127.0.0.1      	 test.dev

файл httpd.conf

<VirtualHost *:80>
    DocumentRoot "/path/to/document/root"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "/path/to/document/root"
    ServerName test.dev
</VirtualHost>
