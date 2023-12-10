# Шаблон для выполнения задания проекта IT-diving

## Подготовка к выполнению задания
На MacOS можно установить интерпретатор PHP по этой инструкции
https://www.php.net/manual/ru/install.macosx.packages.php

На Windows самым простым способом будет установить XAMPP
https://www.apachefriends.org/ru/index.html

Для того, чтобы загрузить этот шаблон, можно склонировать репозиторий через git, а если вы этого не умеете, то можно просто скачать архив
<img width="596" alt="Снимок экрана 2023-12-10 в 22 46 46" src="https://github.com/admarkov/it-diving-template/assets/11661233/6afe0534-8bee-4ac1-8f6c-c4b071247e7c">

Можно воспользоваться любой средой разработки. Я предпочитаю PHPStorm, но подойдет даже простой текстовый редактор.

Для запуска проекта необходимо запустить из консоли `index.php`, находясь в директории проекта. На MacOS, к примеру, следующим образом:
```
php index.php
```

## Настройка сообщества
Для того, чтобы можно было обрабатывать события, которые происходят в сообществе, и отправлять сообщения от имени этого сообщество, требуются некоторые действия.
Для этого необходимо перейти в упраление сообществом и сделать следующее:

1. Нужно включить сообщения сообщества.
Картинка
2. После этого нужно разрешить сообществу отправлять себе сообщения. Это можно сделать на странице сообщества.
Картинка
3. Возвращаемся в управление сообществом, и переходим в раздел "Работа с API".
Картинка
4. Создаём ключ для доступа к API, указываем права на управление сообществом и сообщения сообщества.
Картинка
Картинка
5. Переходим в раздел Long Poll API. Включаем Long Poll API, указываем версию 5.131.
Картинка
6. Переходим в подраздел "Типы событий" и включаем события "Подписка на сообщество", "Выход из сообщества"
Картинка

## Работа с шаблоном
Я заранее написал базовый код.

Для работы с ним сначала нужно заполнить файл `SubStalker/Config.php`, указав в нём айди вашего сообщества и его токен, который был получен в процессе выполнения инструкции выше.

Остается лишь реализовать обработку колбэков. Соотвествующую логику достаточно прописать в методы  `groupJoin` и `groupLeave` в файле `SubStalker/CallbacksHandler.php`.
Когда пользователь покинет сообщество, будет вызван метод `groupLeave`, а когда вступит в него, соответственно `groupJoin`.

groupEnjoy!