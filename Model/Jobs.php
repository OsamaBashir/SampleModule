<?php

namespace FME\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Jobs extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\FME\SampleModule\Model\ResourceModel\Jobs::class);
    }
}