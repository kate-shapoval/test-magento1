<?php

class Snenko_Translate_Adminhtml_PanelController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('translate/panel');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("translate/panel")->_addBreadcrumb(Mage::helper("adminhtml")->__("Panel  Manager"),Mage::helper("adminhtml")->__("Panel Manager"));
				return $this;
		}
		public function indexAction()
		{
			    $this->_title($this->__("Translate"));
			    $this->_title($this->__("Manager Panel"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{
			    $this->_title($this->__("Translate"));
				$this->_title($this->__("Panel"));
			    $this->_title($this->__("Edit Item"));

				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("translate/panel")->load($id);
				if ($model->getId()) {
					Mage::register("panel_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("translate/panel");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Panel Manager"), Mage::helper("adminhtml")->__("Panel Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Panel Description"), Mage::helper("adminhtml")->__("Panel Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("translate/adminhtml_panel_edit"))->_addLeft($this->getLayout()->createBlock("translate/adminhtml_panel_edit_tabs"));
					$this->renderLayout();
				}
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("translate")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Translate"));
		$this->_title($this->__("Panel"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("translate/panel")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("panel_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("translate/panel");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Panel Manager"), Mage::helper("adminhtml")->__("Panel Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Panel Description"), Mage::helper("adminhtml")->__("Panel Description"));


		$this->_addContent($this->getLayout()->createBlock("translate/adminhtml_panel_edit"))->_addLeft($this->getLayout()->createBlock("translate/adminhtml_panel_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("translate/panel")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Panel was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setPanelData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setPanelData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("translate/panel");
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
				$ids = $this->getRequest()->getPost('key_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("translate/panel");
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
			$fileName   = 'panel.csv';
			$grid       = $this->getLayout()->createBlock('translate/adminhtml_panel_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		}
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'panel.xml';
			$grid       = $this->getLayout()->createBlock('translate/adminhtml_panel_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
