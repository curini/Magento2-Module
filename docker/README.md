# Docker - setup

## 1°) Build images

```console
docker compose up -d --build
```

## 2°) Enter the PHP container

```console
docker exec -it magento-php bash
```

### 2.1°) Next you can install Magento 2

```console
php bin/magento setup:install --base-url=http://localhost --db-host=db --db-name=magento --db-user=magento \
--db-password=magento --backend-frontname=admin --admin-firstname=Admin \
--admin-lastname=User --admin-email=admin@example.com --admin-user=admin \
--admin-password=Admin123! --language=en_US --currency=USD --timezone=Europe/Paris --use-rewrites=1 \
--search-engine=opensearch --opensearch-host=opensearch --opensearch-port=9200
```

### 2.2°) Fix permissions for Magento generated files

```console
chown -R www-data:www-data var generated pub/static pub/media
```
