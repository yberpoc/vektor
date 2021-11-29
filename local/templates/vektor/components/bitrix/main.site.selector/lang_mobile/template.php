<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach ($arResult["SITES"] as $key => $arSite):?>
	<?if ($arSite["CURRENT"] == "Y"):?>
		<span class="header-mobile__lang" title="<?=$arSite["NAME"]?>"><?=$arSite["LANG"]?></span>&nbsp;
	<?else:?>
		<a class="header-mobile__lang" href="<?if(is_array($arSite['DOMAINS']) && $arSite['DOMAINS'][0] <> '' || $arSite['DOMAINS'] <> ''):?>http://<?endif?><?=(is_array($arSite["DOMAINS"]) ? $arSite["DOMAINS"][0] : $arSite["DOMAINS"])?><?=$arSite["DIR"]?>" title="<?=$arSite["NAME"]?>"><?=$arSite["LANG"]?></a>&nbsp;
	<?endif?>

<?endforeach;?>
