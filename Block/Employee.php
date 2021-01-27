<?php

namespace Dtn\Knockout\Block;

class Employee extends \Magento\Framework\View\Element\Template{

    /**
     * @var array
     */
    protected $layoutProcessors;
    /**
     * @var \Dtn\Knockout\Model\ResourceModel\Employee\CollectionFactory
     */
    protected $employee;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Dtn\Knockout\Model\ResourceModel\Employee\CollectionFactory $employeeFactoryFactory,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this->layoutProcessors = $layoutProcessors;
        $this->employee = $employeeFactoryFactory;
    }

    public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        return \Zend_Json::encode($this->jsLayout);
    }
    public function getEmployee(){
        return $this->employee->create();
    }
    public function abc(){
        return "abc";
    }
}

