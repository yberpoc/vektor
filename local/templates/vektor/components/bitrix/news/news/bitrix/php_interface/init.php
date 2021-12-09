<?
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyResizeClass", "OnAfterIBlockElement"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("ResizeMFClass", "OnAfterIBlockElement"));
class ResizeMFClass
{
    function OnAfterIBlockElement(&$arFields)
    {
        global $APPLICATION, $USER;
        $PROPERTY_CODE = "<strong>MORE_PHOTO</strong>";
        $imageMaxWidth = 1024;
        $imageMaxHeight = 768;
        $dbRes = CIBlockElement::GetProperty($arFields["IBLOCK_ID"], $arFields["ID"], "sort", "asc", array("CODE" => $PROPERTY_CODE));
        while ($arMorePhoto = $dbRes->GetNext(true, false))
        {
            if ($arMorePhoto["PROPERTY_TYPE"] == "F"
                && $arMorePhoto["MULTIPLE"] == "Y"
            )
            {
                $arFile = CFile::GetFileArray($arMorePhoto["VALUE"]);
                if (!CFile::IsImage($arFile["FILE_NAME"]))
                    continue;
                if ($arFile["WIDTH"] > $imageMaxWidth || $arFile["HEIGHT"] > $imageMaxHeight)
                {

                    $tmpFilePath = $_SERVER['DOCUMENT_ROOT']."/upload/tmp/".$arFile["FILE_NAME"];
                    $resizeRez = CFile::ResizeImageFile(
                        $source = $_SERVER['DOCUMENT_ROOT'].$arFile["SRC"],
                        $dest = $tmpFilePath,
                        array(
                            'width' => $imageMaxWidth,
                            'height' => $imageMaxHeight
                        ),
                        $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL,
                        $waterMark = array(),
                        $jpgQuality = 95
                    );
                    if ($resizeRez)
                    {
                        $arNewFile = CFile::MakeFileArray($tmpFilePath);

                        CIBlockElement::SetPropertyValueCode($arFields["ID"], $PROPERTY_CODE,
                            array($arMorePhoto["PROPERTY_VALUE_ID"] => array(
                                "VALUE" => $arNewFile,
                                "DESCRIPTION"=> $arMorePhoto["DESCRIPTION"]
                            ))
                        );
                        unlink($tmpFilePath);
                    }
                }
            }
        }
    }
}
