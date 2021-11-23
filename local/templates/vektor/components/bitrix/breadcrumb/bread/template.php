<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<div class="breadcrumbs"><ul class="breadcrumbs__items container">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);


	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1 && $index == 0)
	{
		$strReturn .= '
			<li class="breadcrumbs__item" id="bx_breadcrumb_'.$index.'">
				<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__link">
					<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.44303 0.105324C7.62358 -0.035108 7.87642 -0.035108 8.05697 0.105324L14.807 5.35532C14.9288 5.45005 15 5.5957 15 5.75V14C15 14.5304 14.7893 15.0391 14.4142 15.4142C14.0391 15.7893 13.5304 16 13 16H10C9.72386 16 9.5 15.7761 9.5 15.5V8.5H6V15.5C6 15.7761 5.77614 16 5.5 16H2.5C1.96957 16 1.46086 15.7893 1.08579 15.4142C0.710714 15.0391 0.5 14.5304 0.5 14V5.75C0.5 5.5957 0.571236 5.45005 0.69303 5.35532L7.44303 0.105324ZM1.5 5.99454V14C1.5 14.2652 1.60536 14.5196 1.79289 14.7071C1.98043 14.8946 2.23478 15 2.5 15H5V8C5 7.72386 5.22386 7.5 5.5 7.5H10C10.2761 7.5 10.5 7.72386 10.5 8V15H13C13.2652 15 13.5196 14.8946 13.7071 14.7071C13.8946 14.5196 14 14.2652 14 14V5.99454L7.75 1.13343L1.5 5.99454Z"
                            fill="#025BFF" />
                  </svg>
				</a>
			</li>';
	}
	else
	{
		$strReturn .= '
			<li class="breadcrumbs__item" id="bx_breadcrumb_'.$index.'">
				<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__link">
					'.$title.'
				</a>
			</li>';
	}
}

$strReturn .= '</ul></div>';

return $strReturn;