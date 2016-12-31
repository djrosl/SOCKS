<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 15:43
 *
 */
use app\components\Formatter;
use app\models\SettingsForm;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Личный кабинет';
?>


<div class="user wrapper">
    <div class="top">
        <div class="title_top">
            Добро пожаловать, <span><?=Yii::$app->user->identity->profile->name?></span>!
            <a href="<?=Url::to(['user/logout']);?>" data-method="post" class="logout">Выйти</a>
        </div>
    </div>

    <div class="tabs">
        <a href="#" class="tab_subs active" data-tab-handler="subs">Мои подписки</a>
        <a href="#" class="tab_personal_data" data-tab-handler="personal">Персональные данные</a>
        <a href="#" class="tab_notifications" data-tab-handler="notifications">Оповещения</a>
    </div>

    <div class="subs_block active" data-tab="subs">
        <div class="head_block">МОИ ПОДПИСКИ</div>
        <?php foreach($orders as $order):
            if($order->status): ?>
        <div class="order active">
            <div class="head">
                <ul>
                    <li>№<?=$order->id?></li>
                    <li><?=$order->subscription->title?></li>
                    <li class="time_left">
                        <span><?=Formatter::diff($order->date_start, $order->date_end)->m?> месяцев</span>

                        <?php if(Formatter::diff(date('Y-m'), $order->date_start)->m && Formatter::diff(date('Y-m'), $order->date_start)->invert): ?><div><span><?=Formatter::diff(date('Y-m'), $order->date_start)->m?> месяц (истекает через <?=Formatter::diff($order->date_end, date('Y-m'))->m?> месяцев)</span></div><?php endif; ?>
                    </li>
                    <li class="money_status">
                        <span><?=$order->subscription->price?> Р. </span><span>(не оплачено)</span>
                    </li>
                    <li class="order_status">
                        <a href="#" class="details">Подробнее</a>
                        <span class="status active">
                  <img src="" alt="">
                  Активна
                </span>
                        <span class="status inactive">
                  <img src="" alt="">
                  Не активна
                </span>
                    </li>
                </ul>
                <div class="sub">
                    <?php foreach($order->products as $product):
                        echo strtolower($product->getSmallDescription().'; ');
                    endforeach; ?>
                </div>
            </div>

            <div class="drop_details">
                <table class="calendar">
                    <tr>
                        <?php
                        //Formatter::arrayFromIndex(Formatter::MONTH_NAMES, date('m'))
                        foreach(Formatter::MONTH_NAMES as $k => $month): ?>
                            <?php if($k%4 === 0){ echo '</tr><tr>'; }
                            $class = 'inactive';
                            $start_k = DateTime::createFromFormat('Y-m-d', $order->date_start)->format('n');
                            $end_k = DateTime::createFromFormat('Y-m-d', $order->date_end)->format('n');
                            if($start_k > $end_k){
                                $class = $month['id'] >= $start_k || $month['id'] <= $end_k ? 'expected' : $class;
                            } else {
                                $class = $month['id'] >= $start_k && $month['id'] <= $end_k ? 'expected' : $class;
                            }
                            $class = $month['id'] >= $start_k && $month['id'] <= date('n') ? 'done' : $class;

                            ?>

                        <td class="<?=$class?>"><?=$month['name']?></td>

                        <?php endforeach; ?>
                    </tr>
                </table>

                <div class="ordered">
                    <div class="change"><a href="#">Изменить подписку</a></div>
                    <?php foreach($order->products as $product): ?>
                        <div class="item">
                            <a href="#" class="img_wrap">
                                <img src="<?=$product->product->getImage()->getUrl('109x81')?>" alt="">
                            </a>
                            <ul class="item_details">
                                <li><?=$product->gender?></li>
                                <li><?=$product->type?></li>
                                <li>Цвет: <?=Json::decode($product->color)['name']?></li>
                                <li>Размер <?=$product->size?></li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="text_wrap">
                    <?php foreach($order->getProducts()->groupBy('product_id')->all() as $product):
                        echo Html::tag('p', $product->product->description);
                    endforeach; ?>
                </div>

                <div class="cancel_or_extend">
                    <a href="#">Отменить подписку</a>
                    <a href="">Продлить подписку</a>
                </div>

                <?php $form = ActiveForm::begin([
                    'options'=>[
                        'class'=>'contact_form_order'
                    ]
                ]);
                $order->phone = Yii::$app->user->identity->profile->phone; ?>

                <span><?=$order->address ? "ФОРМА ОТПРАВЛЕНА" : 'ОФОРМИТЕ ПОДПИСКУ'?></span>
                <?php if(!$order->address): ?>
                    <?=$form->field($order, 'id')->hiddenInput()->label(false)?>
                    <?=$form->field($order, 'address')->textInput(['placeholder'=>'Введите адрес доставки'])->label(false)?>
                    <?=$form->field($order, 'phone')->textInput(['placeholder'=>'Номер телефона'])->label(false)?>
                    <?=Html::submitButton('ОФОРМИТЬ ПОДПИСКУ', ['class'=>'button'])?>
                <?php endif; ?>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <?php else: ?>
        <div class="order inactive">
            <div class="head">
                <ul>
                    <li>№<?=$order->id?></li>
                    <li><?=$order->subscription->title?></li>
                    <li class="time_left">
                        <span><?=$order->subscription->length?> </span><!--<span>(истекает через 23 дня)</span>-->
                    </li>
                    <li class="money_status">
                        <span><?=$order->subscription->price?> Р. </span><span>(не оплачено)</span>
                    </li>
                    <li class="order_status">
                        <a href="#" class="details">Скрыть</a>
                        <span class="status active">
                  <img src="" alt="">
                  Активна
                </span>
                        <span class="status inactive">
                  <img src="" alt="">
                  Не активна
                </span>
                    </li>
                </ul>
                <div class="sub">
                    <?php foreach($order->products as $product):
                       echo strtolower($product->getSmallDescription().'; ');
                    endforeach; ?>
                </div>
            </div>

            <div class="drop_details active">
                <table class="calendar">
                    <tr>
                        <td class="done">Январь</td>
                        <td class="done">Февраль</td>
                        <td class="done">Март</td>
                        <td class="expected">Апрель</td>
                    </tr>
                    <tr>
                        <td class="expected">Май</td>
                        <td class="expected">Июнь</td>
                        <td class="inactive">Март</td>
                        <td class="inactive">Апрель</td>
                    </tr>
                    <tr>
                        <td class="inactive">Январь</td>
                        <td class="inactive">Февраль</td>
                        <td class="inactive">Март</td>
                        <td class="inactive">Апрель</td>
                    </tr>
                </table>

                <div class="ordered">
                    <div class="change"><a href="#">Изменить подписку</a></div>
                    <?php foreach($order->products as $product): ?>
                    <div class="item">
                        <a href="#" class="img_wrap">
                            <img src="<?=$product->product->getImage()->getUrl('109x81')?>" alt="">
                        </a>
                        <ul class="item_details">
                            <li><?=$product->gender?></li>
                            <li><?=$product->type?></li>
                            <li>Цвет: <?=Json::decode($product->color)['name']?></li>
                            <li>Размер <?=$product->size?></li>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="text_wrap">
                    <?php foreach($order->getProducts()->groupBy('product_id')->all() as $product):
                        echo Html::tag('p', $product->product->description);
                    endforeach; ?>
                </div>

                <div class="cancel_or_extend">
                    <a href="#">Отменить подписку</a>
                    <a href="">Продлить подписку</a>
                </div>

                <?php $form = ActiveForm::begin([
                    'options'=>[
                        'class'=>'contact_form_order'
                    ]
                ]);
                $order->phone = Yii::$app->user->identity->profile->phone; ?>

                    <span><?=$order->address ? "ФОРМА ОТПРАВЛЕНА" : 'ОФОРМИТЕ ПОДПИСКУ'?></span>
                <?php if(!$order->address): ?>
                <?=$form->field($order, 'id')->hiddenInput()->label(false)?>
                <?=$form->field($order, 'address')->textInput(['placeholder'=>'Введите адрес доставки'])->label(false)?>
                <?=$form->field($order, 'phone')->textInput(['placeholder'=>'Номер телефона'])->label(false)?>
                <?=Html::submitButton('ОФОРМИТЬ ПОДПИСКУ', ['class'=>'button'])?>
                <?php endif; ?>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <?php endif;
        endforeach; ?>

    </div>

    <div class="personal_block" data-tab="personal">
        <div class="head_block">ПЕРСОНАЛЬНЫЕ ДАННЫЕ</div>

        <?php
        $settings = \Yii::createObject(SettingsForm::className());
        $form = ActiveForm::begin([
            'action'=>Url::to(['/user/settings/account'])
        ]); ?>

            <div class="row">
                <?php
                $settings->name = Yii::$app->user->identity->profile->name;
                $settings->phone = Yii::$app->user->identity->profile->phone;
                ?>
                <?= $form->field($settings, 'name')->textInput(['placeholder'=>'ФИО'])->label(false) ?>
            </div>
            <div class="row">
                <?= $form->field($settings, 'phone')->textInput(['placeholder'=>'Телефон'])->label(false) ?>
            </div>
            <div class="row">
                <?= $form->field($settings, 'email')->textInput(['placeholder'=>'E-mail'])->label(false) ?>
                <?= $form->field($settings, 'username')->hiddenInput()->label(false) ?>
            </div>
            <div class="row">
                <?= $form->field($settings, 'new_password')->passwordInput(['placeholder'=>'Новый пароль'])->label(false) ?>
            </div>
            <div class="row">
                <?= $form->field($settings, 'current_password')->passwordInput(['placeholder'=>'Старый пароль'])->label(false) ?>
            </div>
            <div class="row">
                <?=Html::submitButton('Сохранить', ['class'=>'button'])?>
            </div>
        <?php ActiveForm::end(); ?>

    </div>

    <div class="notifications_block" data-tab="notifications">
        <div class="head_block">ОПОВЕЩЕНИЯ</div>
        <?php foreach(Yii::$app->user->identity->notifications as $notify): ?>
        <div class="row">
            <div class="from">От: <span>admin</span></div>
            <div class="date"><?=Yii::$app->formatter->asDate($notify->date)?></div>
            <div class="message">
                <?=$notify->content?>
            </div>
            <a href="<?=Url::to(['delete-notify', 'id'=>$notify->id])?>" class="delete"><span></span><span></span></a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
