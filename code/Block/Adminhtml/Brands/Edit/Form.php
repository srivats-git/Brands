<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/

class Dzinehub_Brands_Block_Adminhtml_Brands_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form=new Varien_Data_Form(array(
									'id'=>'edit_form',
									'method'=>'post',
									'action'=>$this->getUrl('*/*/save',array('id'=>$this->getRequest()->getParam('brand_id'))),
									 'enctype' => 'multipart/form-data'
		));
		$form->setUseContainer(true);
		$this->setForm($form);
		//$wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(array('add_variables' => false, 'add_widgets' => false,'files_browser_window_url'=>$this->getBaseUrl().'admin/cms_wysiwyg_images/index/'));
		return parent::_prepareForm();
	}
	
}