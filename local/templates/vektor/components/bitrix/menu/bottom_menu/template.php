<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="footer-menu">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="footer-menu__item">
            <a href="<?=$arItem["LINK"]?>" class="footer-menu__link">
                <?=$arItem["TEXT"]?>
            </a>
        </li>
	<?else:?>
		<li class="footer-menu__item">
            <a class="footer-menu__link" href="<?=$arItem["LINK"]?>">
                <?=$arItem["TEXT"]?>
            </a>
        </li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>