<?php
use \Bitrix\Landing\Manager;
use \Bitrix\Landing\Assets;
use \Bitrix\Main\Loader;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

if (!Loader::includeModule('landing'))
{
	return;
}

$assets = Assets\Manager::getInstance();
$assets->addAsset('landing_auto_font_scale');

$APPLICATION->AddHeadScript('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js');
$APPLICATION->AddHeadScript('/local/templates/landing24/assets/vendor/jquery/jquery-3.2.1.min.js');
$APPLICATION->AddHeadScript('/local/templates/landing24/assets/js/custom.js');
$APPLICATION->AddHeadScript('/local/templates/landing24/assets/js/addRating.ajax.js');

$APPLICATION->ShowProperty('FooterJS');
?>

<?if (\Bitrix\Landing\Connector\Mobile::isMobileHit()):?>
<script type="text/javascript">
	if (typeof BXMPage !== 'undefined')
	{
		BXMPage.TopBar.title.setText('<?= $APPLICATION->getTitle();?>');
		BXMPage.TopBar.title.show();
	}
</script>
<?endif;?>

</body>
</html>