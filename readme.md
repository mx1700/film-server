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

####配置

配置在 .env 文件的 DB 配置节点

初始化加密串
```bash
$ php artisan key:generate
```

初始化oauth密钥
```bash
$ php artisan passport:install
```

####初始化数据库
``` bash
$ php artisan migrate
$ php artisan db:seed --class=EventTableSeeder
$ php artisan db:seed --class=LocationCardTableSeeder
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

获取单个电影信息 /api/films/1

获取电影互动内容 /api/films/1/events

获取电影地点卡 /api/films/1/location-cards

获取帮助页信息 /api/help_info

添加反馈  POST  /api/feedback  
参数：content=xxx,platform={1 android,2 iphone}

微信登陆 GET /api/weixin_login?code=WEIXIN_CODE  
返回: { "user_id": 4, "access_token": "TOKEN", "name": "苍井空" }

access_token 使用方法:  
request header 里增加头  
Authorization: Bearer ACCESS_TOKEN

获取当前登陆用户信息 GET /user

## TODO
1. 微信登陆
1. 剧集推荐
1. 弹幕配置
1. 启动屏配置
1. 关于配置
1. 增加上传指纹功能
1. 限制后台只能管理员登陆

## DONE
1. 电影列表返回 url 地址
1. 创建获取单个电影信息 api
1. 部署测试环境
1. 创建 events 表结构
1. 创建获取 events api
1. acr 后台上传测试识别视频
1. upyun 上传 app 播放视频和图片
1. 创建获取 events api
1. film 表增加 提示 列
1. 测试数据增加提示列数据
1. events 表增加开始时间结束时间
1. events 测试数据增加开始时间结束时间
1. 地点卡接口
1. 电影管理页面
1. 事件管理页面
1. 地点卡管理页面
1. 时间选择增加相应控件
1. 补完校验规则
1. 时长改为 time 类型
1. 意见反馈 api
1. 帮助信息 api
1. 帮助配置
1. 意见反馈



