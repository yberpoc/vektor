<?php
	foreach ($arResult['ITEMS'] as $item) {
		if(isset($item['PREVIEW_PICTURE']['ID'])) {
			$arImg = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], array('width'=>470, 'height'=>432), BX_RESIZE_IMAGE_EXACT, true);
			$item['PREVIEW_PICTURE']['SRC'] = $arImg['src'];
		}
	}