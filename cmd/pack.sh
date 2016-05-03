#!/bin/bash

docker-compose up -d
docker exec mysql sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" --databases world' > ./build/sql/world.sql
docker-compose down
rm -rf ./tmp