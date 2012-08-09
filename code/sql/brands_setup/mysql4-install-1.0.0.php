<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/

//$installer = Mage::getResourceModel('catalog/setup','default_setup')

$installer = $this;


$installer->startSetup();

$data = array(
	'label' => 'Brands',
	'type' => 'text',
	'input' => 'select',
	'global'=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
	'required'=>false,
	'is_configurable'=>true,
	'compareble'=>true,
	'filterable' =>true,
	'searchable'=>true
);

$installer->addAttribute('catalog_product','dz_brands',$data);

$installer->run("
  DROP TABLE IF EXISTS `{$installer->getTable('brands/brands')}`;
  CREATE TABLE IF NOT EXISTS `{$installer->getTable('brands/brands')}`
  (
  	`brand_id` smallint(6) NOT NULL AUTO_INCREMENT,
  	`name` varchar(255) NULL,
  	`content` mediumtext NULL,
  	`value` varchar(255) NULL,
  	`status` smallint(6) NOT NULL DEFAULT '0',
  	`creation_time` timestamp NULL,
  	`update_time` timestamp NULL,
  	`store_id` smallint(5)	NOT NULL,
  	PRIMARY KEY (`brand_id`)
	)
");

$attributeId = $installer->getAttribute('catalog_product','dz_brands');
foreach($installer->getAllAttributeSetIds('catalog_product') as $attributeSetId)
{
  try
  {
    $attributeGroupId=$installer->getAttributeGroupId('catalog_product',$attributeSetId,'General');
  }
  catch(Exception $e)
  {
    $attributeGroupId=$installer->getDefaultAttributeGroupId('catalog_product',$attributeSetId);
  }
  $installer->addAttributeToSet('catalog_product',$attributeSetId,$attributeGroupId,$attributeId);
}

$installer->endSetup();
