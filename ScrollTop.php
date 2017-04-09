<?php
namespace wonail\scrolltop;

use rmrevin\yii\fontawesome\component\Icon;
use rmrevin\yii\fontawesome\FA;
use wonail\base\AnimateAsset;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Scroll to top widget
 */
class ScrollTop extends Widget
{

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    
    /**
     * @var string 按钮颜色
     */
    public $btnColor = 'btn-success';
    
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['btn', $this->btnColor, 'fade']);
        // 如果需要调整style样式，可在调用该部件时配置属性`options['style']`添加需要的样式
        Html::addCssStyle($this->options, [
            'position' => 'fixed',
            'top' => '90%',
            'right' => '3%',
            'z-index' => 1020,
            'display' => 'none',
        ], false);
        $this->options['data-click'] = 'scroll-top';
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::button(new Icon(FA::_ANGLE_UP), $this->options);
        $this->registerJs();
        parent::run();
    }

    public function registerJs()
    {
        $view = $this->getView();
        AnimateAsset::register($view);
//        $js = <<<JS
//var scrollTop = $("[data-click=scroll-top]");
//$(document).scroll(function () {
//    var e = $(document).scrollTop();
//    if (e >= 200) {
//        scrollTop.css("display", "block");
//        setTimeout(function() {
//            scrollTop.addClass("in");
//        }, 100);
//    } else {
//        scrollTop.removeClass("in");
//        setTimeout(function() {
//            scrollTop.css("display", "none");
//        }, 100);
//    }
//});
//scrollTop.click(function (e) {
//    e.preventDefault();
//    $("html, body").animate({
//        scrollTop: $("body").offset().top
//    }, 500);
//});
//JS;
        $js = 'var scrollTop=$("[data-click=scroll-top]");$(document).scroll(function(){var e=$(document).scrollTop();if(e>=200){scrollTop.css("display","block");setTimeout(function(){scrollTop.addClass("in")},100)}else{scrollTop.removeClass("in");setTimeout(function(){scrollTop.css("display","none")},100)}});scrollTop.click(function(e){e.preventDefault();$("html, body").animate({scrollTop:$("body").offset().top},500)});';
        $view->registerJs($js);
    }

}
