<?php
class Mage_Adminhtml_Model_System_Config_Source_Pages
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(

            array('value' => 'cms_index_index', 'label'=>Mage::helper('adminhtml')->__('Home page')),
            array('value' => 'account', 'label'=>Mage::helper('adminhtml')->__('Account page')),
            array('value' => 'catalog_category_view', 'label'=>Mage::helper('adminhtml')->__('Category page')),
            array('value' => 'catalog_product_view', 'label'=>Mage::helper('adminhtml')->__('Product page')),
            array('value' => 'cart', 'label'=>Mage::helper('adminhtml')->__('Cart page')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'cms_index_index' => Mage::helper('adminhtml')->__('Home page'),
            'account' => Mage::helper('adminhtml')->__('Account page'),
            'catalog_category_view' => Mage::helper('adminhtml')->__('Category page'),
            'catalog_product_view' => Mage::helper('adminhtml')->__('Product page'),
            'cart' => Mage::helper('adminhtml')->__('Cart page'),
        );
    }
}