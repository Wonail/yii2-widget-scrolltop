# yii2-widget-scrolltop
回到顶部小部件

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist wonail/yii2-widget-scrolltop "*"
```

or add

```
"wonail/yii2-widget-scrolltop": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \wonail\scrolltop\ScrollTop::widget([
    'btnColor' => 'btn-success',
    'options' => [
        'style' => [
            'bottom' => '50px'
        ]
    ]
]) ?>
```
