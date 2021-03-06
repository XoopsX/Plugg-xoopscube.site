<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Project/Model/CategoryHTMLQuickForm.php
*/
abstract class Plugg_Project_Model_Base_CategoryHTMLQuickForm extends Sabai_Model_EntityHTMLQuickForm
{
    public function onInit(array $params)
    {
        $this->addElement('text', 'name', $this->_model->_('Name'), array('size' => 80, 'maxlength' => 255));
        $this->setRequired('name', $this->_model->_('Name is required'));
        $this->addElement('textarea', 'description', $this->_model->_('Description'), array('rows' => 10, 'cols' => 60));
        $this->addElement('text', 'order', $this->_model->_('Order'), array('size' => 6, 'maxlength' => 255));
        $this->addElement('selectmodelentity', $this->_model, 'Project', 'Projects', $this->_model->_('Project'), null, array('size' => 10, 'multiple' => 'multiple'));
        $this->_onInit($params);
    }

    public function onEntity(Sabai_Model_Entity $entity)
    {
        $defaults = array();
        foreach (array('name', 'description', 'order') as $key) {
            if ($this->elementExists($key) || $this->isInGroup($key)) {
                $defaults[$key] = $entity->getVar($key);
            }
        }
        if ($this->elementExists('Projects')) {
            $defaults['Projects'] = $entity->get('Projects')->getAllIds();
        }
        if (!empty($defaults)) $this->setDefaults($defaults);
        $this->_onEntity($entity);
    }

    public function onFillEntity(Sabai_Model_Entity $entity)
    {
        $vars = array();
        foreach (array('name' => 'name', 'description' => 'description', 'order' => 'order') as $var_name => $form_name) {
            if ($this->elementExists($form_name) || $this->isInGroup($form_name)) {
                if ($this->getElementType($form_name) == 'static') continue;

                $value = $this->getSubmitValue($form_name);
                $vars[$var_name] = is_array($value) ? array_shift($value) : $value;
            }
        }
        $entity->setVars($vars);
        if ($this->elementExists('Projects')) {
            $entity->set('Projects', (array)$this->getElementValue('Projects'));
        } elseif ($group = $this->isInGroup('Projects')) {
            $value = $this->getElementValue($group);
            $entity->set('Projects', (array)$value['Projects']);
        }
        $this->_onFillEntity($entity);
    }

    abstract protected function _onInit(array $params);
    abstract protected function _onEntity(Sabai_Model_Entity $entity);
    abstract protected function _onFillEntity(Sabai_Model_Entity $entity);
}