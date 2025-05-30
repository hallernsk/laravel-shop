### Веб-приложение для управления товарами и заказами (Laravel)

(PHP PHP 8.0+, Laravel 9.x, MySQL)

#### Функциональность:

- Управление товарами (просмотр, редактирование, добавление, удаление)
- Управление заказами (просмотр, создание, изменение статуса)
- Категории товаров

#### Установка и запуск:

git clone https://github.com/hallernsk/laravel-shop.git

cd laravel-shop

cp  .env.example  .env  *(настроить DB_CONNECTION)*

php artisan key:generate

composer install

php artisan migrate --seed  *(создание 3 требуемых категорий и 10 произвольных товаров)*

php artisan serve

