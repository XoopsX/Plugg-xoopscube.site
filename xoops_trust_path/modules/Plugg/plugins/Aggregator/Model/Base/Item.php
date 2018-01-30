<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/Aggregator/Model/Item.php
*/
abstract class Plugg_Aggregator_Model_Base_Item extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Item', $model);
        $this->_vars = array('item_id' => 0, 'item_created' => 0, 'item_updated' => 0, 'item_title' => null, 'item_url' => null, 'item_body' => null, 'item_author' => null, 'item_author_link' => null, 'item_published' => 0, 'item_categories' => null, 'item_hidden' => 0, 'item_md5' => null, 'item_feed_id' => null);
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

    public function getLabel()
    {
        return $this->getVar('title');
    }

    public function assignFeed(Sabai_Model_Entity $entity)
    {
        if ($entity->getName() != 'Feed') return false;

        return $this->_assignEntity($entity, 'feed_id');
    }

    public function unassignFeed()
    {
        return $this->_unassignEntity('Feed', 'feed_id');
    }

    protected function _fetchFeed()
    {
        return $this->_fetchEntity('Feed', 'feed_id');
    }

    protected function _getVar($name)
    {
        return $this->_vars['item_' . $name];
    }

    protected function _setVar($name, $value)
    {
        switch ($name) {
        case 'id':
            $this->_vars['item_id'] = $value;
            break;
        case 'title':
            $this->_vars['item_title'] = trim($value);
            break;
        case 'url':
            $this->_vars['item_url'] = trim($value);
            break;
        case 'body':
            $this->_vars['item_body'] = trim($value);
            break;
        case 'author':
            $this->_vars['item_author'] = trim($value);
            break;
        case 'author_link':
            $this->_vars['item_author_link'] = trim($value);
            break;
        case 'published':
            $this->_vars['item_published'] = $value;
            break;
        case 'categories':
            $this->_vars['item_categories'] = trim($value);
            break;
        case 'hidden':
            $this->_vars['item_hidden'] = $value;
            break;
        case 'md5':
            $this->_vars['item_md5'] = trim($value);
            break;
        case 'feed_id':
            $this->_vars['item_feed_id'] = $value;
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
        case 'title':
            return $this->getVar('title');
        case 'url':
            return $this->getVar('url');
        case 'body':
            return $this->getVar('body');
        case 'author':
            return $this->getVar('author');
        case 'author_link':
            return $this->getVar('author_link');
        case 'published':
            return $this->getVar('published');
        case 'categories':
            return $this->getVar('categories');
        case 'hidden':
            return $this->getVar('hidden');
        case 'md5':
            return $this->getVar('md5');
        case 'Feed':
            return $this->_fetchFeed();
        }
    }

    public function __set($name, $value)
    {
        switch ($name) {
        case 'title':
            $this->setVar('title', $value);
            break;
        case 'url':
            $this->setVar('url', $value);
            break;
        case 'body':
            $this->setVar('body', $value);
            break;
        case 'author':
            $this->setVar('author', $value);
            break;
        case 'author_link':
            $this->setVar('author_link', $value);
            break;
        case 'published':
            $this->setVar('published', $value);
            break;
        case 'categories':
            $this->setVar('categories', $value);
            break;
        case 'hidden':
            $this->setVar('hidden', $value);
            break;
        case 'md5':
            $this->setVar('md5', $value);
            break;
        case 'Feed':
            $entity = is_array($value) ? $value[0] : $value;
            $this->assignFeed($entity);
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

abstract class Plugg_Aggregator_Model_Base_ItemRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Item', $model);
    }

    public function fetchByFeed($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('item_feed_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByFeed($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('Feed', $id, $perpage, $sort, $order);
    }

    public function countByFeed($id)
    {
        return $this->_countByForeign('item_feed_id', $id);
    }

    public function fetchByFeedAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('item_feed_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByFeedAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('Feed', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByFeedAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('item_feed_id', $id, $criteria);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_Aggregator_Model_Base_ItemsByRowset($rs, $this->_model->create('Item'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_Aggregator_Model_Base_Items($this->_model, $entities);
    }
}

class Plugg_Aggregator_Model_Base_ItemsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Sabai_Model_Entity $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Items', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_Aggregator_Model_Base_Items extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Items', $entities);
    }
}