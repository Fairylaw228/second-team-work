# autobot
Телеграмм-бот для оформления пропусков

Для запуска проект необходимо иметь глобально установеленный php и composer

Для php необходим файл php.ini, который находится в папке shared

В папке autobot_site нужно скопировать файл .env.example переименовать в .env и в строке 14 'DB_DATABASE=' - поставить имя пустой базы данных 

Далее в папке autobot_site нужно открыть терминал и прописать 'composer update' и './start.sh'