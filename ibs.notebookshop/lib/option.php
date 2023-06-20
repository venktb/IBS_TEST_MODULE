<?php
/**
* Module: IBS.NOTEBOOKSHOP
* Author: Talgat Kalaev
* File: option.php
* Version: 1.0.0
**/

namespace Ibs\Notebookshop;

use Bitrix\Main,
	Bitrix\Main\Entity,
	Bitrix\Main\Localization\Loc;
	Loc::loadMessages(__FILE__);


class OptionTable extends Main\Entity\DataManager
{
	public static function getTableName()
	{
		return 'ibs_option';
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID', array(
				'primary' => true,
				'autocomplete' => true
			)),
			new Entity\StringField('NAME', array(
				'required' => true,
			))
		);
	}
}
