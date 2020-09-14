<?php
class Snenko_Translate_Block_Adminhtml_Panel_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("translate_form", array("legend"=>Mage::helper("translate")->__("Item information")));

				
						$fieldset->addField("string", "text", array(
						"label" => Mage::helper("translate")->__("Text"),
						"class" => "required-entry",
						"required" => true,
						"name" => "string",
						));
					
						$fieldset->addField("translate", "text", array(
						"label" => Mage::helper("translate")->__("Translate of text"),
						"class" => "required-entry",
						"required" => true,
						"name" => "translate",
						));
					
						 $fieldset->addField('locale', 'select', array(
						'label'     => Mage::helper('translate')->__('Locale'),
						'values'   => Snenko_Translate_Block_Adminhtml_Panel_Grid::getValueArray3(),
						'name' => 'locale',
						"class" => "required-entry",
						"required" => true,
						));

				if (Mage::getSingleton("adminhtml/session")->getPanelData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getPanelData());
					Mage::getSingleton("adminhtml/session")->setPanelData(null);
				}
				elseif(Mage::registry("panel_data")) {
				    $form->setValues(Mage::registry("panel_data")->getData());
				}
				return parent::_prepareForm();
		}
}
