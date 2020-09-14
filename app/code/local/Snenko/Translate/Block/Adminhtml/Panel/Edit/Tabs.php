<?php
class Snenko_Translate_Block_Adminhtml_Panel_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("panel_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("translate")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("translate")->__("Item Information"),
				"title" => Mage::helper("translate")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("translate/adminhtml_panel_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
