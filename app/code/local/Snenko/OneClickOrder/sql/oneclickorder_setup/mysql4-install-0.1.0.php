<?php
$installer = $this;
$installer->startSetup();
$table = $this->getConnection()
	->newTable($this->getTable('oneclickorder/orderquick'))
	->addColumn('quick_order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'  => true,
		'nullable'  => false,
		'primary'   => true,
		), 'Pre Order ID')
	->addColumn('user_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable'  => false,
		), 'User Name')

	->addColumn('user_comment', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
		), 'User comment')

	->addColumn('user_phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable'  => false,
		), 'User Phone')

	->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable'  => false,
		), 'Product')

	->addColumn('product_qty', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
		'unsigned'  => true,
		), 'Qty')

	->addColumn('manager_comment', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
		), 'Manager Comment')

	->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'default' => 0,
		), 'Status')

	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		), 'Pre Order Creation Time')
	->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		), 'Pre Order Modification Time');
$this->getConnection()->createTable($table);

$installer->endSetup();
