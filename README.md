<p align="center">
    <a href="https://hyperf.io/" target="_blank">
        <img src="https://hyperf.oss-cn-hangzhou.aliyuncs.com/hyperf.png" height="100px">
    </a>
    <h1 align="center">Hyperf Error Code Command</h1>
    <br>
</p>

If You Like This Please Give Me Star

Install
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require lengbin/hyperf-error-code
```

or add

```
"lengbin/hyperf-error-code": "*"
```
to the require section of your `composer.json` file.

you can see [document](https://github.com/ice-leng/error-code)

Configs
-----
``` php
    // 配置 /config/autoload/errorCode.php
    return [
        // 错误码文件 目录
        'path'           => [
            BASE_PATH . '/app/Constant/Errors'
        ],
        // 合并生成 类 文件名称
        'classname'      => 'Error',
        // 合并生成 类 命名空间
        'classNamespace' => 'App\\Constant',
        // 合并生成 类 文件输出目录
        'output'         => BASE_PATH . '/app/Constant',
    ];

```


Publish
-------
```php
php ./bin/hyperf.php vendor:publish lengbin/hyperf-error-code
```

Usage
-----
```php
php ./bin/hyperf.php gen:error-code
```
