<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 11.01.17
 * Time: 16:26
 */

use app\components\Formatter;
use yii\helpers\Url;

?>

<div class="gift wrapper">
    <h2 class="title_top">подарочная подписка</h2>
    <img class="top_img" src="/template/images/bg/gift.jpg">
    <article>
        <div class="title"><?=Formatter::field('gift_title')?></div>
        <?=Formatter::field('gift_text')?>
    </article>

    <div class="wrap">
        <a href="<?=Url::to(['/catalog'])?>" class="item">1 Месяц</a>
        <a href="<?=Url::to(['/catalog'])?>" class="item">3 Месяца</a>
        <a href="<?=Url::to(['/catalog'])?>" class="item">6 Месяцев</a>
        <a href="<?=Url::to(['/catalog'])?>" class="item">12 Месяцев</a>
    </div>

</div>
