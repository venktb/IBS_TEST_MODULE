<?php
 
use Bitrix\Main\Loader;
 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arCurrentValues */
Loader::includeModule('iblock');
 
$arComponentParameters = [
    "PARAMETERS" => [
        "VARIABLE_ALIASES" => [//псевдоимена
            "NOTEBOOK" => [
                "NAME" => 'Символьный код элемента',
            ],
            "BRAND" => [
                "NAME" => 'Символьный код раздела',
            ],
            "MODEL" => [
                "NAME" => 'Символьный код раздела',
            ],
        ],
        "SEF_MODE" => [//Вкл/выкл режим ЧПУ. Каждый дочерний элемент - это шаблон, на котором подключаются простые компоненты.
            "section_vendor" => [
                "NAME" => 'Страница списка производителей',
                "DEFAULT" => "/test3/",
                "VARIABLES" => [
				],
            ],
            "section_model" => [
                "NAME" => 'Страница раздела моделей ноутбуков определенного производителя',
                "DEFAULT" => "#BRAND#/",
                "VARIABLES" => [
                    "smodel",
                    "BRAND"
				],
            ],
            "section_notebook" => [
                "NAME" => 'Страница раздела ноутбуков из определенной модели',
                "DEFAULT" => "#BRAND#/#MODEL#/",
                "VARIABLES" => [
                    "snotebook",
                    "BRAND",
					"MODEL"
                ],
            ],
            "element" => [
                "NAME" => 'Детальная страница',
                "DEFAULT" => "#detail#/#NOTEBOOK#/",
                "VARIABLES" => [
                    "elid",
                    "NOTEBOOK"
                ]
            ]
        ]
    ]
];
//Настройки для 404.
CIBlockParameters::Add404Settings($arComponentParameters, []);