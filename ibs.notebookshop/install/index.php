<?
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;
use Bitrix\Main\Loader; 

	Class ibs_notebookshop extends CModule
	{
	    public $MODULE_ID = "ibs.notebookshop";
	    public $MODULE_NAME;
        public $MODULE_VERSION;
        public $MODULE_VERSION_DATE;
        public $MODULE_DESCRIPTION;
        public $PARTNER_NAME;

        public function __construct()
        {
            $arModuleVersion = array();

            $path = str_replace('\\', '/', __FILE__);
            $path = substr($path, 0, strlen($path) - strlen("/index.php"));
            include($path."/version.php");

            if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
            {
                $this->MODULE_VERSION = $arModuleVersion["VERSION"];
                $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
            }

            $this->MODULE_NAME = 'Магазин ноутбуков';
            $this->MODULE_DESCRIPTION = 'Магазин ноутбуков. Каталог товаров';
            $this->PARTNER_NAME = 'IBS';
        }

	    function DoInstall()
	    {
			$this->installFiles();
            RegisterModule($this->MODULE_ID);

			Loader::includeModule("ibs.notebookshop");
			

			if(!Application::getConnection()->isTableExists(
				Base::getInstance('Ibs\Notebookshop\ManufacturerTable')->getDBTableName()))
			{
				Base::getInstance('Ibs\Notebookshop\ManufacturerTable')->createDbTable();
			}
			if(!Application::getConnection()->isTableExists(
				Base::getInstance('\Ibs\Notebookshop\ModelTable')->getDBTableName()
			  )
			)
			{
				Base::getInstance('\Ibs\Notebookshop\ModelTable')->createDbTable();
			}
			if(!Application::getConnection()->isTableExists(
				Base::getInstance('Ibs\Notebookshop\NotebookTable')->getDBTableName()
			  )
			)
			{
				Base::getInstance('Ibs\Notebookshop\NotebookTable')->createDbTable();
			}
			if(!Application::getConnection()->isTableExists(
				Base::getInstance('Ibs\Notebookshop\OptionTable')->getDBTableName()
			  )
			)
			{
				Base::getInstance('Ibs\Notebookshop\OptionTable')->createDbTable();
			}
			if(!Application::getConnection()->isTableExists(
				Base::getInstance('Ibs\Notebookshop\RefoptionsTable')->getDBTableName()
			  )
			)
			{
				Base::getInstance('Ibs\Notebookshop\RefoptionsTable')->createDbTable();
			}
			$this->FillTables();	
	    }

	    function DoUninstall()
	    {
			Loader::includeModule("ibs.notebookshop");
			Application::getConnection()->
			queryExecute('drop table if exists '.Base::GetInstance('Ibs\Notebookshop\ManufacturerTable')->getDBTableName());
			Application::getConnection()->
			queryExecute('drop table if exists '.Base::GetInstance('Ibs\Notebookshop\ModelTable')->getDBTableName());
			Application::getConnection()->
			queryExecute('drop table if exists '.Base::GetInstance('Ibs\Notebookshop\NotebookTable')->getDBTableName());
			Application::getConnection()->
			queryExecute('drop table if exists '.Base::GetInstance('Ibs\Notebookshop\OptionTable')->getDBTableName());
			Application::getConnection()->
			queryExecute('drop table if exists '.Base::GetInstance('Ibs\Notebookshop\RefoptionsTable')->getDBTableName());
            UnRegisterModule($this->MODULE_ID);
	    }
		
		function InstallFiles()
		{
			// копируем файлы, которые устанавливаем вместе с модулем, копируем в
			// пространство имен для компонентов в папке "/local" которое будет иметь имя
			// модуля "ibs.notebookshop"
			CopyDirFiles(
				__DIR__.'/components',
				Application::getDocumentRoot().'/local/components/',
				true,
				true
			);
			return true;
		}
		
		function FillTables()
		{
			include_once('fill_tables.php');
			return true;
		}
	}
