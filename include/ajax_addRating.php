<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");


    define('IP_USER', $_SERVER['REMOTE_ADDR']);

    if ($_POST["rating"] == 'like'){
        $rating = '5';
    } else {
        $rating = '6';
    }

    $PROPS = array();
    $PROPS['VALUE'] = $rating;
    $PROPS["IP_USER"] = IP_USER;    
    $PROPS["ID_FILM"] = $_POST["film_id"];  

    $reatings = CIBlockElement::GetList(
        Array("SORT"=>"ASC"),
        Array(
            "IBLOCK_ID" => "2",
            "PROPERTY_ID_FILM" => $_POST["film_id"],
            "PROPERTY_IP_USER" => IP_USER
        ),
        false,
        false,
        Array()
    );
    $res = $reatings->GetNextElement();

    // Если человек с текущим IP не оценивал данный фильм
    if ($res == false){

        $el = new CIBlockElement;
        $arrRating = array(
            "IBLOCK_ID" => "2",
            "NAME" => "Оценка - ".$_POST["film_name"],
            "PROPERTY_VALUES" => $PROPS,
        );
        if ($addRating = $el->Add($arrRating)){
            $message = '{ 
                "status": "OK",
                "message": "Отзыв успешно добавлен" 
            }';
        } else {
            $message = '{ 
                "status": "ERROR",
                "message": "Отзыв добавить не получилось"
            }';
        }

    } else{
        $message = '{ 
            "status": "ERROR",
            "message": "Вы уже оставляли оценку данному фильму"
        }';
    }

    echo $message;
?>