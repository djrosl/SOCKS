<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 6:04
 */

use app\assets\NgAsset;

$this->title = 'Каталог';
NgAsset::register($this);

?>
<style>
    [ng-cloak] {
        display: none !important;
    }
</style>
<div class="wrp"  ng-app="Socks" ng-controller="CatalogController" ng-cloak>
<div class="catalog wrapper">
    <h2 class="title_top">Каталог товаров</h2>
    <div class="tabs"><a href="#" class="tab_socks active" data-tab-handler="socks">НОСКИ</a> <a href="#" class="tab_personal_data" data-tab-handler="underwear">Нижнее белье</a></div>
    <div class="socks_block active" data-tab="socks">
        <div class="select_subs">
            <div class="made_in"><img src="/template/images/bg/made_in.jpg"> <span>Выберите подписку:</span></div>
            <div class="select_wrap" ng-init="choiceCost = '<?=$subscriptions[1]->price?>'">
                <?php foreach($subscriptions as $sub): ?>
                <label>
                    <input type="radio" name="select_subs" data-id="<?=$sub->id?>" ng-model="choiceCost" value="<?=$sub->price?>">
                    <div class="wrap">
                        <div class="title"><?=$sub->title?></div>
                        <div class="month"><?=$sub->length?></div>
                        <div class="price"><?=$sub->price?> Р.</div>
                    </div>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="catalog_slider" owl-carousel data-options="{autoplay: false,
		nav: true,
		slideSpeed: 300,
		paginationSpeed: 400,
		pagination: true,
		padding: 25,
		navText: '',
		items: 1}">
            <div class="item" ng-repeat="product in products" owl-carousel-item>
                <div class="img_wrap"><img ng-src="{{product.image}}"></div>
                <div class="wrap">
                    <div class="filter">
                        <div class="top">
                            <label class="female">
                                <input type="radio" name="gender" ng-model="gender" value="Женские носочки">
                                <span>Женские</span>
                            </label>
                            <label class="male">
                                <input type="radio" name="gender" ng-model="gender" value="Мужские носки">
                                <span>Мужские</span>
                            </label>
                            <ul class="color_select" ng-init="colorSelected = product.colors[0]"  style="border-color: {{colorSelected.color}};">
                                <li class="current" ng-click="showDrop = !showDrop"><span class="bgcol"  style="background-color: {{colorSelected.color}}"></span> Цвет: <span>{{colorSelected.name}}</span></li>
                                <ul class="drop" ng-show="showDrop">
                                    <li ng-repeat="color in product.colors" ng-click="$parent.showDrop = 0; $parent.colorSelected = color"><span class="bgcol" style="background-color: {{color.color}}"></span><span>{{color.name}}</span></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="center">
                            <div class="type">
                                <label>
                                    <input type="radio" name="type" ng-model="type" value="Теп."> <span>Теплые</span></label>
                                <label>
                                    <input type="radio" name="type" ng-model="type" value="Классические"> <span>Классические</span></label>
                            </div>
                            <div class="size">
                                <div class="span title">Размер:</div>
                                <label ng-repeat="size in product.sizes">
                                    <input type="radio" name="size" ng-model="$parent.size" value="р.{{size}}"><span>{{size}}</span></label>
                            </div>
                        </div>
                        <div class="consist">
                            <div class="title"><span>Состав: </span>{{product.consist}}</div>
                            <p>{{product.description}}</p>
                        </div><a href="" class="button"
                                 ng-show="!choice[2].hasOwnProperty('id')"
                                 ng-click="addChoice(gender, colorSelected, type, size, product.image, product.id)">ВЫБРАТЬ</a></div>
                </div>
            </div>

        </div>
    </div>
    <div class="underwear_block" data-tab="underwear"></div>
</div>
<div class="selected">
    <div class="wrapper">
        <div class="title_top">Ваш выбор</div>
        <div class="wrap">
            <div class="item"
                 ng-class="{active: item.img, confirm: item.img}"
                 ng-repeat="item in choice">
                <a href="" ng-click="removeChoice($index)" class="delete" ng-show="item.img"></a>
                <div class="top">
                    <div class="gender">{{item.gender}}</div>
                    <div class="type">{{item.type}}</div>
                </div>
                <div class="img_wrap"><img ng-src="{{item.img}}" class="bg"> <span ng-show="item.img" class="ok"></span></div>
                <div class="color">Цвет: <span>{{item.color.name}}</span></div>
            </div>
        </div>
        <div class="coast" ng-show="index == 3">
            <div class="top">Стоимость подписки <span class="val">{{choiceCost}}</span><span class="sub">руб.</span></div><a href="" ng-click="send()" class="button">ОФОРМИТЬ ЗАКАЗ</a>
            <div class="certificate">Оплата по сертификату</div>
        </div>
    </div>
</div>

</div>