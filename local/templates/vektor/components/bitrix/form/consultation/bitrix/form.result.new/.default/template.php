<!-- FORM -->
<div class="container">
    <?if($arResult['isFormNote'] != 'Y'):?>
        <form name="<?=$arResult["arForm"]["SID"]?>" method="post" class="form form_get-price" novalidate action="">

            <input type="hidden" name="sessid" id="sessid" value="<?=bitrix_sessid();?>">
            <input type="hidden" name="WEB_FORM_ID" value="<?=$arParams["WEB_FORM_ID"];?>">

            <fieldset class="form__body">
                <?if($arResult['arForm']['NAME']):?>
                    <h2 class="form__title"><?=$arResult['arForm']['NAME'];?></h2>
                <?endif;?>
                <?if($arResult['arForm']['DESCRIPTION']):?>
                    <div class="form__subtitle">
                        <?=$arResult['arForm']['DESCRIPTION'];?>
                    </div>
                <?endif;?>

                <?if($arResult['isFormErrors'] == 'Y'):?>
                    <p class="form-error">Пожалуйста, заполните все обязательные поля!</p>
                <?endif;?>

                <div class="form__inputs">
                    <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
                        <?
                        $tagName = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];
                        ?>

                        <?if($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == 'textarea'):?>
                            <div class="form__textarea form__input">
                                <textarea name="<?=$tagName?>"></textarea>
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
                        <?elseif($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == 'file'):?>
                            <div class="form__file-input file-input form__input">
                                <input type="<?=$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]?>"
                                       class="filepond"
                                       name="<?=$tagName?>"
                                       multiple
                                       data-allow-reorder="true"
                                >
                            </div>
                        <?else:?>
                            <div class="form__input">
                                <input class="form__field" type="<?=$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]?>" name="<?=$tagName?>" autocomplete="on" >
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
                    <?endforeach;?>
                </div>


                <button class="button form__button" type="submit">
                    <input type="hidden" name="web_form_apply" value="Y" />
                    <?=$arResult['arForm']['BUTTON']?>
                </button>

                <span class="form__required">* обязательное поле</span>
                <div class="form__link">
                    <span>Нажимая на кнопку «Отправить», я даю согласие </span>
                    <a href="#">на обработку персональных данных</a>
                </div>
            </fieldset>
        </form>
    <?elseif($arResult['isFormNote'] == 'Y'):?>
        <h2 class="form__title">Форма успешно отправлена!</h2>
    <?endif;?>
</div>
<!-- END FORM -->