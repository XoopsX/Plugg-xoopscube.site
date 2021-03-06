<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Xigg/Model/Node2tagGateway.php
*/
abstract class Plugg_Xigg_Model_Base_Node2tagGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'node2tag';
    }

    public function getFields()
    {
        return array('node2tag_id' => Sabai_Model::KEY_TYPE_INT, 'node2tag_created' => Sabai_Model::KEY_TYPE_INT, 'node2tag_updated' => Sabai_Model::KEY_TYPE_INT, 'node2tag_node_id' => Sabai_Model::KEY_TYPE_INT_NULL, 'node2tag_tag_id' => Sabai_Model::KEY_TYPE_INT_NULL);
    }

    public function getSortFields()
    {
        return array('node_id' => Sabai_Model::KEY_TYPE_INT, 'node_created' => Sabai_Model::KEY_TYPE_INT, 'node_updated' => Sabai_Model::KEY_TYPE_INT, 'node_title' => Sabai_Model::KEY_TYPE_VARCHAR, 'node_source' => Sabai_Model::KEY_TYPE_VARCHAR, 'node_source_title' => Sabai_Model::KEY_TYPE_VARCHAR, 'node_body_filter_id' => Sabai_Model::KEY_TYPE_INT, 'node_body' => Sabai_Model::KEY_TYPE_TEXT, 'node_body_html' => Sabai_Model::KEY_TYPE_TEXT, 'node_teaser_filter_id' => Sabai_Model::KEY_TYPE_INT, 'node_teaser' => Sabai_Model::KEY_TYPE_TEXT, 'node_teaser_html' => Sabai_Model::KEY_TYPE_TEXT, 'node_published' => Sabai_Model::KEY_TYPE_INT, 'node_allow_comments' => Sabai_Model::KEY_TYPE_INT, 'node_allow_trackbacks' => Sabai_Model::KEY_TYPE_INT, 'node_allow_edit' => Sabai_Model::KEY_TYPE_INT, 'node_status' => Sabai_Model::KEY_TYPE_INT, 'node_hidden' => Sabai_Model::KEY_TYPE_INT, 'node_priority' => Sabai_Model::KEY_TYPE_INT, 'node_views' => Sabai_Model::KEY_TYPE_INT, 'node_category_id' => Sabai_Model::KEY_TYPE_INT_NULL, 'node_userid' => Sabai_Model::KEY_TYPE_VARCHAR, 'node_comment_count' => Sabai_Model::KEY_TYPE_INT, 'node_comment_last' => Sabai_Model::KEY_TYPE_INT, 'node_comment_lasttime' => Sabai_Model::KEY_TYPE_INT, 'node_trackback_count' => Sabai_Model::KEY_TYPE_INT, 'node_trackback_last' => Sabai_Model::KEY_TYPE_INT, 'node_trackback_lasttime' => Sabai_Model::KEY_TYPE_INT, 'node_vote_count' => Sabai_Model::KEY_TYPE_INT, 'node_vote_last' => Sabai_Model::KEY_TYPE_INT, 'node_vote_lasttime' => Sabai_Model::KEY_TYPE_INT, 'node_view_count' => Sabai_Model::KEY_TYPE_INT, 'node_view_last' => Sabai_Model::KEY_TYPE_INT, 'node_view_lasttime' => Sabai_Model::KEY_TYPE_INT, 'tag_id' => Sabai_Model::KEY_TYPE_INT, 'tag_created' => Sabai_Model::KEY_TYPE_INT, 'tag_updated' => Sabai_Model::KEY_TYPE_INT, 'tag_name' => Sabai_Model::KEY_TYPE_VARCHAR);
    }

    protected function _getSelectByIdQuery($id, array $fields)
    {
        $fields = empty($fields) ? 'node2tag.*, node.*, tag.*' : implode(', ', $fields);
        return sprintf('SELECT %2$s FROM %1$snode2tag node2tag INNER JOIN %1$snode node ON node.node_id = node2tag.node2tag_node_id INNER JOIN %1$stag tag ON tag.tag_id = node2tag.node2tag_tag_id WHERE node2tag.node2tag_id = %3$d', $this->_db->getResourcePrefix(), $fields, $id);
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, array $fields)
    {
        $fields = empty($fields) ? 'node2tag.*, node.*, tag.*' : implode(', ', $fields);
        return sprintf('SELECT %2$s FROM %1$snode2tag node2tag INNER JOIN %1$snode node ON node.node_id = node2tag.node2tag_node_id INNER JOIN %1$stag tag ON tag.tag_id = node2tag.node2tag_tag_id WHERE %3$s', $this->_db->getResourcePrefix(), $fields, $criteriaStr);
    }

    protected function _getInsertQuery(array $values)
    {
        $values['node2tag_created'] = time();
        $values['node2tag_updated'] = 0;
        $values['node2tag_node_id'] = !empty($values['node2tag_node_id']) ? intval($values['node2tag_node_id']) : 'NULL';
        $values['node2tag_tag_id'] = !empty($values['node2tag_tag_id']) ? intval($values['node2tag_tag_id']) : 'NULL';
        return sprintf("INSERT INTO %snode2tag(node2tag_created, node2tag_updated, node2tag_node_id, node2tag_tag_id) VALUES(%d, %d, %s, %s)", $this->_db->getResourcePrefix(), $values['node2tag_created'], $values['node2tag_updated'], $values['node2tag_node_id'], $values['node2tag_tag_id']);
    }

    protected function _getUpdateQuery($id, array $values)
    {
        $values['node2tag_node_id'] = !empty($values['node2tag_node_id']) ? intval($values['node2tag_node_id']) : 'NULL';
        $values['node2tag_tag_id'] = !empty($values['node2tag_tag_id']) ? intval($values['node2tag_tag_id']) : 'NULL';
        $last_update = $values['node2tag_updated'];
        $values['node2tag_updated'] = time();
        return sprintf("UPDATE %snode2tag SET node2tag_updated = %d, node2tag_node_id = %s, node2tag_tag_id = %s WHERE node2tag_id = %d AND node2tag_updated = %d", $this->_db->getResourcePrefix(), $values['node2tag_updated'], $values['node2tag_node_id'], $values['node2tag_tag_id'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$snode2tag WHERE node2tag_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, array $sets)
    {
        $sets['node2tag_updated'] = 'node2tag_updated=' . time();
        return sprintf('UPDATE %snode2tag SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$snode2tag WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$snode2tag node2tag INNER JOIN %1$snode node ON node.node_id = node2tag.node2tag_node_id INNER JOIN %1$stag tag ON tag.tag_id = node2tag.node2tag_tag_id WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
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