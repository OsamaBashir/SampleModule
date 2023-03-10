<?php
namespace FME\SampleModule\Model;
use FME\SampleModule\Api\AppliedJobsInterface;
use Magento\Framework\Webapi\Rest\Request;
use FME\SampleModule\Model\ResourceModel\Jobs\CollectionFactory;
use FME\SampleModule\Model\JobsFactory;

class AppliedJobs implements AppliedJobsInterface{
    protected $itemCollection;
    protected $request;
    protected $jobsFactory;

    public function __construct(

        CollectionFactory $jobsCollection,
        Request $request,
        JobsFactory $jobsFactory

    ) {

        $this->jobsCollection = $jobsCollection;
        $this->request = $request;
        $this->jobsFactory = $jobsFactory;

    }

 public function getAppliedJobsData(){

    $body =$this->request->getBodyParams();
        $this->DeletePrev();
    // echo '<pre>';print_r($body);exit;
    $model = $this->jobsFactory->create();


    foreach($body as $row)
    {

        $inner = $row['data']['messsage'];
        // echo "<pre>"; print_r($inner); exit;
        $inner['second_email'] = $row['email'];
        unset($inner['id']);
        $model->setData($inner);
        $model->save();
    }


   
    //$collection = $this->jobsCollection->create();
    //$result = array();
    // $data = array();
    // if($collection->getSize() >= 1)
    // {
    // $data = $collection->getData();
    // }

    // $result[0]['success'] = 1;
    // $result[0]['data'] = $data;
   
    return $body;
   

        }

  public function DeletePrev()
        {
            $model = $this->jobsFactory->create();
            $data = $model->getData();
            $connection = $model->getCollection()->getConnection();
            $tableName = $model->getCollection()->getMainTable();
            $connection->truncateTable($tableName);

        }

}