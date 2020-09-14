<?php

class Snenko_OneClickOrder_Block_Adminhtml_Orderquick_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "quick_order_id";
				$this->_blockGroup = "oneclickorder";
				$this->_controller = "adminhtml_orderquick";
				$this->_updateButton("save", "label", Mage::helper("oneclickorder")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("oneclickorder")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("oneclickorder")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("orderquick_data") && Mage::registry("orderquick_data")->getId() ){

				    return Mage::helper("oneclickorder")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("orderquick_data")->getId()));

				}
				else{

				     return Mage::helper("oneclickorder")->__("Add Item");

				}
		}
}