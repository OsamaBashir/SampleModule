<?php

namespace FME\SampleModule\Observer;

class SaveItem implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->messageManager = $messageManager;
    }
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
        $displayText = $observer->getData('mp_text');
		$this->messageManager->addSuccessMessage(__($displayText->getText(). "     row saved " ));

		return $this;
	}
}