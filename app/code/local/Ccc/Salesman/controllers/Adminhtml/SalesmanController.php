<?php
class Ccc_Salesman_Adminhtml_SalesmanController extends Mage_Adminhtml_Controller_Action {

	public function indexAction() {
		$this->loadLayout();
		$this->renderLayout();
	}

	public function newAction() {
		$this->_forward('edit');
	}

	public function editAction() {

		$salesmanId = $this->getRequest()->getParam('id');
		$salesman = Mage::getModel('salesman/salesman')
			->setStoreId($this->getRequest()->getParam('store', 0))
			->load($salesmanId);

		Mage::register('current_salesman', $salesman);
		Mage::getSingleton('cms/wysiwyg_config')->setStoreId($this->getRequest()->getParam('store'));

		if ($salesmanId && !$salesman->getId()) {
			$this->_getSession()->addError(Mage::helper('salesman')->__('This Salesman no longer exists'));
			$this->_redirect('*/*/');
			return;
		}
		$this->loadLayout();
		$this->renderLayout();
	}

	public function saveAction() {

		try {

			$salesmanData = $this->getRequest()->getPost('account');

			$salesman = Mage::getSingleton('salesman/salesman');

			if ($salesmanId = $this->getRequest()->getParam('id')) {

				if (!$salesman->load($salesmanId)) {
					throw new Exception("No Row Found");
				}
				Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

			}

			$salesman->addData($salesmanData);

			$salesman->save();

			Mage::getSingleton('core/session')->addSuccess("salesman data added.");
			$this->_redirect('*/*/');

		} catch (Exception $e) {
			Mage::getSingleton('core/session')->addError($e->getMessage());
			$this->_redirect('*/*/');
		}

	}

	public function deleteAction() {
		try {

			$salesmanModel = Mage::getModel('salesman/salesman');

			if (!($salesmanId = (int) $this->getRequest()->getParam('id'))) {
				throw new Exception('Id not found');
			}

			if (!$salesmanModel->load($salesmanId)) {
				throw new Exception('salesman does not exist');
			}

			if (!$salesmanModel->delete()) {
				throw new Exception('Error in delete record', 1);
			}

			Mage::getSingleton('core/session')->addSuccess($this->__('The salesman has been deleted.'));

		} catch (Exception $e) {
			Mage::logException($e);
			$Mage::getSingleton('core/session')->addError($e->getMessage());
		}

		$this->_redirect('*/*/');
	}
}