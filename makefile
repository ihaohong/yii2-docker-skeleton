build:
	make build-memcache
	make build-redis
	make build-mysql
	make build-nginx
	make build-php

build-memcache:
	docker build -t yii-docker-skeleton/memcache ./docker_images/memcache

build-redis:
	docker build -t yii-docker-skeleton/redis ./docker_images/redis

build-mysql:
	docker build -t yii-docker-skeleton/mysql ./docker_images/mysql

build-nginx:
	docker build -t yii-docker-skeleton/nginx ./docker_images/nginx

build-php:
	docker build -t yii-docker-skeleton/php ./docker_images/php

up:
	docker-compose up -d

down:
	docker-compose down

in-php:
	docker exec -it yii2dockerskeleton_php_1 /bin/bash
