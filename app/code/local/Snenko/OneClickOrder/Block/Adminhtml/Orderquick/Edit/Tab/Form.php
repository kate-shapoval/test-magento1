<?php
class Snenko_OneClickOrder_Block_Adminhtml_Orderquick_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("oneclickorder_form", array("legend"=>Mage::helper("oneclickorder")->__("Item information")));

				
						$fieldset->addField("user_name", "text", array(
						"label" => Mage::helper("oneclickorder")->__("User Name"),
						"class" => "required-entry",
						"required" => true,
						"name" => "user_name",
						));
					
						$fieldset->addField("user_comment", "textarea", array(
						"label" => Mage::helper("oneclickorder")->__("User comment"),
						"class" => "required-entry",
						"required" => true,
						"name" => "user_comment",
						));
					
						$fieldset->addField("user_phone", "text", array(
						"label" => Mage::helper("oneclickorder")->__("User phone"),
						"class" => "required-entry",
						"required" => true,
						"name" => "user_phone",
						));
					
						$fieldset->addField("product_id", "text", array(
						"label" => Mage::helper("oneclickorder")->__("Product"),
						"class" => "required-entry",
						"required" => true,
						"name" => "product_id",
						));
					
						$fieldset->addField("product_id", "text", array(
						"label" => Mage::helper("oneclickorder")->__("Product Sku"),
						"class" => "required-entry",
						"required" => true,
						"name" => "product_id",
						));
					
						$fieldset->addField("product_id", "text", array(
						"label" => Mage::helper("oneclickorder")->__("Product Price"),
						"class" => "required-entry",
						"required" => true,
						"name" => "product_id",
						));
					
						$fieldset->addField("product_qty", "text", array(
						"label" => Mage::helper("oneclickorder")->__("Qty"),
						"class" => "required-entry",
						"required" => true,
						"name" => "product_qty",
						));
					
						$fieldset->addField("manager_comment", "text", array(
						"label" => Mage::helper("oneclickorder")->__("Manager Comment"),
						"name" => "manager_comment",
						));
					
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('oneclickorder')->__('Status'),
						'values'   => Snenko_OneClickOrder_Block_Adminhtml_Orderquick_Grid::getValueArray8(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getOrderquickData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getOrderquickData());
					Mage::getSingleton("adminhtml/session")->setOrderquickData(null);
				}
				elseif(Mage::registry("orderquick_data")) {
				    $form->setValues(Mage::registry("orderquick_data")->getData());
				}
				return parent::_prepareForm();
		}
}
