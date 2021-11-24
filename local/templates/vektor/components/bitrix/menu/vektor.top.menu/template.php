<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="header-menu">
    <ul class="header-menu__list" id="vita-top-menu">

    <?
    $previousLevel = 0;

    foreach($arResult as $arItem):?>
    	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
    		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
    	<?endif?>

    	<?if ($arItem["IS_PARENT"]):?>

    		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
                <li class="header-menu__item header-menu__item_big"><a href="<?=$arItem["LINK"]?>" class="header-menu__link"><?=$arItem["TEXT"]?></a>
                    <ul class="header-menu__sublist">
    		<?elseif ($arItem["DEPTH_LEVEL"] == 2):?>
    			<li class="header-menu__subitem">
                    <a href="<?=$arItem["LINK"]?>" class="header-menu__sublink">
                        <img src="<?=CFile::GetPath($arItem["PARAMS"]["IMAGE_SVG"])?>" alt="svg" class="header-menu__logo"><?=$arItem["TEXT"]?>
                    </a>
                    <div class="header-menu__catalog">
                        <ul class="header-menu__catalog-list">
            <?elseif ($arItem["DEPTH_LEVEL"] == 3):?>
                            <li class="header-menu__catalog-item"><a href="<?=$arItem["LINK"]?>" class="header-menu__catalog-link"><?=$arItem["TEXT"]?></a>
    		<?endif?>

    	<?else:?>

    		<?if ($arItem["PERMISSION"] > "D"):?>

    			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
    				<li class="header-menu__item"><a href="<?=$arItem["LINK"]?>" class="header-menu__link"><?=$arItem["TEXT"]?></a></li>
    			<?else:?>
                    <li class="header-menu__catalog-item"><a  href="<?=$arItem["LINK"]?>" class="header-menu__catalog-link"><?=$arItem["TEXT"]?></a></li>
    			<?endif?>

    		<?else:?>

    			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
    				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
    			<?else:?>
    				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
    			<?endif?>

    		<?endif?>
    	<?endif?>

    	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

    <?endforeach?>

    <?if ($previousLevel > 1)://close last item tags?>
    	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
    <?endif?>

    </ul>
</nav>
<?endif?>
