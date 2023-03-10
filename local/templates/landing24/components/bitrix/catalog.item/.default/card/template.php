<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var string $discountPositionClass
 * @var string $labelPositionClass
 * @var CatalogSectionComponent $component
 */
?>

<div class="product-item" data-id="<?=$item["ID"]?>">
	<? if ($itemHasDetailUrl): ?>
	<a class="product-item-image-wrapper" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>"
			data-entity="image-wrapper">
	<? else: ?>
	<span class="product-item-image-wrapper" data-entity="image-wrapper">
	<? endif; ?>
		<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" width="100%" class="product-item-image-original" id="<?=$itemIds['PICT']?>">	
		<?
		if ($item['LABEL'])
		{
			?>
			<div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>">
				<?
				if (!empty($item['LABEL_ARRAY_VALUE']))
				{
					foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
					{
						?>
						<div<?=(!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
							<span title="<?=$value?>"><?=$value?></span>
						</div>
						<?
					}
				}
				?>
			</div>
			<?
		}

		?>
	<? if ($itemHasDetailUrl): ?>
	</a>
	<? else: ?>
	</span>
	<? endif; ?>
	<div class="product-item-title">
		<? if ($itemHasDetailUrl): ?>
		<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>">
		<? endif; ?>
		<?=$productTitle?>
		<? if ($itemHasDetailUrl): ?>
		</a>
		<? endif; ?>
	</div>
	<?php
		$reatings = CIBlockElement::GetList(
			Array("SORT"=>"ASC"),
			Array(
				"IBLOCK_ID" => "2",
				"PROPERTY_ID_FILM" => $item["ID"],
			),
			false,
			false,
			Array(
				"PROPERTY_VALUE"
			)
		);
		$likes = 0;
		$dislikes = 0;
		while($res = $reatings->GetNextElement()){
			if ($res->fields["PROPERTY_VALUE_VALUE"] == "??????????????????????"){
				$likes++;
			} else {
				$dislikes++;
			}
		}
	?>
	<div class="ratings d-flex">
		<div class="like">
			<div class="icon">
				<img src="/local/templates/landing24/assets/img/like.png" alt="">
			</div>
			<?=$likes?>
		</div>
		<div class="dislike">
			<div class="icon">
				<img src="/local/templates/landing24/assets/img/like.png" alt="">
			</div>
			<?=$dislikes?>
		</div>
	</div>
</div>