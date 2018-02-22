build-nginx:
	docker build -t ihaohong/nginx ./docker_images/nginx

build-php:
	docker build -t ihaohong/php ./docker_images/php

up:
	docker-compose up -d

down:
	docker-compose down