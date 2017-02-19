# film-server

## 依赖
* php >= 5.5
* composer
* mysql

## 安装

####安装依赖
``` bash
$ composer install
```

####配置数据库

配置在 .env 文件的 DB 配置节点


####初始化数据库
``` bash
$ php artisan migrate
$ php artisan db:seed --class=UserTableSeeder
```

####运行开发服务器
``` bash
$ php artisan serve
```

####测试
浏览器访问 http://127.0.0.1:8000

#### 静态文件服务器
域名：film-server.b0.upaiyun.com

使用又拍云服务
ftp: v0.ftp.upyun.com
用户：film


## API 说明

获取电影列表 /api/films

获取单个电影 /api/films/1

## TODO
1. 部署测试环境
1. 创建 events 表结构
1. acr 后台上传测试识别视频
1. upyun 上传 app 播放视频和图片
1. 创建 events 数据填充
1. 电影管理页面
1. 事件管理页面
1. 启动屏配置
1. 帮助配置
1. 关于配置
1. 意见反馈

## DONE
1. 电影列表返回 url 地址
1. 创建获取单个电影信息 api
