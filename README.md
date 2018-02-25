# Yii2 Docker Skeleton

---

使用Docker多容器搭建Yii2本地应用。
使用到的容器:
- Nginx
- PHP
- MySQL
- Redis
- MemCache
- Composer

## 安装
### 安装Docker
- [Ubuntu](https://github.com/yeasy/docker_practice/blob/master/install/ubuntu.md)
- [CentOS](https://github.com/yeasy/docker_practice/blob/master/install/centos.md)
- [MacOS](https://github.com/yeasy/docker_practice/blob/master/install/mac.md)
- [Windows](https://github.com/yeasy/docker_practice/blob/master/install/windows.md)

最后记得使用镜像加速，参考[这里](https://github.com/yeasy/docker_practice/blob/master/install/mirror.md)

Linux用户需要单独安装Docker Compose，参考[这里](https://github.com/yeasy/docker_practice/blob/master/compose/install.md)

### 创建项目

下载代码
```shell
git clone git@github.com:ihaohong/yii2-docker-skeleton.git
cd yii2-docker-skeleton
```

创建目录
```shell
mkdir ~/opt ~/opt/data ~/opt/data/mysql ~/opt/log ~/opt/log/nginx ~/opt/log/php ~/opt/htdocs
```

### 使用composer安装项目依赖
进入composer容器
```shell
docker run --rm  -v ${PWD}:/opt/htdocs/yii2-docker-skeleton -it composer /bin/bash
```

容器里执行以下命令，安装依赖
```shell
cd /opt/htdocs/yii2-docker-skeleton/ && composer install --prefer-dist -vvv
```

composer依赖安装完后，退出容器
```shell
exit
```

### 宿主机运行项目
```shell
make build # 编译镜像
make up # 启动应用
```

## 测试
浏览器中打开
http://127.0.0.1/
就能看到Yii2框架的欢迎页了。

打开 http://127.0.0.1/?r=test/index
可以看到MySQL,Redis,MemCache这三个组件的连通状态。

## 参考文档
* [Docker — 从入门到实践](https://github.com/yeasy/docker_practice/)
* [Docker在PHP项目开发环境中的应用](https://avnpc.com/pages/build-php-develop-env-by-docker)