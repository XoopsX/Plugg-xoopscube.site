<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Gender/Model/GenderGateway.php
*/
abstract class Plugg_Gender_Model_Base_GenderGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'gender';
    }

    public function getFields()
    {
        return array('gender_id' => Sabai_Model::KEY_TYPE_INT, 'gender_created' => Sabai_Model::KEY_TYPE_INT, 'gender_updated' => Sabai_Model::KEY_TYPE_INT, 'gender_gender' => Sabai_Model::KEY_TYPE_INT, 'gender_userid' => Sabai_Model::KEY_TYPE_VARCHAR);
    }

    protected function _getSelectByIdQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT %s FROM %sgender WHERE gender_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT %1$s FROM %2$sgender WHERE %3$s', $fields, $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getInsertQuery(array $values)
    {
        $values['gender_created'] = time();
        $values['gender_updated'] = 0;
        return sprintf("INSERT INTO %sgender(gender_created, gender_updated, gender_gender, gender_userid) VALUES(%d, %d, %d, %s)", $this->_db->getResourcePrefix(), $values['gender_created'], $values['gender_updated'], $values['gender_gender'], $this->_db->escapeString($values['gender_userid']));
    }

    protected function _getUpdateQuery($id, array $values)
    {
        $last_update = $values['gender_updated'];
        $values['gender_updated'] = time();
        return sprintf("UPDATE %sgender SET gender_updated = %d, gender_gender = %d, gender_userid = %s WHERE gender_id = %d AND gender_updated = %d", $this->_db->getResourcePrefix(), $values['gender_updated'], $values['gender_gender'], $this->_db->escapeString($values['gender_userid']), $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$sgender WHERE gender_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, array $sets)
    {
        $sets['gender_updated'] = 'gender_updated=' . time();
        return sprintf('UPDATE %sgender SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$sgender WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$sgender WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }
}