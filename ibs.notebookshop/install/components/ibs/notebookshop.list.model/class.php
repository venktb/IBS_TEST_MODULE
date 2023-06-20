<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader; 
use Ibs\Notebookshop\ModelTable;

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
			$vendor = $value;
		} else {
			$vendor = $this->arParams['SECTION_CODE'];
		}
		$result = ModelTable::getList(array(
			'filter' => array('vendor_code' => $vendor),
			'order' => array('id'),
			'select' => array(
				'id',
				'name',
				'code',
				'vendor_name' => 'manufacturer.name',
				'vendor_code' => 'manufacturer.code',
				)	
			));
			$options = [];
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
