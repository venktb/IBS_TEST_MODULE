<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader; 
use Ibs\Notebookshop\NotebookTable;

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
        $this->arParams['SECTION_CODE'] = isset($this->arParams['SECTION_CODE']) ? $this->arParams['SECTION_CODE'] : '';
        $this->arParams['CACHE_TIME'] = isset($this->arParams['CACHE_TIME']) ? $this->arParams['CACHE_TIME'] : '36000000';
    }

   protected function prepareResult()
   {
		$request = Application::getInstance()->getContext()->getRequest();
		if($value = $request->getQuery("SECTION_CODE")){
			$model = $value;
		} else {
			$model = $this->arParams['SECTION_CODE'];
		}
	     if(!$sort = $request->getQuery("sort")) $sort = 'id';
		 if(!$order = $request->getQuery("method")) $order = 'asc';
		$result = NotebookTable::getList(array(
			'filter' => array('model_code' => $model),
			'order' => array($sort => $order),
			'limit' => 20,
			'select' => array(
				'id',
				'name',
				'code',
				'year',
				'price',
				'model_name' => 'model.name',
				'model_code' => 'model.code',
				'vendor_name' => 'model.manufacturer.name',
				'vendor_code' => 'model.manufacturer.code',
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
