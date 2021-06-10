> #### Шаблон README файла для сервисов
>
> Для библиотек используйте файл: [common/README.example-lib.md](../common/README.example-lib.md)
>
> Для всех остальных типов проектов используйте файл: [common/README.example.md](../common/README.example.md)

# Сервис timetable

## Краткое описание

Проект Skyeng, который отвечает за расписание занятий между студентами школы и преподавателями.

## Ответственные

- Code Owner: [Алексей Медведев](https://www.notion.so/skyengteam/Alexey-Parshukov-f2d47d18260a4c5a93f88e46e51a44a0)
- Product Owner: Алексей Катаев
- Команда: Archicture

<!--
Как заполнять:
  Code Owner (владалец кода/ответственный разработчик):
    * Описание роли: https://confluence.skyeng.ru/pages/viewpage.action?pageId=25406034
  Product Owner (владелец продукта/менеджер продукта):
    * Описание роли: https://confluence.skyeng.ru/pages/viewpage.action?pageId=25413321
  Команда, с точки зрения орг. структуры:
    * Команда из списка https://confluence.skyeng.ru/pages/viewpage.action?pageId=25409725
-->

## Slack-каналы

    - #teachers-dev
    - #teachers-alerts
    - #teachers-info

## URL на проде

https://timetable.skyeng.ru

## Ссылка на общую документацию

https://confluence.skyeng.ru/display/AUTH

## Ссылка на документацию api

https://api.timetable.skyeng.ru/api/doc

## Ссылка на NewRelic

https://rpm.newrelic.com/accounts/1471826/applications/132812801

## Ссылка на sentry

https://sentry.skyeng.tech/skyeng/id/

## Технологический стек

- Код: PHP7.1, Symfony 4.2.
- База: PostgreSQL.
- Деплой: [Jenkins](https://j.skyeng.tech/job/Teachers/job/Timetable/job/master/).

## Клиентские SDK

- https://github.com/skyeng/id-bundle - для проектов на Symfony 3.4+
- https://github.com/skyeng/id-yii-module - для проектов на Yii 1
- https://github.com/skyeng/id-client - для прочих php-приложений

## Описание логики и границы сервиса

Задача сервиса: создавать и управлять расписанием занятий учеников и отслеживать жизненный цикл урока.
Сервис хранит в собственной базе список учеников с их
предпочтениями. Использует api сервиса tramway для получения списка преподавателей с метаданными,
определяющими пожелания учителей в контексте поиска соответствия между учителями и учениками.
Хранит в собственной базе результаты проведения всех уроков.

## Метрики и дашборды

- [График 500 ошибок](https://dashboard.skyeng.link/d/nDK1uYDZz/balancer-dashboard?orgId=1&refresh=10s)
- [Vimbox: Video call stabilization](https://app.redash.io/skyeng/dashboard/vimbox-video-call-stabilization)

## Деплой

...

## Внутренние соглашения

...

## Стейджинг

...

...
