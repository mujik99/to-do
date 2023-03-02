## Как установить проект

Для установки проекта требуется:
- Cкачать проект с репозитория  
- Предварительно поставить composer если у вас его нет 
- Зайти в корневую деррикторию и прописать composer install
- Создать БД и пользователя соответсвующие настройке в файле .env (если нет файла его необходимо создать) 
или на крайний случай можно прописать настройки в файле config/database.php
- Предварительно поставить node и npm версия node не ниже 12 
- В корне проекте выполнить команду npm install потом npm run watch чтоб сбилдить файлы
- В корне проекте прописать команду php artisan key:generate
- В корне проекте прописать команду php artisan migrate.
- В корне проекте прописать команду php artisan db:seed - добавит 2 статуса в таблицу.

Исходный Vue код находиться в папке resources/js, при помощи npm run watch запускаеться ватчер которій автоматом компилит в public папку исходники

P.s. Реализовал консоль ккоманду для перевода тасок созданых более 5 минут назад в статус сделано, так же команда настроена на запуск кв шедулере каждую минуту , если на сервере настроить крон на шедулер ларавел то таски будут автоматически
переходить в статус сделано
