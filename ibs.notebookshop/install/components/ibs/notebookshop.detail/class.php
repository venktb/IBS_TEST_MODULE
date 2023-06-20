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
        $this->arParams['ELEMENT_CODE'] = isset($this->arParams['ELEMENT_CODE']) ? $this->arParams['ELEMENT_CODE'] : '';
        $this->arParams['CACHE_TIME'] = isset($this->arParams['CACHE_TIME']) ? $this->arParams['CACHE_TIME'] : '36000000';
    }

   protected function prepareResult()
   {
		$request = Application::getInstance()->getContext()->getRequest();
		if($value = $request->getQuery("ELEMENT_CODE")){
			$notebook_code = $value;
		} else {
			$notebook_code = $this->arParams['ELEMENT_CODE'];
		}
		$result = NotebookTable::getList(array(
			'filter' => array('code' => $notebook_code),
			'order' => array('id'),
			'select' => array(
				'id',
				'name',
				'year',
				'price',
				'model_name' => 'model.name',
				'vendor' => 'model.manufacturer.name',
				)	
			));
			$options = [];
		while ($row = $result->fetch())
		{
			$options = NotebookTable::getList(array(
			'filter' => array('id' => $row['id']),
			'order' => array('id'),
			'select' => array(
				'option_name' => 'Ibs\Notebookshop\Refoptions:notebook.option.name'
					)	
				));
			while ($opt = $options->fetch())
			{
				$row['options'][] = $opt['option_name'];
			}
			$this->arResult['ITEMS'] = $row;
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
