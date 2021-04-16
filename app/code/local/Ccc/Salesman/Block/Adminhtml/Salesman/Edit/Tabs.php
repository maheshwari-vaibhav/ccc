<?php
class Ccc_Salesman_Block_Adminhtml_Salesman_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

	public function __construct() {
		parent::__construct();
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('salesman')->__('Salesman Information'));
	}

	public function getSalesman() {
		return Mage::registry('current_salesman');
	}

	protected function _beforeToHtml() {
		$salesmanAttributes = Mage::getResourceModel('salesman/salesman_attribute_collection');
		if (!$this->getSalesman()->getId()) {
			foreach ($salesmanAttributes as $attribute) {
				$default = $attribute->getDefaultValue();
				if ($default != null) {
					$this->getSalesman()->setData($attribute->getAttributeCode(), $default);
				}
			}
		}

		$attributeSetId = $this->getSalesman()->getResource()->getEntityType()->getDefaultAttributeSetId();

		$groupCollection = Mage::getResourceModel('eav/entity_attribute_group_collection')
			->setAttributeSetFilter($attributeSetId)
			->setSortOrder()
			->load();

		$defaultGroupId = 0;
		foreach ($groupCollection as $group) {
			if ($defaultGroupId == 0 || $group->getIsDefault()) {
				$defaultGroupId = $group->getId();
			}
			$attributes = [];
			foreach ($salesmanAttributes as $attribute) {
				if ($this->getSalesman()->checkInGroup($attribute->getId(), $attributeSetId, $group->getId())) {
					$attributes[] = $attribute;
				}
			}

			if (!$attributes) {
				continue;
			}

			$active = $defaultGroupId == $group->getId();

			$block = $this->getLayout()->createBlock('salesman/adminhtml_salesman_edit_tab_attributes')
				->setGroup($group)
				->setAttributes($attributes)
				->setAddHiddenFields($active)
				->toHtml();

			$this->addTab('group_' . $group->getId(), [
				'label' => Mage::helper('salesman')->__($group->getAttributeGroupName()),
				'content' => $block,
				'active' => $active,
			]);
		}

		return parent::_beforeToHtml();

	}
}