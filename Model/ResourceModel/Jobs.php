<?php

namespace FME\SampleModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Jobs extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mastering_applied_jobs', 'id');
    }
}