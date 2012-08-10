<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/

class Dzinehub_Brands_Adminhtml_BrandsController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()
			 ->_setActiveMenu('brands/brands')
			 ->_addBreadcrumb(Mage::helper('brands')->__('Manage Brands'),Mage::helper('brands')->__('Manage Brands'));
		return $this;
	}

	public function indexAction()
	{
		$this->_initAction();
		$this->loadLayout();
		$this->_addContent($this->getLayout()->createBlock('brands/adminhtml_brands'));
		$this->renderLayout();
	}

	public function newAction()
	{
		$this->_forward('edit');
	}

	public function editAction()
	{
		$brandId=$this->getRequest()->getParam('brand_id');
		$brandsModel=Mage::getModel('brands/brands')->load($brandId);
        var_dump($this->getRequest()->getParams());
       // Mage::log($this->getRequest()->getParam('brand_id'));
		if( $brandsModel->getBrandId() || $brandId==0)
		{

			Mage::register('brands_data',$brandsModel);
            $brands=Mage::registry('brands_data');
            //var_dump($brands->getBrandId());

			$this->loadLayout();
			$this->_setActiveMenu('brands/brands');
			$this->_addBreadCrumb(Mage::helper('brands')->__('Manage Brands'),Mage::helper('brands')->__('Manage Brands'));
			$this->_addBreadCrumb(Mage::helper('brands')->__('Manage Brands'),Mage::helper('brands')->__('Manage Brands'));
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			$this->_addContent(
				$this->getLayout()->createBlock('brands/adminhtml_brands_edit')
			)
    		->_addLeft(
    			$this->getLayout()->createBlock('brands/adminhtml_brands_edit_tabs')
    		);

			$this->renderLayout();
		}
		else
		{
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('brands')->__('Brand does not exist'));
			$this->_redirect('*/*/');
		}
	}

    public function saveAction()
    {
        if($this->getRequest()->getPost())
        {
            try
            {
                $postData=$this->getRequest()->getPost();
                $bannerModel=Mage::getModel('brands/brands');
                $bannerModel->setBrandId($this->getRequest()->getParam('brand_id'));
                $bannerModel->setStoreId($this->getRequest()->getPost('store_id',array(0)));
                $bannerModel->setData($postData)->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('brands')->__("Brand was successfully saved"));
                Mage::getSingleton('adminhtml/session')->setData(false);
                $this->_redirect('*/*/');
                return;
            }
            catch(Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('brands')->__("Failed to save"));
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('brand_id')));
                return;
            }
        }

        $this->_redirect('*/*/');

    }

}