# telebot_elasticsearch
### О боте:
 - Данный бот работает в связке с системой полнотекстового поиска ElasticSearch.
 
### Основные возможности
 - Добавлять, искать и удалять документы в системе ES.
  
### Важная информация
 - Необходимо иметь домен с https.
 - Иметь токен бота.
 - Установленный сервис ElasticSearch на Вашей системе.
 
Инструкция
---
#### Создание бота
1. Напишите @botfather  https://telegram.me/botfather со следующим текстом: /newbot.
2. Введите имя Вашего бота в чате.
3. Введите username Вашего бота.
4. После регистрации, @bothather пришлет токен будущего бота.

#### Подключение пакетов с помощью Composer
Установите [Composer](https://getcomposer.org/). Отредактируйте *composer.json* 
```javascript
{
    "name": "yourproject/yourproject",
    "type": "project",
    "require": {
            "telegram-bot/api": "^2.3",
            "elasticsearch/elasticsearch": "^6.7"
        }
}
```
И запустите composer update

Установка Webhook
---
Впишите Ваш токен в файле **bot.php**
```php
const TOKEN = "bot_token";
```
Отправьте запрос вида: 
>https://api.telegram.org/bot~token~/setWebhook?url=https://yourdomain/path_to_bot.php

 ~Token~ - это Ваш уникальный токен, а yourdomain/path_to_bot.php - путь до bot.php на вашем домене.
 
Если все пройдет успешно, то Вы получите ответ:
>{"ok":true,"result":true,"description":"Webhook was set"}

Для удаления Webhook замените **setWebhook** на **deleteWebhook**

После данных действий можно начинать пользоваться ботом.

Начало работы
---

1. Отправьте боту команду **/start**
2. Отправьте боту команду **/help**

###HAVE FUN


 
  