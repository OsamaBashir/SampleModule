<?php
namespace FME\SampleModule\Model;
use FME\SampleModule\Api\StudentInterface;
use FME\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Student implements StudentInterface{
    protected $itemCollection;


    public function __construct(

        CollectionFactory $itemCollection

    ) {

        $this->itemCollection = $itemCollection;

    }

 public function getById(){
        $collection = $this->itemCollection->create();
        
        //echo '<pre>';print_r($collection->getData());exit;

        return $collection->getData();

    }

}