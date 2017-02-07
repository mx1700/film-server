# film-server

## 依赖
* php >= 5.5
* composer
* mysql

## 安装

####安装依赖
``` bash
composer install
```

####配置数据库

配置在 .env 文件的 DB 配置节点


####初始化数据库
``` bash
php artisan migrate
```

####运行开发服务器
``` bash
php artisan serve
```

####测试
浏览器访问 http://127.0.0.1:8000


## API 说明
未完成