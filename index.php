<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("1С-Битрикс: Управление сайтом");
?>
    <div class="container mt-5">
        <h2>Фильмы</h2>

        <ul class="ganres d-flex">
            <!-- smart filter  -->
            <li class="active"><a href="">Боевик</a></li>
            <li><a href="">Комедия</a></li>
            <li><a href="">Триллер</a></li>
            <li><a href="">Ужасы</a></li>
        </ul>

        <?php
            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section",
                "",
                Array(
                    "IBLOCK_ID" => "1",
                )
            );

        ?>
       
    </div>
    
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>