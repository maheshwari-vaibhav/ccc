<?php
class Ccc_Salesman_Block_Adminhtml_Salesman_Edit extends Mage_Adminhtml_block_Widget_Form_Container {
	public function __construct() {
		$this->_controller = 'adminhtml_salesman';
		$this->_blockGroup = 'salesman';
		$this->_headerText = 'Edit Salesman';
		parent::__construct();
	}
}