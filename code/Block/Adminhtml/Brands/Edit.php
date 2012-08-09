<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/

class Dzinehub_Brands_Block_Adminhtml_Brands_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();
		$this->_objectId='brand_id';
		$this->_blockGroup='brands';
		$this->_controller='adminhtml_brands';
		$this->_updateButton('save','label',Mage::helper('brands')->__('Save Brand'));
		$this->_updateButton('delete','label',Mage::helper('brands')->__('Delete Brand'));
	}

	

	public function getHeaderText()
	{
		if(Mage::registry('brands_data') && Mage::registry('brands_data')->getBrandId())
		{
			return Mage::helper('brands')->__('Edit brand %s',$this->htmlEscape(Mage::registry('brands_data')->getName()));
		}
		else
		{
			return Mage::helper('brands')->__('Add New Brand');
		}
	}

	protected function _prepareLayout() {
    	parent::_prepareLayout();
    	if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled())
    	{
        	$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
    	}
	}
}