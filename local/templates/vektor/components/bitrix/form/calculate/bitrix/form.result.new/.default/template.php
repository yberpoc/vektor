<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>


<?if ($arResult["FORM_NOTE"]) {?>
    <div class="form__body">
        <h2 class="form__title"><?=$arResult["FORM_TITLE"]?></h2>
        <p style="color: green;"><?=$arResult["FORM_NOTE"]?></p>
        <div class="form__subtitle">
            <p><?=$arResult["FORM_DESCRIPTION"]?></p>
        </div>
    </div>

<? } ?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>


<?
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
?>
<?
/***********************************************************************************
form header
 ***********************************************************************************/
if ($arResult["isFormTitle"])
{
?>
<form class="form" novalidate="">
        <h2 class="order-form__title"><?=$arResult["FORM_TITLE"]?></h2>
        <?
        } //endif ;
        } //endif
        ?>
        <div class="form__subtitle">
            <p><?=$arResult["FORM_DESCRIPTION"]?></p>
        </div>
        <?
        } // endif
        ?>
        <?
        /***********************************************************************************
        form questions
         ***********************************************************************************/
        ?>

        <div class="form__inputs">
            <?
            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
            {
                ?>
                <?
                $tagName = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];
                ?>

                <?if($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == 'text'):?>

                <div class="form__input">
                    <input type="<?=$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]?>" name="<?=$tagName?>" autocomplete="on" class="form__field">
                    <label for="<?=$tagName?>"><?=$arQuestion["CAPTION"]?></label>
                    <?if($arQuestion['REQUIRED'] == 'Y'):?>
                        <div class="form__input-status"><?=$arResult['REQUIRED_STAR']?></div>
                    <?endif;?>
                    <?if($arResult['isFormErrors'] == 'Y' && $arResult['FORM_ERRORS'][$FIELD_SID]):?>
                        <div class="message form__input-message">
                            <?=$arResult["arQuestions"][$FIELD_SID]["COMMENTS"]?>
                        </div>
                    <?endif;?>

                </div>
                <?elseif($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == 'email'):?>

                    <div class="form__input order-form__input">
                        <input type="<?=$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]?>" name="<?=$tagName?>" autocomplete="on" class="input">
                        <label for="<?=$tagName?>"><?=$arQuestion["CAPTION"]?></label>
                        <?if($arQuestion['REQUIRED'] == 'Y'):?>
                            <div class="form__input-status"><?=$arResult['REQUIRED_STAR']?></div>
                        <?endif;?>
                        <?if($arResult['isFormErrors'] == 'Y' && $arResult['FORM_ERRORS'][$FIELD_SID]):?>
                            <div class="message form__input-message">
                                <?=$arResult["arQuestions"][$FIELD_SID]["COMMENTS"]?>
                            </div>
                        <?endif;?>

                    </div>
                <?elseif($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == 'textarea'):?>

                    <div class="form__textarea order-form__textarea form__input">
                        <textarea type="<?=$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]?>" name="<?=$tagName?>" autocomplete="on" class="order-form__textarea"></textarea>
                        <label for="<?=$tagName?>"><?=$arQuestion["CAPTION"]?></label>
                        <?if($arQuestion['REQUIRED'] == 'Y'):?>
                            <div class="form__input-status"><?=$arResult['REQUIRED_STAR']?></div>
                        <?endif;?>
                        <?if($arResult['isFormErrors'] == 'Y' && $arResult['FORM_ERRORS'][$FIELD_SID]):?>
                            <div class="message form__input-message">
                                <?=$arResult["arQuestions"][$FIELD_SID]["COMMENTS"]?>
                            </div>
                        <?endif;?>

                    </div>
            <?endif;?>
                <?
            }
            ?>
                <button class="button order-form__submit" type="submit">
                    <input type="hidden" name="web_form_apply" value="Y" />
                    <?=$arResult['arForm']['BUTTON']?>
                </button>

        </div>
</form>
