<?php
class Snenko_OneClickOrder_Model_Mysql4_Orderquick extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("oneclickorder/orderquick", "quick_order_id");
    }
}