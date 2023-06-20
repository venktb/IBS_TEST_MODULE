<?php
/**
* Module: IBS.NOTEBOOKSHOP
* Author: Talgat Kalaev
* File: manufacturer.php
* Version: 1.0.0
**/

namespace Ibs\Notebookshop;

use Bitrix\Main,
	Bitrix\Main\Entity;
	//Bitrix\Main\Localization\Loc;
//Loc::loadMessages(__FILE__);


class ManufacturerTable extends Main\Entity\DataManager
{
	public static function getTableName()
	{
		return 'ibs_manufacturer';
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('id', array(
				'primary' => true,
				'autocomplete' => true
			)),
			new Entity\StringField('name', array(
				'required' => true,
			)),
			new Entity\StringField('code', array(
				'required' => true,
			))
			
		);
	}
}
