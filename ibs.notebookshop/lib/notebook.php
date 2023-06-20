<?php
/**
* Module: IBS.NOTEBOOKSHOP
* Author: Talgat Kalaev
* File: notebook.php
* Version: 1.0.0
**/

namespace Ibs\Notebookshop;

use Bitrix\Main,
	Bitrix\Main\Entity;

class NotebookTable extends Main\Entity\DataManager
{
	public static function getTableName()
	{
		return 'ibs_notebook';
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
			)),
			new Entity\StringField('year', array(
				'required' => true,
			)),
			new Entity\StringField('price', array(
				'required' => true,
			)),
			new Entity\IntegerField('model_id', array(
				'required' => true,
			)),
			new Entity\ReferenceField(
				'model',
				'Ibs\Notebookshop\Model',
				array('=this.model_id' => 'ref.id'),
				array('join_type' => 'LEFT')
			)			
		);
	}
}
