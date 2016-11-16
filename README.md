##四脚猫轻量级框架sijiaomao-mvc

- 基于composer的包管理器
- 默认路由规则简单，controller/model/arg1/arg2...
- 轻量级的ORM  
- 模版引擎强大而轻量
- 配置文件就是PHP数组，基本无配置
- 数据库迁移采用migration，so easy！
 

## 基本使用
- 安装
 1. git clone https://github.com/phpinside/mymvc.git mymvc
 2. 编辑 Apache下的httpd-vhost.conf文件，添加如下内容：
 **注意以下的目录改成自己对应的本地目录！**
<Directory "D:/demos/myMVC/app/web">
     Options Indexes FollowSymLinks Includes ExecCGI
     AllowOverride All
     Require all granted
 </Directory>

 <VirtualHost *:80>
     ServerAdmin webmaster@my.com
     DocumentRoot "D:/demos/myMVC/app/web"
     ServerName my.mvc.com
     ErrorLog "logs/my.mvc.com.com-error.log"
     CustomLog "logs/my.mvc.com-access.log" common
 </VirtualHost>
3. 启动Apache和MySQL
4. 在MySQL中创建一个数据库mydb，用户名：mymvc， 密码：123456。
 **注意：mymvc这个用户需要有全部的数据库操作权限！**
5. 访问：http://my.mvc.com/home/migrate 执行初始化，生成todo数据表。
6. 访问：http://my.mvc.com/todo/index  可以执行CRUD的各种操作。

 
- 补充
1. 系统自带默认路由，一般情况不需要去配置路由，自定义路由请查看config目录下的routes.php的示例。
 配置参考 <http://altorouter.com/usage/mapping-routes.html>
2. 模版引擎参考 <https://latte.nette.org/>
3. ORM的使用参考 <https://github.com/lox/pheasant>

