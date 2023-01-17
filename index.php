<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("1С-Битрикс: Управление сайтом");
?>
    <div class="container mt-5">
        <h2>Фильмы</h2>

        
            <!-- smart filter  -->
            
            <?
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.smart.filter",
                    "",
                    Array(
                        "IBLOCK_ID" => "1",
                        "FILTER_NAME" => "arrFilter"
                    )
                );
            ?>
        

        <?php

            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section",
                "",
                Array(
                    "IBLOCK_ID" => "1",
                    "PAGE_ELEMENT_COUNT" => "5",
                    "LAZY_LOAD" => "Y",
                    "FILTER_NAME" => "arrFilter"
                )
            );
        ?>
       
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>