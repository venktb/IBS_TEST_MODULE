<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader; 
use Ibs\Notebookshop\ManufacturerTable;

Loader::includeModule("ibs.notebookshop");

Loc::loadMessages(__FILE__);

/**
 * Class NotebookShopComponent
 */
class NotebookShopComponent extends CBitrixComponent
{
	/** @var ErrorCollection $errors */
	protected $errors;

    protected function checkRequiredParams()
    {
        return true;
    }

    protected function initParams()
    {
        $this->arParams['IBLOCK_ID'] = isset($this->arParams['IBLOCK_ID']) ? $this->arParams['IBLOCK_ID'] : 17;
        $this->arParams['PARAMETER2'] = isset($this->arParams['PARAMETER2']) ? $this->arParams['PARAMETER2'] : '';
        $this->arParams['PARAMETER3'] = isset($this->arParams['PARAMETER3']) ? $this->arParams['PARAMETER3'] : '';
    }

   protected function prepareResult()
   {
		$result = ManufacturerTable::getList(array(
			'order' => array('id'),
			'select' => array(
				'id',
				'name',
				'code'
				)	
			));
		while ($row = $result->fetch())
		{
			$this->arResult['ITEMS'][] = $row;
		}

   }


   protected function printErrors()
   {
       foreach ($this->errors as $error)
       {
           ShowError($error);
       }
   }

	public function executeComponent()
	{
		$this->errors = new \Bitrix\Main\ErrorCollection();
		$this->initParams();

		if (!$this->prepareResult())
		{
			$this->printErrors();
		}

		$this->includeComponentTemplate();
	}
}
