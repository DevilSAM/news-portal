## NEWS PORTAL

___
```
git clone https://github.com/DevilSAM/news-portal.git
cd news-portal
cp .env.example .env
```
___

### Для запуска нужно предварительно установить и запустить doker

___

#### Выполнить запуст контейнеров
```
docker compose build
docker compose up -d
```

#### Засидить базу
```
php artisan db:seed
```

___
___

### следующие команды нужно запускать из контейнера news-portal-app
___
#### Обязательно запустить слушателя для rabbitmq
```
php artisan telegram:send-codes
```
Это нужно, чтобы телеграм-бот мог отправлять коды в группу
https://t.me/news_portal_code

___

#### Запустить воркер (нужен для броадкастинга)
```
php artisan queue:work
```

___

## Сайт доступен --> localhost:8002


