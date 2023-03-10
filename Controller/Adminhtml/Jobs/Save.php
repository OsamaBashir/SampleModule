<?php

namespace FME\SampleModule\Controller\Adminhtml\Jobs;

use FME\SampleModule\Model\JobsFactory;

class Save extends \Magento\Backend\App\Action
{
    private $itemFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        JobsFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }
    
    public function execute()
    {
       //$this->messageManager->addSuccessMessage(__('row saved'));
       $textDisplay = new \Magento\Framework\DataObject(array('text' => 'row saving...'));
         $this->_eventManager->dispatch('item_save', ['mp_text' => $textDisplay]);
        //alert($textDisplay->getText());
		

        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue('general'))
            ->save();
        return $this->resultRedirectFactory->create()->setPath('mastering/jobs/index/index');
        
        
        
    }
}
