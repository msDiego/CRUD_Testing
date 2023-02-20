
# Proyecto dedicado a realizar API CRUD y testeo mediante de PHPUnit

php artisan make:controller Api/[nombre]Controller --api --model=[Modelo]

php artisan make:test [TestName]

php artisan test --filter [TestName] (lanzar test)

## Creación de tokens postman

- /api/tokens/create para crear token.
- Body -> raw -> insertamos JSON con email y password
- Petición get de comunidades -> Authorization -> Bearer Token -> Lo pegamos
