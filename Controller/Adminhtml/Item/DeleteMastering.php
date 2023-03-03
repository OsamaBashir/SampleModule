<?php
namespace FME\SampleModule\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class DeleteMastering extends Action
{
    public $blogFactory;
    
    public function __construct(
        Context $context,
        \FME\SampleModule\Model\ItemFactory $blogFactory
    ) {
        $this->blogFactory = $blogFactory;
        parent::__construct($context);
    }

    public function execute()
    {
    
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $blogModel = $this->blogFactory->create();
            $blogModel->load($id);
            $blogModel->delete();
            $this->messageManager->addSuccessMessage(__('row deleted'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('*/index/index');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mastering::delete');
    }
}