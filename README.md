# Yii2 Docker Skeleton

---

使用Doker多容器搭建Yii2本地应用。
用到的容器
- Nginx
- PHP
- MySQL
- Redis
- MemCache

## 安装
### 安装Docker
- [Ubuntu](https://github.com/yeasy/docker_practice/blob/master/install/ubuntu.md)
- [CentOS](https://github.com/yeasy/docker_practice/blob/master/install/centos.md)
- [MacOS](https://github.com/yeasy/docker_practice/blob/master/install/mac.md)
- [Windows](https://github.com/yeasy/docker_practice/blob/master/install/windows.md)

最后记得使用镜像加速，参考[这里](https://github.com/yeasy/docker_practice/blob/master/install/mirror.md)

Linux用户需要单独安装docker-compose，参考[这里](https://github.com/yeasy/docker_practice/blob/master/compose/install.md)

### 创建项目

下载代码
```shell
git clone git@github.com:ihaohong/yii2-docker-skeleton.git
```

创建目录
```shell
mkdir ~/opt ~/opt/data ~/opt/data/mysql ~/opt/data/elasticsearch ~/opt/log ~/opt/log/nginx ~/opt/log/php ~/opt/htdocs
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

