<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/Xigg/Model/Node2tag.php
*/
abstract class Plugg_Xigg_Model_Base_Node2tag extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Node2tag', $model);
        $this->_vars = array('node2tag_id' => 0, 'node2tag_created' => 0, 'node2tag_updated' => 0, 'node2tag_node_id' => null, 'node2tag_tag_id' => null);
    }

    public function getId()
    {
        return $this->getVar('id');
    }

    public function setId($value)
    {
        $this->setVar('id', $value);
    }

    public function getTimeCreated()
    {
        return $this->getVar('created');
    }

    public function getTimeUpdated()
    {
        return $this->getVar('updated');
    }

    public function assignNode(Sabai_Model_Entity $entity)
    {
        if ($entity->getName() != 'Node') return false;

        return $this->_assignEntity($entity, 'node_id');
    }

    public function unassignNode()
    {
        return $this->_unassignEntity('Node', 'node_id');
    }

    protected function _fetchNode()
    {
        return $this->_fetchEntity('Node', 'node_id');
    }

    public function assignTag(Sabai_Model_Entity $entity)
    {
        if ($entity->getName() != 'Tag') return false;

        return $this->_assignEntity($entity, 'tag_id');
    }

    public function unassignTag()
    {
        return $this->_unassignEntity('Tag', 'tag_id');
    }

    protected function _fetchTag()
    {
        return $this->_fetchEntity('Tag', 'tag_id');
    }

    protected function _getVar($name)
    {
        return $this->_vars['node2tag_' . $name];
    }

    protected function _setVar($name, $value)
    {
        switch ($name) {
        case 'id':
            $this->_vars['node2tag_id'] = $value;
            break;
        case 'node_id':
            $this->_vars['node2tag_node_id'] = $value;
            break;
        case 'tag_id':
            $this->_vars['node2tag_tag_id'] = $value;
            break;
        default:
            trigger_error(sprintf('Error trying to set value for variable %s. This variable is either read-only or does not exist for this entity', $name), E_USER_WARNING);
            return false;
        }
        return true;
    }

    protected function _get($name, $sort, $order)
    {
        switch ($name) {
        case 'Node':
            return $this->_fetchNode();
        case 'Tag':
            return $this->_fetchTag();
        }
    }

    public function __set($name, $value)
    {
        switch ($name) {
        case 'Node':
            $entity = is_array($value) ? $value[0] : $value;
            $this->assignNode($entity);
            break;
        case 'Tag':
            $entity = is_array($value) ? $value[0] : $value;
            $this->assignTag($entity);
            break;
        }
    }

    public function initVar($name, $value)
    {
        switch ($name) {
        default:
            $this->_vars[$name] = $value;
            break;
        }
    }
}

abstract class Plugg_Xigg_Model_Base_Node2tagRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Node2tag', $model);
    }

    public function fetchByNode($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('node2tag_node_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByNode($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('Node', $id, $perpage, $sort, $order);
    }

    public function countByNode($id)
    {
        return $this->_countByForeign('node2tag_node_id', $id);
    }

    public function fetchByNodeAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('node2tag_node_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByNodeAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('Node', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByNodeAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('node2tag_node_id', $id, $criteria);
    }

    public function fetchByTag($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('node2tag_tag_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByTag($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('Tag', $id, $perpage, $sort, $order);
    }

    public function countByTag($id)
    {
        return $this->_countByForeign('node2tag_tag_id', $id);
    }

    public function fetchByTagAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('node2tag_tag_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByTagAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('Tag', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByTagAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('node2tag_tag_id', $id, $criteria);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_Xigg_Model_Base_Node2tagsByRowset($rs, $this->_model->create('Node2tag'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_Xigg_Model_Base_Node2tags($this->_model, $entities);
    }
}

class Plugg_Xigg_Model_Base_Node2tagsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Sabai_Model_Entity $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Node2tags', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $arr['node2tag_id'] = $row['node2tag_id'];
        $arr['node2tag_created'] = $row['node2tag_created'];
        $arr['node2tag_updated'] = $row['node2tag_updated'];
        $arr['node2tag_node_id'] = $row['node2tag_node_id'];
        $arr['node2tag_tag_id'] = $row['node2tag_tag_id'];
        $entity->initVars($arr);
        if (isset($row['node_id'])) {
            $node['node_id'] = $row['node_id'];
            $node['node_created'] = $row['node_created'];
            $node['node_updated'] = $row['node_updated'];
            $node['node_title'] = $row['node_title'];
            $node['node_source'] = $row['node_source'];
            $node['node_source_title'] = $row['node_source_title'];
            $node['node_body_filter_id'] = $row['node_body_filter_id'];
            $node['node_body'] = $row['node_body'];
            $node['node_body_html'] = $row['node_body_html'];
            $node['node_teaser_filter_id'] = $row['node_teaser_filter_id'];
            $node['node_teaser'] = $row['node_teaser'];
            $node['node_teaser_html'] = $row['node_teaser_html'];
            $node['node_published'] = $row['node_published'];
            $node['node_allow_comments'] = $row['node_allow_comments'];
            $node['node_allow_trackbacks'] = $row['node_allow_trackbacks'];
            $node['node_allow_edit'] = $row['node_allow_edit'];
            $node['node_status'] = $row['node_status'];
            $node['node_hidden'] = $row['node_hidden'];
            $node['node_priority'] = $row['node_priority'];
            $node['node_views'] = $row['node_views'];
            $node['node_category_id'] = $row['node_category_id'];
            $node['node_userid'] = $row['node_userid'];
            $node['node_comment_count'] = $row['node_comment_count'];
            $node['node_comment_last'] = $row['node_comment_last'];
            $node['node_comment_lasttime'] = $row['node_comment_lasttime'];
            $node['node_trackback_count'] = $row['node_trackback_count'];
            $node['node_trackback_last'] = $row['node_trackback_last'];
            $node['node_trackback_lasttime'] = $row['node_trackback_lasttime'];
            $node['node_vote_count'] = $row['node_vote_count'];
            $node['node_vote_last'] = $row['node_vote_last'];
            $node['node_vote_lasttime'] = $row['node_vote_lasttime'];
            $node['node_view_count'] = $row['node_view_count'];
            $node['node_view_last'] = $row['node_view_last'];
            $node['node_view_lasttime'] = $row['node_view_lasttime'];
            $Node = $this->_model->create('Node');
            $Node->initVars($node);
            $Node->cache();
        }
        if (isset($row['tag_id'])) {
            $tag['tag_id'] = $row['tag_id'];
            $tag['tag_created'] = $row['tag_created'];
            $tag['tag_updated'] = $row['tag_updated'];
            $tag['tag_name'] = $row['tag_name'];
            $Tag = $this->_model->create('Tag');
            $Tag->initVars($tag);
            $Tag->cache();
        }
    }
}

class Plugg_Xigg_Model_Base_Node2tags extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Node2tags', $entities);
    }
}