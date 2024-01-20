# native PHP

## run app
```shell
cp .env.example .env
docker-compose up -d
```

## composer install
```shell
docker-compose exec php_app bash
composer install
```

## fill database
```shell
docker-compose exec db bash
# mysql -u <DB_USERNAME> -p <DB_DATABASE> < <script.sql> # input <DB_PASSWORD>
mysql -u user -p app < /data/migrate.sql
mysql -u user -p app < /data/seed.sql
```