<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
	->newTable($installer->getTable('salesman/eav_attribute'))
	->addColumn('attribute_id', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'primary' => true,
		'nullable' => false,
		'unsigned' => true,
		'identity' => true,
	], 'Attribute Id')
	->addColumn('frontend_input_renderer', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [], 'Frontend Input Renderer')
	->addColumn('is_global', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 1,
	], 'Is Global')
	->addColumn('is_visible', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 1,
	], 'Is Visible')
	->addColumn('is_searchable', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Searchable')
	->addColumn('is_filterable', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Filterable')
	->addColumn('is_comparable', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Comparable')
	->addColumn('is_visible_on_front', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Visible On Frontend')
	->addColumn('is_html_allowed_on_front', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Html Allowed On Frontend')
	->addColumn('is_used_for_price_rules', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Used For Price Rules')
	->addColumn('is_filterable_in_search', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Filterable In Search')
	->addColumn('used_in_product_listing', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Used In Product Listing')
	->addColumn('used_for_sort_by', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Used For Sort By')
	->addColumn('is_configurable', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 1,
	], 'Is Configurable')
	->addColumn('apply_to', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [
		'nullable' => false,
	], 'Apply To')
	->addColumn('is_visible_in_advanced_search', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Visible In Advanced Search')
	->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
		'nullable' => false,
		'default' => 0,
	], 'Position')
	->addColumn('is_wysiwyg_enabled', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is WYSIWYG Enabled')
	->addColumn('is_used_for_promo_rules', Varien_Db_Ddl_Table::TYPE_TINYINT, null, [
		'nullable' => false,
		'unsigned' => true,
		'default' => 0,
	], 'Is Used For Promo Rules')
	->addIndex($installer->getIdxName('salesman/eav_attribute', ['used_for_sort_by']), ['used_for_sort_by'])
	->addIndex($installer->getIdxName('salesman/eav_attribute', ['used_in_product_listing']), ['used_in_product_listing'])
	->addForeignKey($installer->getFkName('salesman/eav_attribute', 'attribute_id', 'eav/attribute', 'attribute_id'), 'attribute_id', $installer->getTable('eav/attribute'), 'attribute_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
	->setComment('Salesman Eav Attribute Table');

$installer->run("ALTER TABLE `salesman_varchar` ADD UNIQUE (`attribute_id`,`store_id`,`entity_id`)");
$installer->getConnection()->createTable($table);

$installer->endSetup();