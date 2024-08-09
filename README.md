# Тестовое задание:  Разработка API в Laravel 10
**Для запуска приложения:**

- Выполните команду ```docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs```;
- Выполните команду `./vendor/bin/sail up`;
- Выполните команду `./vendor/bin/sail migrate`;

**Приложение будет доступно по адресу** *localhost:80*

Документация доступна по адресу `/api/documentation`