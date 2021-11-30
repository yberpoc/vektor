<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arResult */

$arResultItemsCount = count($arResult["ITEMS"]);?>

<?if($arResultItemsCount > 0):?>
    <div class="order-items">
        <h2 class="order-items__title">Ваш заказ</h2>
        <ul class="order-items__list">

            <?foreach ($arResult["ITEMS"] as $arItem):?>
                <li class="order-items__item">
                    <button class="order-items__delete">
                        <svg class="order-items__delete-icon" width="17" height="21" viewBox="0 0 17 21" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="3" width="16" height="4" rx="2" stroke="#999999" />
                            <path d="M2.5 7H14.5V18.5C14.5 19.3284 13.8284 20 13 20H4C3.17157 20 2.5 19.3284 2.5 18.5V7Z"
                                  stroke="#999999" />
                            <path
                                    d="M5.5 17.2429C5.77619 17.2429 6 17.0296 6 16.7665V11.4265C6 11.1633 5.77619 10.9501 5.5 10.9501C5.22381 10.9501 5 11.1633 5 11.4265V16.7665C5 17.0296 5.22381 17.2429 5.5 17.2429Z"
                                    fill="#999999" />
                            <path
                                    d="M8.5 17.2429C8.77619 17.2429 9 17.0296 9 16.7665V11.4265C9 11.1633 8.77619 10.9501 8.5 10.9501C8.22381 10.9501 8 11.1633 8 11.4265V16.7665C8.00476 17.0296 8.22857 17.2429 8.5 17.2429Z"
                                    fill="#999999" />
                            <path
                                    d="M11.5 17.2429C11.7762 17.2429 12 17.0296 12 16.7665V11.4265C12 11.1633 11.7762 10.9501 11.5 10.9501C11.2238 10.9501 11 11.1633 11 11.4265V16.7665C11 17.0296 11.2238 17.2429 11.5 17.2429Z"
                                    fill="#999999" />
                            <path
                                    d="M11.2716 2.35195C11.3581 2.56077 11.4205 2.77819 11.458 3H8.5L5.54196 3C5.57945 2.77819 5.64187 2.56077 5.72836 2.35195C5.87913 1.98797 6.1001 1.65726 6.37868 1.37868C6.65726 1.1001 6.98797 0.879125 7.35195 0.728361C7.71593 0.577597 8.10603 0.5 8.5 0.5C8.89397 0.5 9.28407 0.577597 9.64805 0.728361C10.012 0.879125 10.3427 1.1001 10.6213 1.37868C10.8999 1.65726 11.1209 1.98797 11.2716 2.35195Z"
                                    stroke="#999999" />
                        </svg>
                        <span class="order-items__delete-text">удалить из корзины</span>
                    </button>
                    <a href="#" class="order-items__img" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"];?>);"></a>
                    <a href="#" class="order-items__name"><?=$arItem["NAME"];?></a>
                    <div class="order-items__price"><?=$arItem["PRICE"];?></a></div>
                    <div class="order-items__count">
                        <button class="order-items__minus">-</button>
                        <span class="order-items__value">1</span>
                        <button class="order-items__plus">+</button>
                    </div>
                </li>
            <?endforeach;?>
            <?
            $quantity = 0;
            $sum = 0;
            if (count($arResult["ITEMS"]>0)):
                foreach ($arResult["ITEMS"] as $arItem):
                    $quantity += intval($arItem['QUANTITY']);
                    $sum += $arItem['QUANTITY'] * $arItem['PRICE'];
                    ?>
                <?
                endforeach;
            endif;
            ?>
        </ul>
    <a href="/products/" class="order-items__button button button_transparent button_blue">Добавить еще товары в заказ</a>
    </div>


<?else:?>
    <h3 style="text-align: center">Ваша корзина пуста...</h3>
<?endif;?>
