<?php
class Plugg_User_Main_EditStatus extends Sabai_Application_Controller
{
    protected function _doExecute(Sabai_Application_Context $context)
    {
        // Check if registered
        if (!$context->user->isAuthenticated()) {
            $context->response->setError(null, array('base' => '/user'));
            return;
        }

        $this->forward($context->user->getId() . '/edit_status', $context);
    }
}