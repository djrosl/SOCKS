<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 11.01.17
 * Time: 16:52
 */

$this->title = $page->title;

?>

<div class="faq wrapper">
    <article>
        <div class="title"><?=$this->title?></div>
        <?=$page->content?>
    </article>
</div>

