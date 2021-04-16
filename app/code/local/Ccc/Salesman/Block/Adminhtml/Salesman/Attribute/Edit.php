<?php

class Ccc_Salesman_Block_Adminhtml_Salesman_Attribute_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

	public function __construct() {
		$this->_objectId = 'attribute_id';
		$this->_blockGroup = 'salesman';
		$this->_controller = 'adminhtml_salesman_attribute';
		parent::__construct();

		if ($this->getRequest()->getParam('popup')) {
			$this->_removeButton('back');
			$this->_addButton(
				'close',
				array(
					'label' => Mage::helper('salesman')->__('Close Window'),
					'class' => 'cancel',
					'onclick' => 'window.close()',
					'level' => -1,
				)
			);
		}

		if (!Mage::registry('entity_attribute')->getIsUserDefined()) {
			$this->_removeButton('delete');
		} else {
			$this->_updateButton('delete', 'label', Mage::helper('salesman')->__('Delete Attribute'));
		}
	}

	public function getHeaderText() {
		if (Mage::registry('entity_attribute')->getId()) {
			$frontendLabel = Mage::registry('entity_attribute')->getFrontendLabel();
			if (is_array($frontendLabel)) {
				$frontendLabel = $frontendLabel[0];
			}
			return Mage::helper('salesman')->__('Edit salesman Attribute "%s"', $this->escapeHtml($frontendLabel));
		} else {
			return Mage::helper('salesman')->__('New salesman Attribute');
		}
	}

	public function getValidationUrl() {
		return $this->getUrl('*/*/validate', array('_current' => true));
	}

	public function getSaveUrl() {
		return $this->getUrl('*/' . $this->_controller . '/save', array('_current' => true, 'back' => null));
	}
}
