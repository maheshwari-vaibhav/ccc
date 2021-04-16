<?php

$installer = $this;
$installer->startSetup();

$installer->addAttribute(Ccc_Salesman_Model_Resource_Salesman::ENTITY, 'firstname', [
	'group' => 'General',
	'input' => 'text',
	'type' => 'varchar',
	'label' => 'First Name',
	'backend' => '',
	'visible' => 1,
	'required' => 0,
	'user_defined' => 1,
	'searchable' => 1,
	'filterable' => 0,
	'comparable' => 1,
	'visible_on_front' => 1,
	'visible_in_advanced_search' => 0,
	'is_html_allowed_on_front' => 1,
	'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
]);

$installer->addAttribute(Ccc_Salesman_Model_Resource_Salesman::ENTITY, 'lastname', [
	'group' => 'General',
	'input' => 'text',
	'type' => 'varchar',
	'label' => 'Last Name',
	'backend' => '',
	'visible' => 1,
	'required' => 0,
	'user_defined' => 1,
	'searchable' => 1,
	'filterable' => 0,
	'comparable' => 1,
	'visible_on_front' => 1,
	'visible_in_advanced_search' => 0,
	'is_html_allowed_on_front' => 1,
	'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
]);

$installer->addAttribute(Ccc_Salesman_Model_Resource_Salesman::ENTITY, 'email', [
	'group' => 'General',
	'input' => 'text',
	'type' => 'varchar',
	'label' => 'Email',
	'frontend_class' => 'validate-email',
	'backend' => '',
	'visible' => 1,
	'required' => 0,
	'user_defined' => 1,
	'searchable' => 1,
	'filterable' => 0,
	'comparable' => 1,
	'visible_on_front' => 1,
	'visible_in_advanced_search' => 0,
	'is_html_allowed_on_front' => 1,
	'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
]);

$installer->addAttribute(Ccc_Salesman_Model_Resource_Salesman::ENTITY, 'phoneNo', [
	'group' => 'General',
	'input' => 'text',
	'type' => 'varchar',
	'label' => 'Phone Number',
	'frontend_class' => 'validate-digits',
	'backend' => '',
	'visible' => 1,
	'required' => 0,
	'user_defined' => 1,
	'searchable' => 1,
	'filterable' => 0,
	'comparable' => 1,
	'visible_on_front' => 1,
	'visible_in_advanced_search' => 0,
	'is_html_allowed_on_front' => 1,
	'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
]);

$installer->endSetup();