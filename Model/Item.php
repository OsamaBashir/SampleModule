<?php

namespace FME\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\FME\SampleModule\Model\ResourceModel\Item::class);
    }
}