## Install
``` 
docker-compose up -d
docker-compose exec php-fpm composer install
docker-compose exec php-fpm php bin/console doctrine:schema:update --force
```

## Get token
```
curl -X POST -H "Content-Type: application/json" http://localhost/api/login_check -d '{"username":"johndoe","password":"test"}'
```

## Test Api
1. http://localhost/api
2. http://localhost/product/1
   3. http://localhost/api/graphql/graphiql
       ```graphql
       {
           product(id: "/api/products/1") {
               id
               _id
               name
               categoryName
               price
           }
      }
       ```