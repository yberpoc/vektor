<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if($arResult["OK_MESSAGE"] <> '')
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form class="form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
    <fieldset class="form__body">
        <h2 class="form__title">Есть вопросы? Мы вам перезвоним!</h2>
        <div class="form__subtitle">
            <p>ЕСТЬ ВОПРОСЫ? мы можем перезвонить или написать вам. Мы разрабатываем оборудование с
                отличными от стандартного модельного ряда техническими характеристиками и функциональными
                возможностями.</p>
        </div>
        <div class="form__inputs">
            <div class="form__input form__input_required">
                <input class="form__field" type="text" name="name" autocomplete="on" required="">
                <label for="name">
                    <?=GetMessage("MFT_NAME")?>
                </label>
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>
                    <div class="message form__input-message">Это поле обязательно для заполнения, пример заполнения: Маруся</div>
                <?endif?>
		    </div>

            <div class="form__input form__input_required">
                <label for="phone"><?=GetMessage("MFT_PHONE")?></label>
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?>
                    <div class="message form__input-message">Это поле обязательно для заполнения, пример заполнения: +7 (922) 232-31-43</div>
                <?endif?>

                <input class="form__field" type="text" name="user_phone" autocomplete="on" required="" value="<?=$arResult["AUTHOR_PHONE"]?>">
            </div>


            <div class="form__input">
                <label for="email"><?=GetMessage("MFT_EMAIL")?></label>
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>
                    <div class="message form__input-message">Это поле обязательно для заполнения, пример заполнения: ivan_ivanov@ex.ru</div>
                <?endif?>
                <input class="form__field" type="text" name="user_email" autocomplete="on" required="" value="<?=$arResult["AUTHOR_EMAIL"]?>">
            </div>



	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>
    <div class="form__input">
        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        <button type="submit" name="submit" class="button form__button"><?=GetMessage("MFT_SUBMIT")?></button>
    </div>
        </div>
    </fieldset>
</form>
