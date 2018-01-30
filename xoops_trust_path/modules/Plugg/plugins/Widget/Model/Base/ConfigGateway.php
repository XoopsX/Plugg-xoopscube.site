<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Widget/Model/ConfigGateway.php
*/
abstract class Plugg_Widget_Model_Base_ConfigGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'config';
    }

    public function getFields()
    {
        return array('config_id' => Sabai_Model::KEY_TYPE_INT, 'config_created' => Sabai_Model::KEY_TYPE_INT, 'config_updated' => Sabai_Model::KEY_TYPE_INT, 'config_position' => Sabai_Model::KEY_TYPE_INT, 'config_data' => Sabai_Model::KEY_TYPE_TEXT, 'config_widget_id' => Sabai_Model::KEY_TYPE_INT_NULL, 'config_layout_id' => Sabai_Model::KEY_TYPE_INT_NULL);
    }

    protected function _getSelectByIdQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT %s FROM %sconfig WHERE config_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT %1$s FROM %2$sconfig WHERE %3$s', $fields, $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getInsertQuery(array $values)
    {
        $values['config_created'] = time();
        $values['config_updated'] = 0;
        $values['config_widget_id'] = !empty($values['config_widget_id']) ? intval($values['config_widget_id']) : 'NULL';
        $values['config_layout_id'] = !empty($values['config_layout_id']) ? intval($values['config_layout_id']) : 'NULL';
        return sprintf("INSERT INTO %sconfig(config_created, config_updated, config_position, config_data, config_widget_id, config_layout_id) VALUES(%d, %d, %d, %s, %s, %s)", $this->_db->getResourcePrefix(), $values['config_created'], $values['config_updated'], $values['config_position'], $this->_db->escapeString($values['config_data']), $values['config_widget_id'], $values['config_layout_id']);
    }

    protected function _getUpdateQuery($id, array $values)
    {
        $values['config_widget_id'] = !empty($values['config_widget_id']) ? intval($values['config_widget_id']) : 'NULL';
        $values['config_layout_id'] = !empty($values['config_layout_id']) ? intval($values['config_layout_id']) : 'NULL';
        $last_update = $values['config_updated'];
        $values['config_updated'] = time();
        return sprintf("UPDATE %sconfig SET config_updated = %d, config_position = %d, config_data = %s, config_widget_id = %s, config_layout_id = %s WHERE config_id = %d AND config_updated = %d", $this->_db->getResourcePrefix(), $values['config_updated'], $values['config_position'], $this->_db->escapeString($values['config_data']), $values['config_widget_id'], $values['config_layout_id'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$sconfig WHERE config_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, array $sets)
    {
        $sets['config_updated'] = 'config_updated=' . time();
        return sprintf('UPDATE %sconfig SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$sconfig WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$sconfig WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _afterInsertTrigger1($id, array $new)
    {
    }

    protected function _afterDeleteTrigger1($id, array $old)
    {
    }

    protected function _afterUpdateTrigger1($id, array $new, array $old)
    {
    }

    protected function _afterInsertTrigger($id, array $new)
    {
        $this->_afterInsertTrigger1($id, $new);
    }

    protected function _afterUpdateTrigger($id, array $new, array $old)
    {
        $this->_afterUpdateTrigger1($id, $new, $old);
    }

    protected function _afterDeleteTrigger($id, array $old)
    {
        $this->_afterDeleteTrigger1($id, $old);
    }
}