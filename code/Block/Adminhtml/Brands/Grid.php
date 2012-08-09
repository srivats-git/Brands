<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/

 class Dzinehub_Brands_Block_Adminhtml_Brands_Grid extends Mage_Adminhtml_Block_Widget_Grid
 {
 	public function __construct()
 	{
 		parent::__construct();

 		//primary key of the table
 		$this->setDefaultSort('brand_id');
 		$this->setId('brandsGrid');
 		$this->setDefaultDir('ASC');
 		$this->setSaveSessionParameters(true);
 	}

 	protected function _prepareCollection()
 	{
 		$collection=Mage::getModel('brands/brands')->getCollection();
 		$this->setCollection($collection);
 		return parent::_prepareCollection();
 	}

 	protected function _prepareColumns()
 	{
 		$this->addColumn('brand_id',array(
 			'header'=>Mage::helper('brands')->__('ID'),
 			'index' => 'brand_id',
 		));
 		$this->addColumn('name',array(
 			'header'=>Mage::helper('brands')->__('Name'),
 			'index' => 'name',
 		));
 		$this->addColumn('content',array(
 			'header'=>Mage::helper('brands')->__('Content'),
 			'index' => 'content',
 		));
 		$this->addColumn('status',array(
 			'header'=>Mage::helper('brands')->__('Status'),
 			'index' => 'status',
 			'type' =>'options',
 			'options'=>array(
 				0=>Mage::helper('brands')->__('Disabled'),
 				1=>Mage::helper('brands')->__('Enabled'),
 			)
 		));
 		$this->addColumn('created_time',array(
 			'header'=>Mage::helper('brands')->__('Date Created'),
 			'index' => 'created_time',
 			'type'=>'datetime',
 		));

	 	return parent::_prepareColumns();
 	}

     public function getRowUrl($row)
     {
         return $this->getUrl('*/*/edit', array($row->getBrandId()));
     }
 }