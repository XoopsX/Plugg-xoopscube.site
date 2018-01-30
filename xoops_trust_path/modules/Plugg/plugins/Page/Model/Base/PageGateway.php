<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Page/Model/PageGateway.php
*/
require_once 'Sabai/Model/TreeGateway.php';

abstract class Plugg_Page_Model_Base_PageGateway extends Sabai_Model_TreeGateway
{
    public function getName()
    {
        return 'page';
    }

    public function getFields()
    {
        return array('page_id' => Sabai_Model::KEY_TYPE_INT, 'page_created' => Sabai_Model::KEY_TYPE_INT, 'page_updated' => Sabai_Model::KEY_TYPE_INT, 'page_title' => Sabai_Model::KEY_TYPE_VARCHAR, 'page_slug' => Sabai_Model::KEY_TYPE_VARCHAR, 'page_htmlhead' => Sabai_Model::KEY_TYPE_TEXT, 'page_content' => Sabai_Model::KEY_TYPE_TEXT, 'page_content_html' => Sabai_Model::KEY_TYPE_TEXT, 'page_content_filter_id' => Sabai_Model::KEY_TYPE_INT, 'page_allow_edit' => Sabai_Model::KEY_TYPE_INT, 'page_allow_comment' => Sabai_Model::KEY_TYPE_INT, 'page_lock' => Sabai_Model::KEY_TYPE_INT, 'page_nav' => Sabai_Model::KEY_TYPE_INT, 'page_views' => Sabai_Model::KEY_TYPE_INT, 'page_hidden' => Sabai_Model::KEY_TYPE_INT, 'page_parent' => Sabai_Model::KEY_TYPE_INT_NULL, 'page_userid' => Sabai_Model::KEY_TYPE_VARCHAR);
    }
    public function getSortFields()
    {
        return array('page_id' => Sabai_Model::KEY_TYPE_INT, 'page_created' => Sabai_Model::KEY_TYPE_INT, 'page_updated' => Sabai_Model::KEY_TYPE_INT, 'page_title' => Sabai_Model::KEY_TYPE_VARCHAR, 'page_slug' => Sabai_Model::KEY_TYPE_VARCHAR, 'page_htmlhead' => Sabai_Model::KEY_TYPE_TEXT, 'page_content' => Sabai_Model::KEY_TYPE_TEXT, 'page_content_html' => Sabai_Model::KEY_TYPE_TEXT, 'page_content_filter_id' => Sabai_Model::KEY_TYPE_INT, 'page_allow_edit' => Sabai_Model::KEY_TYPE_INT, 'page_allow_comment' => Sabai_Model::KEY_TYPE_INT, 'page_lock' => Sabai_Model::KEY_TYPE_INT, 'page_nav' => Sabai_Model::KEY_TYPE_INT, 'page_views' => Sabai_Model::KEY_TYPE_INT, 'page_hidden' => Sabai_Model::KEY_TYPE_INT, 'page_parent' => Sabai_Model::KEY_TYPE_INT_NULL, 'page_userid' => Sabai_Model::KEY_TYPE_VARCHAR, 't1.tree_left' => Sabai_Model::KEY_TYPE_INT, 't1.tree_right' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT t.%s, t1.tree_left, t1.tree_right FROM %spage t INNER JOIN %2$spage_tree t1 ON t1.tree_id = t.page_id WHERE page_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT t.%1$s, t1.tree_left, t1.tree_right FROM %2$spage t INNER JOIN %2$spage_tree t1 ON t1.tree_id = t.page_id WHERE %3$s', $fields, $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getInsertQuery(array $values)
    {
        $values['page_created'] = time();
        $values['page_updated'] = 0;
        $values['page_parent'] = !empty($values['page_parent']) ? intval($values['page_parent']) : 'NULL';
        return sprintf("INSERT INTO %spage(page_created, page_updated, page_title, page_slug, page_htmlhead, page_content, page_content_html, page_content_filter_id, page_allow_edit, page_allow_comment, page_lock, page_nav, page_views, page_hidden, page_parent, page_userid) VALUES(%d, %d, %s, %s, %s, %s, %s, %d, %d, %d, %d, %d, %d, %d, %s, %s)", $this->_db->getResourcePrefix(), $values['page_created'], $values['page_updated'], $this->_db->escapeString($values['page_title']), $this->_db->escapeString($values['page_slug']), $this->_db->escapeString($values['page_htmlhead']), $this->_db->escapeString($values['page_content']), $this->_db->escapeString($values['page_content_html']), $values['page_content_filter_id'], $values['page_allow_edit'], $values['page_allow_comment'], $values['page_lock'], $values['page_nav'], $values['page_views'], $values['page_hidden'], $values['page_parent'], $this->_db->escapeString($values['page_userid']));
    }

    protected function _getUpdateQuery($id, array $values)
    {
        $values['page_parent'] = !empty($values['page_parent']) ? intval($values['page_parent']) : 'NULL';
        $last_update = $values['page_updated'];
        $values['page_updated'] = time();
        return sprintf("UPDATE %spage SET page_updated = %d, page_title = %s, page_slug = %s, page_htmlhead = %s, page_content = %s, page_content_html = %s, page_content_filter_id = %d, page_allow_edit = %d, page_allow_comment = %d, page_lock = %d, page_nav = %d, page_views = %d, page_hidden = %d, page_parent = %s, page_userid = %s WHERE page_id = %d AND page_updated = %d", $this->_db->getResourcePrefix(), $values['page_updated'], $this->_db->escapeString($values['page_title']), $this->_db->escapeString($values['page_slug']), $this->_db->escapeString($values['page_htmlhead']), $this->_db->escapeString($values['page_content']), $this->_db->escapeString($values['page_content_html']), $values['page_content_filter_id'], $values['page_allow_edit'], $values['page_allow_comment'], $values['page_lock'], $values['page_nav'], $values['page_views'], $values['page_hidden'], $values['page_parent'], $this->_db->escapeString($values['page_userid']), $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$spage WHERE page_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, array $sets)
    {
        $sets['page_updated'] = 'page_updated=' . time();
        return sprintf('UPDATE %spage SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$spage WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$spage WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    public function selectByIdFromMainTable($id, array $fields = array())
    {
        $fields = empty($fields) ? '*' : implode(',', $fields);
        $sql = sprintf('SELECT %s FROM %spage WHERE page_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
        return $this->_db->query($sql);
    }

    protected function _getSelectDescendantsQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t3.', $fields);
        return sprintf('SELECT t3.%3$s, t1.tree_left, t1.tree_right FROM %1$spage_tree t1 INNER JOIN %1$spage_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right INNER JOIN %1$spage t3 ON t1.tree_id = t3.page_id WHERE t2.tree_id = %2$d AND t1.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id, $fields);
    }

    protected function _getSelectDescendantsAsTreeQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t3.', $fields);
        return sprintf('SELECT t3.%3$s, t1.tree_left, t1.tree_right, levels.level FROM %1$spage_tree t1 INNER JOIN %1$spage_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right INNER JOIN %1$spage t3 ON t1.tree_id = t3.page_id INNER JOIN (SELECT t4.tree_id, COUNT(*) AS level FROM %1$spage_tree t4 INNER JOIN %1$spage_tree t5 ON t4.tree_left BETWEEN t5.tree_left AND t5.tree_right GROUP BY t4.tree_id) AS levels ON t3.page_id = levels.tree_id WHERE t2.tree_id = %2$d AND t1.tree_id <> %2$d GROUP BY page_id', $this->_db->getResourcePrefix(), $id, $fields);
    }

    protected function _getCountDescendantsQuery($id)
    {
        return sprintf('SELECT COUNT(*) FROM %1$spage_tree t1 INNER JOIN %1$spage_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t2.tree_id = %2$d AND t1.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getCountDescendantsByIdsQuery($ids)
    {
        return sprintf('SELECT t2.tree_id, COUNT(*) - 1 FROM %1$spage_tree t1 INNER JOIN %1$spage_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t2.tree_id IN(%2$s) GROUP BY t2.tree_id', $this->_db->getResourcePrefix(), implode(',', $ids));
    }

    protected function _getSelectParentsQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t3.', $fields);
        return sprintf('SELECT t3.%3$s, t2.tree_left, t2.tree_right FROM %1$spage_tree t1 INNER JOIN %1$spage_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right INNER JOIN %1$spage t3 ON t2.tree_id = t3.page_id WHERE t1.tree_id = %2$d AND t2.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id, $fields);
    }

    protected function _getCountParentsQuery($id)
    {
        return sprintf('SELECT COUNT(*) FROM %1$spage_tree t1 INNER JOIN %1$spage_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t1.tree_id = %2$d AND t2.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getCountParentsByIdsQuery($ids)
    {
        return sprintf('SELECT t1.tree_id, COUNT(*) - 1 FROM %1$spage_tree t1 INNER JOIN %1$spage_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t1.tree_id IN(%2$s) GROUP BY t1.tree_id', $this->_db->getResourcePrefix(), implode(',', $ids));
    }

    protected function _afterInsertTrigger1($id, array $new)
    {
        if (!empty($new['page_parent'])) {
            $sql = sprintf('SELECT tree_right FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $new['page_parent']);
            if ($rs = $this->_db->query($sql)) {
                $value_right = $rs->fetchSingle();
                $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_left = tree_left + 2 WHERE tree_left > %d', $this->_db->getResourcePrefix(), $value_right));
                $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_right = tree_right + 2 WHERE tree_right >= %d', $this->_db->getResourcePrefix(), $value_right));
                $this->_db->exec(sprintf('INSERT INTO %spage_tree(tree_id, tree_left, tree_right) VALUES (%d, %d, %d)', $this->_db->getResourcePrefix(), $new['page_id'], $value_right, $value_right + 1));
            }
        } else {
            $sql = sprintf('SELECT MAX(tree_right) FROM %spage_tree', $this->_db->getResourcePrefix());
            if ($rs = $this->_db->query($sql)) {
                $value_right = $rs->fetchSingle();
                $this->_db->exec(sprintf('INSERT INTO %spage_tree(tree_id, tree_left, tree_right) VALUES (%d, %d, %d)', $this->_db->getResourcePrefix(), $new['page_id'], $value_right + 1, $value_right + 2));
            }
        }
    }

    protected function _beforeDeleteTrigger1($id, array $old)
    {
        $sql = sprintf('SELECT tree_left, tree_right FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['page_id']);
        if (!$rs = $this->_db->query($sql)) {
            return false;
        }
        list($value_left, $value_right) = $rs->fetchRow();
        if ($value_right - $value_left > 1) {
            // Cannot remove entity with child entities
            return false;
        }
        return true;
    }

    protected function _afterDeleteTrigger1($id, array $old)
    {
        $sql = sprintf('SELECT tree_left, tree_right FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['page_id']);
        if ($rs = $this->_db->query($sql)) {
            list($value_left, $value_right) = $rs->fetchRow();
            $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_left = tree_left - 2 WHERE tree_left > %d', $this->_db->getResourcePrefix(), $value_left));
            $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_right = tree_right - 2 WHERE tree_right > %d', $this->_db->getResourcePrefix(), $value_right));
            $this->_db->exec(sprintf('DELETE FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['page_id']));
        }
    }

    protected function _beforeUpdateTrigger1($id, array $new, array $old)
    {
        if (!empty($new['page_parent'])) {
            if ($new['page_parent'] == $new['page_id']) {
                // Cannot assign itself as the parent entity
                return false;
            }
            $sql = sprintf('SELECT tree_left, tree_right FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['page_id']);
            if (!$rs = $this->_db->query($sql)) {
                return false;
            }
            list($old_left, $old_right) = $rs->fetchRow();
            $sql = sprintf('SELECT tree_left FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $new['page_parent']);
            if (!$rs = $this->_db->query($sql)) {
                return false;
            }
            $new_parent_left = $rs->fetchSingle();
            if ($new_parent_left > $old_left && $new_parent_left < $old_right) {
                // Cannot assign descendant as the parent entity
                return false;
            }
        }
        return true;
    }

    protected function _afterUpdateTrigger1($id, array $new, array $old)
    {
        if (!empty($new['page_parent'])) {
            if (empty($old['page_parent']) || $new['page_parent'] != $old['page_parent']) {
                $sql = sprintf('SELECT tree_left, tree_right FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['page_id']);
                if ($rs = $this->_db->query($sql)) {
                    list($value_left, $value_right) = $rs->fetchRow();
                    $sql = sprintf('SELECT MAX(tree_right) + 1 FROM %spage_tree', $this->_db->getResourcePrefix());
                    if ($rs = $this->_db->query($sql)) {
                        $temp_left = $rs->fetchSingle();
                        $value_between = $value_right - $value_left + 1;
                        $this->_db->exec(sprintf('UPDATE %4$spage_tree SET tree_left = tree_left + %1$d - %2$d, tree_right = tree_right + %1$d - %2$d WHERE tree_left BETWEEN %2$d AND %3$d', $temp_left, $value_left, $value_right, $this->_db->getResourcePrefix()));
                        $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_left = tree_left - %d WHERE tree_left > %d AND tree_right < %d', $this->_db->getResourcePrefix(), $value_between, $value_right, $temp_left));
                        $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_right = tree_right - %d WHERE tree_right > %d AND tree_right < %d', $this->_db->getResourcePrefix(), $value_between, $value_right, $temp_left));
                        $sql = sprintf('SELECT tree_right FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $new['page_parent']);
                        if ($rs = $this->_db->query($sql)) {
                            $new_parent_right = $rs->fetchSingle();
                            $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_left = tree_left + %d WHERE tree_left > %d AND tree_left < %d', $this->_db->getResourcePrefix(), $value_between, $new_parent_right, $temp_left));
                            $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_right = tree_right + %d WHERE tree_right >= %d AND tree_left < %d', $this->_db->getResourcePrefix(), $value_between, $new_parent_right, $temp_left));
                            $value_diff = $new_parent_right - $temp_left;
                            $this->_db->exec(sprintf('UPDATE %3$spage_tree SET tree_left = tree_left + %1$d, tree_right = tree_right + %1$d WHERE tree_left >= %2$d', $value_diff, $temp_left, $this->_db->getResourcePrefix()));
                        }
                    }
                }
            }
        } else {
            if (!empty($old['page_parent'])) {
                $sql = sprintf('SELECT tree_left, tree_right FROM %spage_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['page_id']);
                if ($rs = $this->_db->query($sql)) {
                    list($value_left, $value_right) = $rs->fetchRow();
                    $sql = sprintf('SELECT MAX(tree_right) + 1 FROM %spage_tree', $this->_db->getResourcePrefix());
                    if ($rs = $this->_db->query($sql)) {
                        $temp_left = $rs->fetchSingle();
                        $value_diff = $temp_left - $value_left;
                        $this->_db->exec(sprintf('UPDATE %4$spage_tree SET tree_left = tree_left + %1$d, tree_right = tree_right + %1$d WHERE tree_left BETWEEN %2$d AND %3$d', $value_diff, $value_left, $value_right, $this->_db->getResourcePrefix()));
                        $value_between = $value_right - $value_left + 1;
                        $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_left = tree_left - %d WHERE tree_left > %d', $this->_db->getResourcePrefix(), $value_between, $value_right));
                        $this->_db->exec(sprintf('UPDATE %spage_tree SET tree_right = tree_right - %d WHERE tree_right > %d', $this->_db->getResourcePrefix(), $value_between, $value_right));
                    }
                }
            }
        }
    }

    protected function _afterInsertTrigger($id, array $new)
    {
        $this->_afterInsertTrigger1($id, $new);
    }

    protected function _beforeUpdateTrigger($id, array $new, array $old)
    {
        if (!$this->_beforeUpdateTrigger1($id, $new, $old)) return false;
        return true;
    }

    protected function _afterUpdateTrigger($id, array $new, array $old)
    {
        $this->_afterUpdateTrigger1($id, $new, $old);
    }

    protected function _beforeDeleteTrigger($id, array $old)
    {
        if (!$this->_beforeDeleteTrigger1($id, $old)) return false;
        return true;
    }

    protected function _afterDeleteTrigger($id, array $old)
    {
        $this->_afterDeleteTrigger1($id, $old);
    }
}