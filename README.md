# <p align="center">[laravel-admin-template](https://github.com/zhanbai/laravel-admin-template)</p>

## 关于

基于 [Laravel Admin](https://github.com/z-song/laravel-admin) 的基础模板，方便快速进行开发。

## 使用

```bash
# 克隆项目
$ git clone https://github.com/zhanbai/laravel-admin-template.git project-name

# 进入项目目录
$ cd project-name

# 安装依赖
$ composer install

# 创建并修改 .env 文件内容，主要是数据库信息
$ cp .env.example .env && php artisan key:generate

# 执行数据库迁移和恢复后台数据
$ php artisan migrate && php artisan db:seed --class=AdminTablesSeeder

# 创建管理员用户
$ php artisan admin:create-user

# 启动服务
$ php artisan serve
```

浏览器访问 http://127.0.0.1:8000

## 协议

本项目开源，基于 [MIT 开源协议](https://opensource.org/licenses/MIT)。
