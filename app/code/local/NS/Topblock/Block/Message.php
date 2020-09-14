<?php
class NS_Topblock_Block_Message extends Mage_Core_Block_Template{
    public function _construct()
    {
       $this->setTemplate('topblock/message.phtml');
    }
    public function outputMessage( string $message )
    {
        return $message;
    }
}