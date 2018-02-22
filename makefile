build-nginx:
	docker build -t ihaohong/nginx ./docker_images/nginx

up:
	docker-compose up -d

down:
	docker-compose down