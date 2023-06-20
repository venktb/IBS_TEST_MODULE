<?php
/**
* Module: IBS.NOTEBOOKSHOP
* Author: Talgat Kalaev
* File: refoptions.php
* Version: 1.0.0
**/

namespace Ibs\Notebookshop;
use Bitrix\Main\Entity;
class RefoptionsTable extends Entity\DataManager
{
	public static function getTableName()
	{
		return 'ibs_notebook_to_option';
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('id', array(
				'primary' => true,
				'autocomplete' => true
			)),
			new Entity\IntegerField('notebook_id', array(
				'required' => true
			)),
			new Entity\ReferenceField(
				'notebook',
				'Ibs\Notebookshop\NotebookTable',
				array('=this.notebook_id' => 'ref.id')
			),
			new Entity\IntegerField('option_id', array(
				'required' => true
			)),
			new Entity\ReferenceField(
				'option',
				'Ibs\Notebookshop\Option',
				array('=this.option_id' => 'ref.id')
			)
		);
	}
}