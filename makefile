build:
	make build-nginx
	make build-php

build-nginx:
	docker build -t yii-docker-skeleton/nginx ./docker_images/nginx

build-php:
	docker build -t yii-docker-skeleton/php ./docker_images/php

up:
	docker-compose up -d

down:
	docker-compose down

in-composer:
	docker run --rm  -v "$PWD":/opt/htdocs/yii-basic-docker -it composer /bin/bash