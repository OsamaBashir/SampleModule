<?php
namespace FME\SampleModule\Api;

interface StudentInterface
{
    /**
     * Returns information about a customer.
     *
     * @return array
     */
    public function getById();
}