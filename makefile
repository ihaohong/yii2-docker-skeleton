build:
	make build-nginx
	make build-php

build-nginx:
	docker build -t ihaohong/nginx ./docker_images/nginx

build-php:
	docker build -t ihaohong/php ./docker_images/php

up:
	docker-compose up -d

down:
	docker-compose down

in-composer:
	docker run --rm  -v "$PWD":/opt/htdocs/yii-basic-docker -it composer /bin/bash