<?
$arItem["DETAIL_PICTURE"] = CFile::GetFileArray($arItem["DETAIL_PICTURE"]);
$res = CIBlockElement::GetList( array(
    'sort' => 'asc'
),
    array(
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'ACTIVE' => 'Y',
        'SECTION_ID' => $arResult['IBLOCK_SECTION_ID'] ),
    false,
    array(
        'nElementID' => $arResult['ID'],
        'nPageSize' => 1
    )
);
$nearElementsSide = 'LEFT';
while ($arElem = $res->GetNext()) {
    if ($arElem['ID'] == $arResult['ID']) {
        $nearElementsSide = 'RIGHT'; continue;
    }
    $arResult['NEAR_ELEMENTS'][$nearElementsSide][] = $arElem;
}


echo '<pre>'; print_r($arResult['PROPERTIES']['PICTURES']['VALUE']); echo '</pre>';
// PHOTO
if($arResult['PROPERTIES']['PICTURES']['VALUE']){

    //SLIDER
    if($arResult['MORE_PHOTO']) {
        $i=0;
        foreach($arResult['MORE_PHOTO'] as $sliderPicture){
            $arResult['FULL_SLIDER'][$i] = array();
            $arResult['TEASER_SLIDER'][$i] = array();

            $fullImgSlider = CFile::ResizeImageGet($sliderPicture['ID'], array('width'=>258, 'height'=>262), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $fullImgSlider['src'] = CUtil::GetAdditionalFileURL($fullImgSlider['src'], true);

            $arResult['FULL_SLIDER'][$i] = array_change_key_case($fullImgSlider, CASE_UPPER);


            $teaserImgSlider = CFile::ResizeImageGet($sliderPicture['ID'], array('width'=>45, 'height'=>46), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $teaserImgSlider['src'] = CUtil::GetAdditionalFileURL($teaserImgSlider['src'], true);

            $arResult['TEASER_SLIDER'][$i]= array_change_key_case($teaserImgSlider, CASE_UPPER);

            $i++;
        }
    }
} else {
    $arResult['MORE_PHOTO'] = $arResult['MORE_PHOTO'][0];

    //DETAIL PICTURE
    $arResult['DETAIL_PICTURE'] = $arResult['MORE_PHOTO'];
}

if($arResult['PREVIEW_PICTURE']){
    $arResult['DETAIL_PICTURE'] = $arResult['PREVIEW_PICTURE'];
}


?>