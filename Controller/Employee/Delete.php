<?php

namespace Dtn\Knockout\Controller\Employee;

class Delete extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Dtn\Knockout\Model\EmployeeFactory
     */
    private  $employeeFactory;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Dtn\Knockout\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
        return parent::__construct($context);
    }

    public function execute()
    {

        $id = $this->_request->getParam('id');
        $employee = $this->employeeFactory->create()->load($id)->delete();
        if ($employee) {
            $this->messageManager->addSuccessMessage(__('Delete successfully.'));
        } else {
            $this->messageManager->addSuccessMessage(__('Delete failed.'));
        }
        return $this->_redirect('knockout/employee/index');
    }
}
