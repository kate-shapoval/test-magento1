<?php

class Snenko_Translate_Block_Adminhtml_Panel_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("panelGrid");
				$this->setDefaultSort("key_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("translate/panel")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("key_id", array(
				"header" => Mage::helper("translate")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "key_id",
				));
                
				$this->addColumn("string", array(
				"header" => Mage::helper("translate")->__("Text"),
				"index" => "string",
				));
				$this->addColumn("translate", array(
				"header" => Mage::helper("translate")->__("Translate of text"),
				"index" => "translate",
				));
						$this->addColumn('locale', array(
						'header' => Mage::helper('translate')->__('Locale'),
						'index' => 'locale',
						'type' => 'options',
						'options'=>Snenko_Translate_Block_Adminhtml_Panel_Grid::getOptionArray3(),
						));
						
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('key_id');
			$this->getMassactionBlock()->setFormFieldName('key_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_panel', array(
					 'label'=> Mage::helper('translate')->__('Remove Panel'),
					 'url'  => $this->getUrl('*/adminhtml_panel/massRemove'),
					 'confirm' => Mage::helper('translate')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray3()
		{
            $data_array=array(); 
			$data_array[0]='ru_Ru';
			$data_array[1]='uk_UA';
			$data_array[2]='en_US';
            return($data_array);
		}
		static public function getValueArray3()
		{
            $data_array=array();
			foreach(Snenko_Translate_Block_Adminhtml_Panel_Grid::getOptionArray3() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);
			}
            return($data_array);

		}
		

}