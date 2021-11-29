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
?>