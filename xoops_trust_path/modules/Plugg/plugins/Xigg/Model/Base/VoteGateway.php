<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Xigg/Model/VoteGateway.php
*/
abstract class Plugg_Xigg_Model_Base_VoteGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'vote';
    }

    public function getFields()
    {
        return array('vote_id' => Sabai_Model::KEY_TYPE_INT, 'vote_created' => Sabai_Model::KEY_TYPE_INT, 'vote_updated' => Sabai_Model::KEY_TYPE_INT, 'vote_score' => Sabai_Model::KEY_TYPE_INT, 'vote_ip' => Sabai_Model::KEY_TYPE_CHAR, 'vote_node_id' => Sabai_Model::KEY_TYPE_INT_NULL, 'vote_userid' => Sabai_Model::KEY_TYPE_VARCHAR);
    }

    protected function _getSelectByIdQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT %s FROM %svote WHERE vote_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT %1$s FROM %2$svote WHERE %3$s', $fields, $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getInsertQuery(array $values)
    {
        $values['vote_created'] = time();
        $values['vote_updated'] = 0;
        $values['vote_node_id'] = !empty($values['vote_node_id']) ? intval($values['vote_node_id']) : 'NULL';
        return sprintf("INSERT INTO %svote(vote_created, vote_updated, vote_score, vote_ip, vote_node_id, vote_userid) VALUES(%d, %d, %d, %s, %s, %s)", $this->_db->getResourcePrefix(), $values['vote_created'], $values['vote_updated'], $values['vote_score'], $this->_db->escapeString($values['vote_ip']), $values['vote_node_id'], $this->_db->escapeString($values['vote_userid']));
    }

    protected function _getUpdateQuery($id, array $values)
    {
        $values['vote_node_id'] = !empty($values['vote_node_id']) ? intval($values['vote_node_id']) : 'NULL';
        $last_update = $values['vote_updated'];
        $values['vote_updated'] = time();
        return sprintf("UPDATE %svote SET vote_updated = %d, vote_score = %d, vote_ip = %s, vote_node_id = %s, vote_userid = %s WHERE vote_id = %d AND vote_updated = %d", $this->_db->getResourcePrefix(), $values['vote_updated'], $values['vote_score'], $this->_db->escapeString($values['vote_ip']), $values['vote_node_id'], $this->_db->escapeString($values['vote_userid']), $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$svote WHERE vote_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, array $sets)
    {
        $sets['vote_updated'] = 'vote_updated=' . time();
        return sprintf('UPDATE %svote SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$svote WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$svote WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _afterInsertTrigger1($id, array $new)
    {
        if (!empty($new['vote_node_id'])) {
            $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count + 1, node_vote_last = %d, node_vote_lasttime = %d WHERE node_id = %d', $this->_db->getResourcePrefix(), $id, $new['vote_created'], $new['vote_node_id']));
        }
    }

    protected function _afterDeleteTrigger1($id, array $old)
    {
        if (!empty($old['vote_node_id'])) {
            $sql = sprintf('SELECT vote_id, vote_created FROM %svote WHERE vote_node_id = %d ORDER BY vote_created DESC', $this->_db->getResourcePrefix(), $old['vote_node_id']);
            if (($rs = $this->_db->query($sql, 1, 0)) && ($rs->rowCount() > 0)) {
                $row = $rs->fetchAssoc();
                $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count - 1, node_vote_last = %d, node_vote_lasttime = %d WHERE node_id = %d', $this->_db->getResourcePrefix(), $row['vote_id'], $row['vote_created'], $old['vote_node_id']));
            } else {
                $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count - 1, node_vote_last = 0, node_vote_lasttime = node_created WHERE node_id = %d', $this->_db->getResourcePrefix(), $old['vote_node_id']));
            }
        }
    }

    protected function _afterUpdateTrigger1($id, array $new, array $old)
    {
        if (empty($old['vote_node_id']) && !empty($new['vote_node_id'])) {
            $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count + 1, node_vote_last = %d, node_vote_lasttime = %d WHERE node_id = %d', $this->_db->getResourcePrefix(), $id, $new['vote_created'], $new['vote_node_id']));
        } elseif (!empty($old['vote_node_id']) && empty($new['vote_node_id'])) {
            $sql = sprintf('SELECT vote_id, vote_created FROM %svote WHERE vote_node_id = %d ORDER BY vote_created DESC', $this->_db->getResourcePrefix(), $old['vote_node_id']);
            if (($rs = $this->_db->query($sql, 1, 0)) && ($rs->rowCount() > 0)) {
                $row = $rs->fetchAssoc();
                $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count - 1, node_vote_last = %d, node_vote_lasttime = %d WHERE node_id = %d', $this->_db->getResourcePrefix(), $row['vote_id'], $row['vote_created'], $old['vote_node_id']));
            } else {
                $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count - 1, node_vote_last = 0, node_vote_lasttime = node_created WHERE node_id = %d', $this->_db->getResourcePrefix(), $old['vote_node_id']));
            }
        } elseif ($old['vote_node_id'] != $new['vote_node_id']) {
            $sql = sprintf('SELECT vote_id, vote_created FROM %svote WHERE vote_node_id = %d ORDER BY vote_created DESC', $this->_db->getResourcePrefix(), $old['vote_node_id']);
            if (($rs = $this->_db->query($sql, 1, 0)) && ($rs->rowCount() > 0)) {
                $row = $rs->fetchAssoc();
                $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count - 1, node_vote_last = %d, node_vote_lasttime = %d WHERE node_id = %d', $this->_db->getResourcePrefix(), $row['vote_id'], $row['vote_created'], $old['vote_node_id']));
            } else {
                $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count - 1, node_vote_last = 0, node_vote_lasttime = node_created WHERE node_id = %d', $this->_db->getResourcePrefix(), $old['vote_node_id']));
            }
            $this->_db->exec(sprintf('UPDATE %snode SET node_vote_count = node_vote_count + 1, node_vote_last = %d, node_vote_lasttime = %d WHERE node_id = %d', $this->_db->getResourcePrefix(), $id, $new['vote_created'], $new['vote_node_id']));
        }
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