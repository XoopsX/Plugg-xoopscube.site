<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/User/Model/FriendrequestHTMLQuickForm.php
*/
abstract class Plugg_User_Model_Base_FriendrequestHTMLQuickForm extends Sabai_Model_EntityHTMLQuickForm
{
    public function onInit(array $params)
    {
        $this->addElement('textarea', 'message', $this->_model->_('Message'), array('rows' => 10, 'cols' => 60));
        $this->addElement('text', 'userid', $this->_model->_('User ID'), array('size' => 30, 'maxlength' => 255));
        $this->_onInit($params);
    }

    public function onEntity(Sabai_Model_Entity $entity)
    {
        $defaults = array();
        foreach (array('message') as $key) {
            if ($this->elementExists($key) || $this->isInGroup($key)) {
                $defaults[$key] = $entity->getVar($key);
            }
        }
        if ($this->elementExists('userid')) {
            $defaults['userid'] = $entity->getVar('userid');
        }
        if (!empty($defaults)) $this->setDefaults($defaults);
        $this->_onEntity($entity);
    }

    public function onFillEntity(Sabai_Model_Entity $entity)
    {
        $vars = array();
        foreach (array('message' => 'message', 'userid' => 'userid') as $var_name => $form_name) {
            if ($this->elementExists($form_name) || $this->isInGroup($form_name)) {
                if ($this->getElementType($form_name) == 'static') continue;

                $value = $this->getSubmitValue($form_name);
                $vars[$var_name] = is_array($value) ? array_shift($value) : $value;
            }
        }
        $entity->setVars($vars);
        $this->_onFillEntity($entity);
    }

    abstract protected function _onInit(array $params);
    abstract protected function _onEntity(Sabai_Model_Entity $entity);
    abstract protected function _onFillEntity(Sabai_Model_Entity $entity);
}