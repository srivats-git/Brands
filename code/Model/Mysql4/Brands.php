<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/
class Dzinehub_Brands_Model_Mysql4_Brands extends Mage_Core_Model_Mysql4_Abstract
{
	protected function _construct()
	{
		$this->_init('brands/brands','brand_id');
	}
}