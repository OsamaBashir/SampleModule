<?php

namespace FME\SampleModule\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->getConnection()->update(
                $setup->getTable('mastering_sample_item'),
               [
                   'designation' => 'Sotware Engineer'                    
               ],
               $setup->getConnection()->quoteInto('id = ?', 1)
            );
            
            $setup->getConnection()->update(
                $setup->getTable('mastering_sample_item'),
               [
                   'designation' => 'Junior Team Lead'                    
               ],
              $setup->getConnection()->quoteInto('id = ?', 2)
           );
            $setup->getConnection()->update(
                $setup->getTable('mastering_sample_item'),
                [
                    'description' => 'Brilliant in logic building'
                ],
                $setup->getConnection()->quoteInto('id = ?', 1)
            );
            $setup->getConnection()->update(
                $setup->getTable('mastering_sample_item'),
                [
                    'description' => 'API implementation expert'
                ],
                $setup->getConnection()->quoteInto('id = ?', 2)
            );
           
        }

        $setup->endSetup();
    }
}