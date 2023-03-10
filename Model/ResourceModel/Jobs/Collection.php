<?php

namespace FME\SampleModule\Model\ResourceModel\Jobs;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use FME\SampleModule\Model\Jobs;
use FME\SampleModule\Model\ResourceModel\Jobs as JobsResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Jobs::class, JobsResource::class);
    }
}