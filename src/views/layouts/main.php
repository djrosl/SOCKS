<?php
use app\assets\AppAsset;
use app\assets\TemplateAsset;
use dektrium\user\models\LoginForm;
use app\models\RegistrationForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">
    <!--[if lt IE 10]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <header>
        <div class="wrapper top">
            <a href="/" class="logo"><img src="/template/images/icons/logo.png">
                <h1>Носки по подписке Владивосток</h1></a>
            <div class="contacts">
                <a href="tel:89024845226" class="phone"><img src="/template/images/icons/phone.png" alt="phone-icon"> <span>8 (902) 484 52 26</span> </a>
                <a href="mailto:grusomme.h@mail.ru" class="mail"><img src="/template/images/icons/mail.png" alt="mail-icon"> <span>grusomme.h@mail.ru</span></a>
            </div>

            <?php if(Yii::$app->user->isGuest): ?>
                <a href="" class="login popup-handler" data-popup="login_popup"><img src="/template/images/icons/login.png"> <span>Личный кабинет</span></a>
            <?php else: ?>
                <a href="<?=Url::to(['/account'])?>" class="login"><img src="/template/images/icons/login.png"> <span><?=Yii::$app->user->identity->profile->name?></span></a>
            <?php endif; ?>
        </div>
        <nav class="wrapper">
            <div class="burger"><span></span> <span></span> <span></span></div>
            <ul>
                <li><a href="<?=Url::to(['/catalog'])?>">Подписаться</a></li>
                <li><a href="<?=Url::to(['/catalog'])?>">Каталог товаров</a></li>
                <li><a href="<?=Url::to(['site/about'])?>">Как это работает</a></li>
                <li><a href="<?=Url::to(['site/delivery'])?>">Доставка и оплата</a></li>
                <li><a href="<?=Url::to(['site/faq'])?>">Вопрос/Ответ</a></li>
                <li class="gift">
                    <a href="<?=Url::to(['site/gift'])?>"><img src="/template/images/icons/gift.png" alt=""> <span>Подарочная подписка</span></a>
                </li>
            </ul>
        </nav>
    </header>

    <?= $content ?>

    <footer>
        <div class="wrapper">
            <ul class="nav">
                <li><a href="#">Доставка и оплата</a></li>
                <li><a href="#">Возврат/обмен</a></li>
                <li><a href="#">Остановить/отменить подписку</a></li>
            </ul>
            <div class="social">
                <a href="#"><img src="/template/images/icons/social.jpg"></a>
            </div>
            <div class="contacts"><a href="tel:89024845226" class="phone">8 (902) 484 52 26</a> <a href="mailto:grusomme.h@mail.ru" class="mail">grusomme.h@mail.ru</a></div>
            <div class="copyright">© 2016 Соксус</div>
        </div>
    </footer>

    <div class="popup confirm">
        <div class="wrap">
            <a href="#" class="close"></a>
            <p>
                Подтвердите вашу почту
                перейдя по ссылке,
                которую мы отправили Вам
                на почту
            </p>
        </div>
    </div>

    <div class="popup login_popup">
        <div class="wrap">
            <a href="#" class="close"></a>
            <div class="title">ВХОД</div>
            <?php
            $login = \Yii::createObject(LoginForm::className());
            $form = ActiveForm::begin([
                'id'                     => 'login-form',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'validateOnBlur'         => false,
                'validateOnType'         => false,
                'validateOnChange'       => false,
                'action' => ['/user/security/login']
            ]) ?>
            <?= $form->field(
                $login,
                'login',
                ['inputOptions' => [
                        'autofocus' => 'autofocus',
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'placeholder'=>Yii::t('user', 'Login')
                    ]
                ]
            )->label(false) ?>
            <?= $form
                ->field(
                    $login,
                    'password',
                    ['inputOptions' => [
                            'class' => 'form-control',
                            'tabindex' => '2',
                            'placeholder'=>Yii::t('user', 'Password')
                        ]
                    ]
                )
                ->passwordInput()
                ->label(false); ?>
            <div class="text-justify">
                <?=Html::a(
                    Yii::t('user', 'Forgot password?'),
                    ['/user/recovery/request'],
                    ['tabindex' => '5','class'=>'lost'])?>

                <a href="#" class="lost popup-handler" data-popup="reg">Зарегистрироваться</a>
            </div>
            <?= Html::submitButton(
                Yii::t('user', 'ВОЙТИ'),
                ['class' => 'button', 'tabindex' => '3']
            ) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="popup reg">
        <div class="wrap">
            <a href="#" class="close"></a>
            <div class="title">РЕГИСТРАЦИЯ</div>

            <?php
            $register = \Yii::createObject(RegistrationForm::className());
            $form = ActiveForm::begin([
                'id'                     => 'registration-form',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'action' => ['/user/registration/register']
            ]); ?>

            <?= $form->field($register, 'name',
                ['inputOptions' => [
                    'placeholder'=>Yii::t('user', 'ФИО')
                ]
                ])->label(false)  ?>

            <?= $form->field($register, 'phone',
                ['inputOptions' => [
                    'placeholder'=>Yii::t('user', 'Телефон')
                ]
                ])->label(false)  ?>

            <?= $form->field($register, 'email',
                ['inputOptions' => [
                    'placeholder'=>Yii::t('user', 'Email')
                ]
            ])->label(false) ?>

            <?= $form->field($register, 'username')->hiddenInput()->label(false) ?>

            <?= $form->field($register, 'password',
                ['inputOptions' => [
                    'placeholder'=>Yii::t('user', 'Password')
                ]
                ])->passwordInput()->label(false) ?>


            <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
