<?php
use Bitrix\Main\Loader; 
use Ibs\Notebookshop\NotebookTable;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

			Loader::includeModule("ibs.notebookshop");
			
			$FillArray = array(
				 array(
					'name' => 'Asus',
					'code' => 'asus'					
				),
				 array(
					'name' => 'Lenovo',
					'code' => 'lenovo'					
				),
				 array(
					'name' => 'Hewlett-Packard',
					'code' => 'hewlett_packard'					
				),
			);
				$FillArray2 = array(
				 array(
					'name' => 'Gear',
					'code' => 'gear',
					'vendor_id' => 1					
				),
				 array(
					'name' => 'Gear Gold',
					'code' => 'gear_gold',
					'vendor_id' => 1
				),
				 array(
					'name' => 'Gear Silver',
					'code' => 'gear_silver',
					'vendor_id' => 1
				),
				 array(
					'name' => 'Model 100',
					'code' => 'model_100',
					'vendor_id' => 2
				),
				 array(
					'name' => 'Model 300',
					'code' => 'model_300',
					'vendor_id' => 2
				),
				 array(
					'name' => 'Model 500',
					'code' => 'model_500',
					'vendor_id' => 2
				),				
				 array(
					'name' => 'Prolite',
					'code' => 'prolite',
					'vendor_id' => 3
				),				
				 array(
					'name' => 'Chrome',
					'code' => 'chrome',
					'vendor_id' => 3
				),				
				 array(
					'name' => 'Germes',
					'code' => 'germes',
					'vendor_id' => 3
				),
			);
				$FillArray3 = array(				
				 array(
				'name' => 'Asus Gear mx70',
				'code' => 'asus_gear_mx70',
				'year' => '2020',
				'price' => 30000,
				'model_id' => 1
				),				
				 array(
				'name' => 'Asus Gear Gold mx20',
				'code' => 'asus_gear_gold_mx20',
				'year' => '2021',
				'price' => 32000,
				'model_id' => 2
				),				
				 array(
				'name' => 'Asus Gear Silver sx30',
				'code' => 'asus_gear_silver_sx30',
				'year' => '2021',
				'price' => 30000,
				'model_id' => 3
				),				
				 array(
				'name' => 'Lenovo Model 100 dbv',
				'code' => 'lenovo_model_100_dbv',
				'year' => '2021',
				'price' => 27000,
				'model_id' => 4
				),				
				 array(
				'name' => 'Lenovo Model 300 dbv',
				'code' => 'lenovo_model_300_dbv',
				'year' => '2021',
				'price' => 29000,
				'model_id' => 5
				),				
				 array(
				'name' => 'Lenovo Model 500 dbv',
				'code' => 'lenovo_model_500_dbv',
				'year' => '2021',
				'price' => 32000,
				'model_id' => 6
				),				
				 array(
				'name' => 'Hewlett-Packard Prolite rx',
				'code' => 'hewlett_packard_prolite_rx',
				'year' => '2021',
				'price' => 30000,
				'model_id' => 7
				),				
				 array(
				'name' => 'Hewlett-Packard Prolite sx',
				'code' => 'hewlett_packard_prolite_sx',
				'year' => '2021',
				'price' => 31000,
				'model_id' => 7
				),				
				 array(
				'name' => 'Hewlett-Packard Chrome mx10',
				'code' => 'hewlett_packard_chrome_mx10',
				'year' => '2020',
				'price' => 26000,
				'model_id' => 8
				),				
				 array(
				'name' => 'Hewlett-Packard Germes mxi20',
				'code' => 'hewlett_packard_germes_mxi20',
				'year' => '2021',
				'price' => 37000,
				'model_id' => 9
				),
			);
				$FillArray4 = array(				
				 array(
				'name' => 'RAM DIMM 8 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'RAM DIMM 16 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'RAM DIMM 32 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'RAM DIMM 64 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'RAM DIMM 128 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'SSD 256 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'SSD 400 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'SSD 512 Gb',
				'notebook_id' => 1
				),				
				 array(
				'name' => 'SSD 1000 Gb',
				'notebook_id' => 1
				)
			);

			$FillArray5 = array(	
				 array(
				'notebook_id' => 1,
				'option_id' => 1
				),				
				 array(
				'notebook_id' => 2,
				'option_id' => 2
				),				
				 array(
				'notebook_id' => 3,
				'option_id' => 3
				),				
				 array(
				'notebook_id' => 4,
				'option_id' => 1
				),				
				 array(
				'notebook_id' => 5,
				'option_id' => 2
				),				
				 array(
				'notebook_id' => 6,
				'option_id' => 3
				),				
				 array(
				'notebook_id' => 7,
				'option_id' => 4
				),				
				 array(
				'notebook_id' => 8,
				'option_id' => 5
				),				
				 array(
				'notebook_id' => 9,
				'option_id' => 6
				),				
				 array(
				'notebook_id' => 1,
				'option_id' => 5
				),				
				 array(
				'notebook_id' => 2,
				'option_id' => 6
				),				
				 array(
				'notebook_id' => 3,
				'option_id' => 7
				)				
			);
			foreach($FillArray as $fillItem){
			\Ibs\Notebookshop\ManufacturerTable::Add($fillItem);
			}	
			foreach($FillArray2 as $fillItem){
			\Ibs\Notebookshop\ModelTable::Add($fillItem);	
			}	
			foreach($FillArray3 as $fillItem){
			\Ibs\Notebookshop\NotebookTable::Add($fillItem);	
			}	
			foreach($FillArray4 as $fillItem){
			\Ibs\Notebookshop\OptionTable::Add($fillItem);	
			}	
			foreach($FillArray5 as $fillItem){
			\Ibs\Notebookshop\RefoptionsTable::Add($fillItem);	
			}	
				
			/*		if($fillKey == 'Manufacturer'){
					\Ibs\Notebookshop\ManufacturerTable::Add($fillItem);
					} elseif ($fillKey == 'Model'){
					\Ibs\Notebookshop\ModelTable::Add($fillItem);
					} elseif ($fillKey == 'Notebook'){
					\Ibs\Notebookshop\NotebookTable::Add($fillItem);
					} elseif ($fillKey == 'Option'){
					\Ibs\Notebookshop\OptionTable::Add($fillItem);
					} elseif ($fillKey == 'Refoptions'){
					\Ibs\Notebookshop\RefoptionsTable::Add($fillItem);
					}
			}*/