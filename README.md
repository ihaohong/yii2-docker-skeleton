Yii2 Docker Skeleton

---

使用Doker多容器搭建Yii2本地应用。
使用容器
- Nginx
- PHP
- MySQL
- Redis
- MemCache

# 安装
## 安装Docker
[Ubuntu](https://github.com/yeasy/docker_practice/blob/master/install/ubuntu.md)
[CentOS](https://github.com/yeasy/docker_practice/blob/master/install/centos.md)
[MacOS](https://github.com/yeasy/docker_practice/blob/master/install/mac.md)
[Windows](https://github.com/yeasy/docker_practice/blob/master/install/windows.md)

最后记得使用镜像加速，参考[这里](https://github.com/yeasy/docker_practice/blob/master/install/mirror.md)

## 安装项目

### 下载代码
```shell
git clone git@github.com:ihaohong/yii2-docker-skeleton.git
```

创建目录
```shell
mkdir ~/opt ~/opt/data ~/opt/data/mysql ~/opt/data/elasticsearch ~/opt/log ~/opt/log/nginx ~/opt/log/php ~/opt/htdocs
```

### 安装composer依赖
进入composer容器
```shell
make in-composer
```

容器里执行以下命令，安装依赖
```shell
cd /opt/htdocs/yii2-docker-skeleton/ && composer install --prefer-dist -vvv
```

composer依赖安装完后，退出容器
```shell
exit
```

# 宿主机运行项目
```shell
make build # 编译镜像
make up # 启动应用
```

### 测试
### 脚本
