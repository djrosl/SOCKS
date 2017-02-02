<?php
use app\components\Formatter;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="slider wrapper">
    <?php foreach($slides as $slide): ?>
    <div class="item"><img src="<?=$slide->getImage()->getUrl('1200x383')?>">
        <div class="desc">
            <div class="title"><?=$slide->title?></div>
            <p><?=$slide->content?></p><a href="<?=$slide->link?>" target="_blank" class="button">УЗНАТЬ ПОДРОБНЕЕ</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="kinds wrapper">
    <h2 class="title_top">ВИДЫ ПОДПИСОК</h2>
    <div class="slider-kinds">
        <?php foreach($products as $product): ?>
        <div class="item">
            <a href="#" class="img_wrap"><img src="<?=$product->getImage()->getUrl('208x171')?>">
                <div class="title"><?=$product->title?> <span><?=$product->getSizes()?></span></div>
            </a>
            <div class="color">Цвет: <span><?=$product->getColors();?></span></div>
            <div class="bottom">
                <div class="coast">
                    <div class="current"><span><?=$price->price?></span> руб.</div>
                </div><a href="<?=Url::to(['/catalog'])?>" class="button">ОФОРМИТЬ</a></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="service">
    <div class="wrapper">
        <h2 class="title_top"><?=Formatter::field('promo_title')?></h2>
        <p><?=Formatter::field('promo_text')?></p>
        <div class="wrap">
            <div class="item"><img src="/template/images/bg/service-item-1.jpg">
                <div class="bottom">1 конверт</div>
            </div>
            <div class="item"><img src="/template/images/bg/service-item-2.jpg">
                <div class="bottom">3 пары</div>
            </div>
            <div class="item"><img src="/template/images/bg/service-item-3.jpg">
                <div class="bottom">Каждый месяц!</div>
            </div>
            <div class="item"><img src="/template/images/bg/service-item-4.jpg">
                <div class="content">
                    <div class="row">3 пары</div>
                    <div class="row">в месяц всего за</div>
                    <div class="row">300 руб.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about_us wrapper">
    <div class="title_top">О НАС</div>
    <?=Formatter::field('about')?>
</div>