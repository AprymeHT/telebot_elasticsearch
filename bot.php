<?php

include('SearchData.php');
include('IndexData.php');
include('DeleteData.php');
require_once "vendor/autoload.php";


const TOKEN = "bot_token";

$bot = new \TelegramBot\Api\Client(TOKEN);

$bot->command('start', function ($message) use ($bot) {
    $answer = 'Добро пожаловать, ' . $message->getChat()->getFirstName() . '!';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

$bot->command('help', function ($message) use ($bot) {
    $answer = 'Команды:
/search - поиск документа. Пример: /search index, type, info (type и info - опционально).
/index - добавление документа. Пример: /index index, type, id, info (все поля обязательны).
/delete - удаление документа. Пример: /delete index, type, id (все поля обязательны).';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

$bot->command('search', function ($message) use ($bot){
    $text = $message->getText();
    $param = str_replace('/search ', '', $text);
    list($index, $type, $info) = explode(", ", $param);
    $searchDoc = new SearchData();

    $bot->sendMessage($message->getChat()->getId(),$searchDoc->getData($index, $type, $info));
});

$bot->command('index', function ($message) use ($bot){
    $text = $message->getText();
    $param = str_replace('/index ', '', $text);
    list($index, $type, $id, $info) = explode(", ", $param);

    $indexDoc = new IndexData();

    $bot->sendMessage($message->getChat()->getId(),$indexDoc->addData($index, $type, $id, $info));
});

$bot->command('delete', function ($message) use ($bot) {
    $text = $message->getText();
    $param = str_replace('/delete ', '', $text);
    list($index, $type, $id) = explode(", ", $param);

    $deleteDoc = new DeleteData();

    $bot->sendMessage($message->getChat()->getId(), $deleteDoc->delData($index, $type, $id));

});
$bot->run();