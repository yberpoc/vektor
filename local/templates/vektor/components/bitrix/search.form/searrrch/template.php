<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>


<form action="<?=$arResult["FORM_ACTION"]?>" class="header-search__form">
    <input type="text" name="q" class="header-search__input input" placeholder="Начните вводить слово"/>
    <button name="s" class="header-search__submit" type="submit">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                    d="M17 16.9999L13.1333 13.1332M15.2222 8.1111C15.2222 12.0385 12.0385 15.2222 8.1111 15.2222C4.18375 15.2222 1 12.0385 1 8.1111C1 4.18375 4.18375 1 8.1111 1C12.0385 1 15.2222 4.18375 15.2222 8.1111Z"
                    stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</form>


