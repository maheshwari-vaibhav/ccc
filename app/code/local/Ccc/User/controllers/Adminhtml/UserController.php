<?php
class Ccc_User_Adminhtml_UserController extends Mage_Adminhtml_Controller_Action {
	public function indexAction() {
		$this->loadLayout();
		$model = Mage::getModel('user/user')->getResource();
		print_r($model);
		$this->_setActiveMenu('user/user');
		$this->renderLayout();
	}
}