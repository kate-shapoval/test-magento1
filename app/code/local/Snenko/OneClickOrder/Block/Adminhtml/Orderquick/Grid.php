<?php

class Snenko_OneClickOrder_Block_Adminhtml_Orderquick_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("orderquickGrid");
				$this->setDefaultSort("quick_order_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("oneclickorder/orderquick")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("quick_order_id", array(
				"header" => Mage::helper("oneclickorder")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "quick_order_id",
				));
                
				$this->addColumn("user_name", array(
				"header" => Mage::helper("oneclickorder")->__("User Name"),
				"index" => "user_name",
				));
				$this->addColumn("user_phone", array(
				"header" => Mage::helper("oneclickorder")->__("User phone"),
				"index" => "user_phone",
				));
				$this->addColumn("product_id", array(
				"header" => Mage::helper("oneclickorder")->__("Product"),
				"index" => "product_id",
				));
				$this->addColumn("product_id", array(
				"header" => Mage::helper("oneclickorder")->__("Product Sku"),
				"index" => "product_id",
				));
				$this->addColumn("product_id", array(
				"header" => Mage::helper("oneclickorder")->__("Product Price"),
				"index" => "product_id",
				));
				$this->addColumn("product_qty", array(
				"header" => Mage::helper("oneclickorder")->__("Qty"),
				"index" => "product_qty",
				));
				$this->addColumn("manager_comment", array(
				"header" => Mage::helper("oneclickorder")->__("Manager Comment"),
				"index" => "manager_comment",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('oneclickorder')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>Snenko_OneClickOrder_Block_Adminhtml_Orderquick_Grid::getOptionArray8(),
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
			$this->setMassactionIdField('quick_order_id');
			$this->getMassactionBlock()->setFormFieldName('quick_order_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_orderquick', array(
					 'label'=> Mage::helper('oneclickorder')->__('Remove Orderquick'),
					 'url'  => $this->getUrl('*/adminhtml_orderquick/massRemove'),
					 'confirm' => Mage::helper('oneclickorder')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray8()
		{
            $data_array=array(); 
			$data_array[0]='New';
			$data_array[1]='Approved';
			$data_array[2]='Canceled';
            return($data_array);
		}
		static public function getValueArray8()
		{
            $data_array=array();
			foreach(Snenko_OneClickOrder_Block_Adminhtml_Orderquick_Grid::getOptionArray8() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);
			}
            return($data_array);

		}
		

}