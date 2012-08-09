<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/

class Dzinehub_Brands_Block_Adminhtml_Brands_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form=new Varien_Data_Form();
		$this->setForm($form);
		$fieldset=$form->addFieldSet('brands_form',array('legend'=>Mage::helper('brands')->__('Brand Information')));

		$fieldset->addField('name','text',array(
			'label'=>Mage::helper('brands')->__('Name'),
			'name' =>'name',
			'required'=>true,
			'class'=>'required-entry'
		));
		$fieldset->addField('content','editor',array(
			'label'=>Mage::helper('brands')->__('Content'),
			'name'=>'content',
			'required'=>false,
			'wysiwyg'=>false,
			//'config' =>  $wysiwygConfig,
			//'style' => 'width:700px; height:500px;',
		));
		$fieldset->addField('value','image',array(
			'label'=>Mage::helper('brands')->__('Image'),
			'name'=>'image',
			'required'=>'false',
		));
		if (!Mage::app()->isSingleStoreMode()) {
            $fieldset->addField('store_id', 'multiselect', array(
                'name' => 'stores[]',
                'label' => Mage::helper('cms')->__('Store View'),
                'title' => Mage::helper('cms')->__('Store View'),
                'required' => true,
                'values' => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
        }
		$fieldset->addField('status','select',array(
			'label'=>Mage::helper('brands')->__('Status'),
			'name'=>'status',
			'required'=>true,
			'class'=>'required-entry',
			'values'=>array
			(
				array(
					'value'=>0,
					'label'=>Mage::helper('brands')->__('Disabled')
					),
				array(
					'value'=>1,
					'label'=>Mage::helper('brands')->__('Enabled')
					),
			),
		));
		if(Mage::getSingleton('adminhtml/session')->getBrandsData())
		{
			$form->setValues(Mage::getSingleton('adminhtml/session')->getBrandsData());
			Mage::getSingleton('adminhtml/session')->setBrandsData(null);
		}
		elseif(Mage::registry('brands_data'))
		{
			$form->setValues(Mage::registry('brands_data')->getData());
		}
		return parent::_prepareForm();
	}
}