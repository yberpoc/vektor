<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<div class="popup__content">
    <?=$arResult["FORM_HEADER"]?>
    <div class="form form_get-price form_popup">
        <fieldset class="form__body">
            <?if ($arResult["isFormNote"] != "Y"):?>
            <?if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y"):?>
                <?if ($arResult["isFormTitle"]):?>
                    <h2 class="form__title"><?=$arResult["FORM_TITLE"]?> <b class="form__title-b">Подкладные автомобильные весы</b></h2>
                <?endif;?>

                <div class="form__subtitle">
                    <p><?=$arResult["FORM_DESCRIPTION"]?></p>
                </div>
            <?endif;?>

            <div class="form__inputs">

                <? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
                    <?
                    $class = "form__input";
                    if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "textarea"){
                        $class = "form__textarea form__input";
                    } elseif ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "file") {
                        $class = "form__file-input file-input";
                    }
                    ?>
                    <div class="<?=$class?>">
                        <?=$arQuestion["HTML_CODE"]?>
                        <label for="name"><?=$arQuestion["CAPTION"]?></label>
                        <div class="form__input-status">
                            <div class="message form__input-message">Это поле обязательно для заполнения, пример заполнения: Евлампий</div>
                        </div>

                    </div>
                <?endforeach?>

                <input class="form__button button" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="Отправить">

                <? if($arResult["isUseCaptcha"] == "Y")
                {
                    ?>
                    <tr>
                        <th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
                    </tr>
                    <tr>
                        <td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
                        <td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
                    </tr>
                    <?
                } // isUseCaptcha?>

            </div>

            <?endif;?>
        </fieldset>
    </div>
    <?=$arResult["FORM_FOOTER"]?>
</div>
