<?php


class Snenko_OneClickOrder_Block_Adminhtml_Orderquick extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_orderquick";
	$this->_blockGroup = "oneclickorder";
	$this->_headerText = Mage::helper("oneclickorder")->__("Orderquick Manager");
//	$this->_addButtonLabel = Mage::helper("oneclickorder")->__("Add New Item");
	parent::__construct();
	
	}

}