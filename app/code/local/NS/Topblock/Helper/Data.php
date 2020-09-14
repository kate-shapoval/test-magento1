<?php
class NS_Topblock_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CONF_ENABlED = 'newsline/global/enabled';
    const CONF_TEXT = 'newsline/global/topmessage';
    const CONF_PAGES = 'newsline/global/pages';
    private static $store;
    public function __construct(){
        self::$store = Mage::app()->getStore();
}
    public function getEnabled()
    {
        return Mage::getStoreConfig(self::CONF_ENABlED, self::$store);
    }

    public function getText()
    {
        return Mage::getStoreConfig(self::CONF_TEXT, self::$store);
    }

    public function getPages()
    {
        return Mage::getStoreConfig(self::CONF_PAGES, self::$store);
    }
}
	 