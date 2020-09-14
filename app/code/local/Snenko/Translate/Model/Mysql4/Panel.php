<?php
class Snenko_Translate_Model_Mysql4_Panel extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("translate/panel", "key_id");
    }
}