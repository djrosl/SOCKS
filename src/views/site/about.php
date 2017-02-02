<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 11.01.17
 * Time: 16:15
 */

use app\components\Formatter;

$this->title = 'Как это работает';

?>


<div class="about_us wrapper">
    <div class="title_top">О НАС</div>
    <?=Formatter::field('about')?>
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
