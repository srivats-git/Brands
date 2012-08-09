<?php
/**
 *
 * @category  Dzinehub
 * @package   Brands
 * @author    dZine Hub <sales@dzine-hub.com>
 *
 **/
class Dzinehub_Brands_Model_Mysql4_Brands_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('brands/brands');
	}
}