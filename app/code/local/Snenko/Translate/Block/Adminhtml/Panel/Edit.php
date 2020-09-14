<?php

class Snenko_Translate_Block_Adminhtml_Panel_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "key_id";
				$this->_blockGroup = "translate";
				$this->_controller = "adminhtml_panel";
				$this->_updateButton("save", "label", Mage::helper("translate")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("translate")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("translate")->__("Save And Continue Edit"),
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
				if( Mage::registry("panel_data") && Mage::registry("panel_data")->getId() ){

				    return Mage::helper("translate")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("panel_data")->getId()));

				}
				else{

				     return Mage::helper("translate")->__("Add Item");

				}
		}
}