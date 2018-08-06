# Update Profile

Este foi projeto foi desenvolvido para uma campanha de atualização cadastral de clientes.

## Configuração

```composer install```

```cp .env.example .env```

```php artisan key:generate``` 

```php artisan migrate --seed```

```cd public && php -S localhost:9000```

Acessar a url ```localhost:9000``` para o formulário da campanha.
Para acessar o painel administrativo, ```localhost:9000``` com usuário:```admin@admin.com``` e senha: ```secret```.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
