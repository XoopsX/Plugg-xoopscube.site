<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Widget/Model/QueueGateway.php
*/
abstract class Plugg_Widget_Model_Base_QueueGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'queue';
    }

    public function getFields()
    {
        return array('queue_id' => Sabai_Model::KEY_TYPE_INT, 'queue_created' => Sabai_Model::KEY_TYPE_INT, 'queue_updated' => Sabai_Model::KEY_TYPE_INT, 'queue_data' => Sabai_Model::KEY_TYPE_TEXT, 'queue_key' => Sabai_Model::KEY_TYPE_CHAR, 'queue_type' => Sabai_Model::KEY_TYPE_INT, 'queue_notify_email' => Sabai_Model::KEY_TYPE_VARCHAR, 'queue_identity_id' => Sabai_Model::KEY_TYPE_VARCHAR, 'queue_auth_data' => Sabai_Model::KEY_TYPE_TEXT, 'queue_extra_data' => Sabai_Model::KEY_TYPE_TEXT, 'queue_register_username' => Sabai_Model::KEY_TYPE_VARCHAR);
    }

    protected function _getSelectByIdQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t.', $fields);
        return sprintf('SELECT t.%s FROM %squeue t WHERE queue_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t.', $fields);
        return sprintf('SELECT t.%1$s FROM %2$squeue t WHERE %3$s', $fields, $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getInsertQuery(array $values)
    {
        $values['queue_created'] = time();
        $values['queue_updated'] = 0;
        return sprintf("INSERT INTO %squeue(queue_created, queue_updated, queue_data, queue_key, queue_type, queue_notify_email, queue_identity_id, queue_auth_data, queue_extra_data, queue_register_username) VALUES(%d, %d, %s, %s, %d, %s, %s, %s, %s, %s)", $this->_db->getResourcePrefix(), $values['queue_created'], $values['queue_updated'], $this->_db->escapeString($values['queue_data']), $this->_db->escapeString($values['queue_key']), $values['queue_type'], $this->_db->escapeString($values['queue_notify_email']), $this->_db->escapeString($values['queue_identity_id']), $this->_db->escapeString($values['queue_auth_data']), $this->_db->escapeString($values['queue_extra_data']), $this->_db->escapeString($values['queue_register_username']));
    }

    protected function _getUpdateQuery($id, array $values)
    {
        $last_update = $values['queue_updated'];
        $values['queue_updated'] = time();
        return sprintf("UPDATE %squeue SET queue_updated = %d, queue_data = %s, queue_key = %s, queue_type = %d, queue_notify_email = %s, queue_identity_id = %s, queue_auth_data = %s, queue_extra_data = %s, queue_register_username = %s WHERE queue_id = %d AND queue_updated = %d", $this->_db->getResourcePrefix(), $values['queue_updated'], $this->_db->escapeString($values['queue_data']), $this->_db->escapeString($values['queue_key']), $values['queue_type'], $this->_db->escapeString($values['queue_notify_email']), $this->_db->escapeString($values['queue_identity_id']), $this->_db->escapeString($values['queue_auth_data']), $this->_db->escapeString($values['queue_extra_data']), $this->_db->escapeString($values['queue_register_username']), $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$squeue WHERE queue_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, array $sets)
    {
        $sets['queue_updated'] = 'queue_updated=' . time();
        return sprintf('UPDATE %squeue SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$squeue WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$squeue WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }
}