<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/
class Dzinehub_Brands_Block_Adminhtml_Brands extends Mage_Adminhtml_Block_Widget_Grid_Container
{

	public function __construct()
	{
		$this->_controller = 'adminhtml_brands';

		//block group
		$this->_blockGroup='brands';

		$this->_headerText = Mage::helper('brands')->__('Manage Brands');
		$this->_addButtonLabel=Mage::helper('brands')->__('Add New');
		parent::__construct();
	}

	public function getHeaderText()
	{
		if(Mage::registry('brands_data') && Mage::registry('brands')->getBrandId())
		{
			return Mage::helper('brands')->__('Edit brand %s',$this->htmlEscape(Mage::registry('brands')->getName()));
		}
		else
		{
			return Mage::helper('brands')->__('Add New Brand');
		}
	}
	/*
	public function _prepareLayout()
	{
		if(Mage::getSingleton('cms/wysiwyg_config')->isEnabled() && ($block = $this->getLayout()->getBlock('head')))
		{
			$block->setCanLoadTinyMce(true);
		}
		return parent::_prepareLayout();
	}
	*/
}
