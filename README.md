## Описание проекта

Этот проект предоставляет две основные функциональности:

- получение администратором сообщества уведомления при подписке/отписке пользователя
- отправление сообщения с формой для фидбека пользователю, отписавшегося от сообщества.

## Запуск проекта

В корневой папке проекта создайте файл с расширением `.env`, в котором задайте значения переменным окружения по примеру из файла `.env.example`. Заметьте, что одной из переменных окружения является API-ключ сообщества. Как его получить, смотрите в следующем разделе.

Для запуска проекта необходимо запустить из консоли `index.php`, находясь в директории проекта, следующим образом:

```
php index.php
```

## Подготовка сообщества

Для того, чтобы можно было обрабатывать события, которые происходят в сообществе, и отправлять сообщения от имени этого сообщество, требуются некоторые действия.
Для этого необходимо перейти в упраление сообществом и сделать следующее:

1. Нужно включить сообщения сообщества.
   <img width="923" alt="0" src="https://github.com/admarkov/it-diving-template/assets/11661233/7fe8e746-f65e-4f87-8452-54e4542e3bb1">

2. После этого нужно разрешить сообществу отправлять себе сообщения. Это можно сделать на странице сообщества.
   <img width="420" alt="6" src="https://github.com/admarkov/it-diving-template/assets/11661233/7f8ff4e7-4f42-4c9f-9b82-6b3cded5a184">

3. Возвращаемся в управление сообществом, и переходим в раздел "Работа с API".
   <img width="943" alt="1" src="https://github.com/admarkov/it-diving-template/assets/11661233/3a6f0c52-ee2c-4b15-ac46-56d9aff277a9">

4. Создаём ключ для доступа к API, указываем права на управление сообществом и сообщения сообщества.
   <img width="595" alt="2" src="https://github.com/admarkov/it-diving-template/assets/11661233/372d69ad-0210-46a8-9cc1-a04fc6aa1052">
   <img width="576" alt="3" src="https://github.com/admarkov/it-diving-template/assets/11661233/8f4e238a-4c4a-41d1-944e-620db1675059">

5. Переходим в раздел Long Poll API. Включаем Long Poll API, указываем версию 5.199.
   <img width="568" alt="4" src="https://github.com/admarkov/it-diving-template/assets/11661233/b799ece7-9b90-4744-b03c-548cb9867d5f">

6. Переходим в подраздел "Типы событий" и включаем события "Подписка на сообщество", "Выход из сообщества"
   <img width="579" alt="5" src="https://github.com/admarkov/it-diving-template/assets/11661233/00080bae-6aea-49c1-8da6-f575e7101ddc">
