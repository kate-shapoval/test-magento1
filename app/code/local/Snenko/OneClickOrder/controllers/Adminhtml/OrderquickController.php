<?php

class Snenko_OneClickOrder_Adminhtml_OrderquickController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('oneclickorder/orderquick');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("oneclickorder/orderquick")->_addBreadcrumb(Mage::helper("adminhtml")->__("Orderquick  Manager"),Mage::helper("adminhtml")->__("Orderquick Manager"));
				return $this;
		}
		public function indexAction()
		{
			    $this->_title($this->__("OneClickOrder"));
			    $this->_title($this->__("Manager Orderquick"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{
			    $this->_title($this->__("OneClickOrder"));
				$this->_title($this->__("Orderquick"));
			    $this->_title($this->__("Edit Item"));

				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("oneclickorder/orderquick")->load($id);
				if ($model->getId()) {
					Mage::register("orderquick_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("oneclickorder/orderquick");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Orderquick Manager"), Mage::helper("adminhtml")->__("Orderquick Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Orderquick Description"), Mage::helper("adminhtml")->__("Orderquick Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("oneclickorder/adminhtml_orderquick_edit"))->_addLeft($this->getLayout()->createBlock("oneclickorder/adminhtml_orderquick_edit_tabs"));
					$this->renderLayout();
				}
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("oneclickorder")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("OneClickOrder"));
		$this->_title($this->__("Orderquick"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("oneclickorder/orderquick")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("orderquick_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("oneclickorder/orderquick");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Orderquick Manager"), Mage::helper("adminhtml")->__("Orderquick Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Orderquick Description"), Mage::helper("adminhtml")->__("Orderquick Description"));


		$this->_addContent($this->getLayout()->createBlock("oneclickorder/adminhtml_orderquick_edit"))->_addLeft($this->getLayout()->createBlock("oneclickorder/adminhtml_orderquick_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("oneclickorder/orderquick")
						->addData($post_data)
						->setId($this->getRequest()->getParam("quick_order_id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Orderquick was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setOrderquickData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setOrderquickData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("quick_order_id" => $this->getRequest()->getParam("quick_order_id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("oneclickorder/orderquick");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('quick_order_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("oneclickorder/orderquick");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'orderquick.csv';
			$grid       = $this->getLayout()->createBlock('oneclickorder/adminhtml_orderquick_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		}
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'orderquick.xml';
			$grid       = $this->getLayout()->createBlock('oneclickorder/adminhtml_orderquick_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
