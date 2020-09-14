<?php


class Snenko_Translate_Block_Adminhtml_Panel extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_panel";
	$this->_blockGroup = "translate";
	$this->_headerText = Mage::helper("translate")->__("Panel Manager");
	$this->_addButtonLabel = Mage::helper("translate")->__("Add New Item");
	parent::__construct();
	
	}

}