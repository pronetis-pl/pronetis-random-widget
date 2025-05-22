<?php
namespace Pronetis\RandomWidget\Block\Widget;

use Magento\CatalogWidget\Block\Product\ProductsList;
use Magento\Widget\Block\BlockInterface;

/**
 * Widget block for displaying a random selection of products in a grid.
 */
class Random extends ProductsList implements BlockInterface
{
    /** 
     * Use Magento's default grid template for product widgets 
     *
     * @var string
     */
    protected $_template = 'Magento_CatalogWidget::product/widget/content/grid.phtml';

    /**
     * Prepares widget data before rendering.
     *
     * @return string
     */
    protected function _beforeToHtml()
    {
        // Set default number of products if not defined
        if (!$this->getData('products_count')) {
            $this->setData('products_count', 5);
        }

        // Ensure empty JSON-encoded conditions to avoid unserialization issues
        if (!$this->hasData('conditions_encoded')) {
            $this->setData('conditions_encoded', '[]');
        }

        return parent::_beforeToHtml();
    }

    /**
     * Returns a randomized product collection.
     *
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollection()
    {
        $collection = parent::getProductCollection();
        $collection->getSelect()->reset(\Zend_Db_Select::ORDER);
        $collection->getSelect()->order('RAND()');
        return $collection;
    }
}