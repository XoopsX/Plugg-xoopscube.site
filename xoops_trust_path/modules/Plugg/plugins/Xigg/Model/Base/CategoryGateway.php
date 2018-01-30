<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Xigg/Model/CategoryGateway.php
*/
require_once 'Sabai/Model/TreeGateway.php';

abstract class Plugg_Xigg_Model_Base_CategoryGateway extends Sabai_Model_TreeGateway
{
    public function getName()
    {
        return 'category';
    }

    public function getFields()
    {
        return array('category_id' => Sabai_Model::KEY_TYPE_INT, 'category_created' => Sabai_Model::KEY_TYPE_INT, 'category_updated' => Sabai_Model::KEY_TYPE_INT, 'category_name' => Sabai_Model::KEY_TYPE_VARCHAR, 'category_description' => Sabai_Model::KEY_TYPE_TEXT, 'category_parent' => Sabai_Model::KEY_TYPE_INT_NULL, 'category_node_count' => Sabai_Model::KEY_TYPE_INT, 'category_node_last' => Sabai_Model::KEY_TYPE_INT, 'category_node_lasttime' => Sabai_Model::KEY_TYPE_INT);
    }
    public function getSortFields()
    {
        return array('category_id' => Sabai_Model::KEY_TYPE_INT, 'category_created' => Sabai_Model::KEY_TYPE_INT, 'category_updated' => Sabai_Model::KEY_TYPE_INT, 'category_name' => Sabai_Model::KEY_TYPE_VARCHAR, 'category_description' => Sabai_Model::KEY_TYPE_TEXT, 'category_parent' => Sabai_Model::KEY_TYPE_INT_NULL, 'category_node_count' => Sabai_Model::KEY_TYPE_INT, 'category_node_last' => Sabai_Model::KEY_TYPE_INT, 'category_node_lasttime' => Sabai_Model::KEY_TYPE_INT, 't1.tree_left' => Sabai_Model::KEY_TYPE_INT, 't1.tree_right' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT t.%s, t1.tree_left, t1.tree_right FROM %scategory t INNER JOIN %2$scategory_tree t1 ON t1.tree_id = t.category_id WHERE category_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        return sprintf('SELECT t.%1$s, t1.tree_left, t1.tree_right FROM %2$scategory t INNER JOIN %2$scategory_tree t1 ON t1.tree_id = t.category_id WHERE %3$s', $fields, $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getInsertQuery(array $values)
    {
        $values['category_created'] = time();
        $values['category_updated'] = 0;
        $values['category_node_lasttime'] = $values['category_created'];
        $values['category_parent'] = !empty($values['category_parent']) ? intval($values['category_parent']) : 'NULL';
        return sprintf("INSERT INTO %scategory(category_created, category_updated, category_name, category_description, category_parent, category_node_count, category_node_last, category_node_lasttime) VALUES(%d, %d, %s, %s, %s, %d, %d, %d)", $this->_db->getResourcePrefix(), $values['category_created'], $values['category_updated'], $this->_db->escapeString($values['category_name']), $this->_db->escapeString($values['category_description']), $values['category_parent'], $values['category_node_count'], $values['category_node_last'], $values['category_node_lasttime']);
    }

    protected function _getUpdateQuery($id, array $values)
    {
        $values['category_parent'] = !empty($values['category_parent']) ? intval($values['category_parent']) : 'NULL';
        $last_update = $values['category_updated'];
        $values['category_updated'] = time();
        return sprintf("UPDATE %scategory SET category_updated = %d, category_name = %s, category_description = %s, category_parent = %s, category_node_count = %d, category_node_last = %d, category_node_lasttime = %d WHERE category_id = %d AND category_updated = %d", $this->_db->getResourcePrefix(), $values['category_updated'], $this->_db->escapeString($values['category_name']), $this->_db->escapeString($values['category_description']), $values['category_parent'], $values['category_node_count'], $values['category_node_last'], $values['category_node_lasttime'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$scategory WHERE category_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, array $sets)
    {
        $sets['category_updated'] = 'category_updated=' . time();
        return sprintf('UPDATE %scategory SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$scategory WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$scategory WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    public function selectByIdFromMainTable($id, array $fields = array())
    {
        $fields = empty($fields) ? '*' : implode(',', $fields);
        $sql = sprintf('SELECT %s FROM %scategory WHERE category_id = %d', $fields, $this->_db->getResourcePrefix(), $id);
        return $this->_db->query($sql);
    }

    protected function _getSelectDescendantsQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t3.', $fields);
        return sprintf('SELECT t3.%3$s, t1.tree_left, t1.tree_right FROM %1$scategory_tree t1 INNER JOIN %1$scategory_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right INNER JOIN %1$scategory t3 ON t1.tree_id = t3.category_id WHERE t2.tree_id = %2$d AND t1.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id, $fields);
    }

    protected function _getSelectDescendantsAsTreeQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t3.', $fields);
        return sprintf('SELECT t3.%3$s, t1.tree_left, t1.tree_right, levels.level FROM %1$scategory_tree t1 INNER JOIN %1$scategory_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right INNER JOIN %1$scategory t3 ON t1.tree_id = t3.category_id INNER JOIN (SELECT t4.tree_id, COUNT(*) AS level FROM %1$scategory_tree t4 INNER JOIN %1$scategory_tree t5 ON t4.tree_left BETWEEN t5.tree_left AND t5.tree_right GROUP BY t4.tree_id) AS levels ON t3.category_id = levels.tree_id WHERE t2.tree_id = %2$d AND t1.tree_id <> %2$d GROUP BY category_id', $this->_db->getResourcePrefix(), $id, $fields);
    }

    protected function _getCountDescendantsQuery($id)
    {
        return sprintf('SELECT COUNT(*) FROM %1$scategory_tree t1 INNER JOIN %1$scategory_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t2.tree_id = %2$d AND t1.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getCountDescendantsByIdsQuery($ids)
    {
        return sprintf('SELECT t2.tree_id, COUNT(*) - 1 FROM %1$scategory_tree t1 INNER JOIN %1$scategory_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t2.tree_id IN(%2$s) GROUP BY t2.tree_id', $this->_db->getResourcePrefix(), implode(',', $ids));
    }

    protected function _getSelectParentsQuery($id, array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', t3.', $fields);
        return sprintf('SELECT t3.%3$s, t2.tree_left, t2.tree_right FROM %1$scategory_tree t1 INNER JOIN %1$scategory_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right INNER JOIN %1$scategory t3 ON t2.tree_id = t3.category_id WHERE t1.tree_id = %2$d AND t2.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id, $fields);
    }

    protected function _getCountParentsQuery($id)
    {
        return sprintf('SELECT COUNT(*) FROM %1$scategory_tree t1 INNER JOIN %1$scategory_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t1.tree_id = %2$d AND t2.tree_id <> %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getCountParentsByIdsQuery($ids)
    {
        return sprintf('SELECT t1.tree_id, COUNT(*) - 1 FROM %1$scategory_tree t1 INNER JOIN %1$scategory_tree t2 ON t1.tree_left BETWEEN t2.tree_left AND t2.tree_right WHERE t1.tree_id IN(%2$s) GROUP BY t1.tree_id', $this->_db->getResourcePrefix(), implode(',', $ids));
    }

    protected function _afterInsertTrigger1($id, array $new)
    {
        if (!empty($new['category_parent'])) {
            $sql = sprintf('SELECT tree_right FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $new['category_parent']);
            if ($rs = $this->_db->query($sql)) {
                $value_right = $rs->fetchSingle();
                $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_left = tree_left + 2 WHERE tree_left > %d', $this->_db->getResourcePrefix(), $value_right));
                $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_right = tree_right + 2 WHERE tree_right >= %d', $this->_db->getResourcePrefix(), $value_right));
                $this->_db->exec(sprintf('INSERT INTO %scategory_tree(tree_id, tree_left, tree_right) VALUES (%d, %d, %d)', $this->_db->getResourcePrefix(), $new['category_id'], $value_right, $value_right + 1));
            }
        } else {
            $sql = sprintf('SELECT MAX(tree_right) FROM %scategory_tree', $this->_db->getResourcePrefix());
            if ($rs = $this->_db->query($sql)) {
                $value_right = $rs->fetchSingle();
                $this->_db->exec(sprintf('INSERT INTO %scategory_tree(tree_id, tree_left, tree_right) VALUES (%d, %d, %d)', $this->_db->getResourcePrefix(), $new['category_id'], $value_right + 1, $value_right + 2));
            }
        }
    }

    protected function _beforeDeleteTrigger1($id, array $old)
    {
        $sql = sprintf('SELECT tree_left, tree_right FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['category_id']);
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
        $sql = sprintf('SELECT tree_left, tree_right FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['category_id']);
        if ($rs = $this->_db->query($sql)) {
            list($value_left, $value_right) = $rs->fetchRow();
            $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_left = tree_left - 2 WHERE tree_left > %d', $this->_db->getResourcePrefix(), $value_left));
            $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_right = tree_right - 2 WHERE tree_right > %d', $this->_db->getResourcePrefix(), $value_right));
            $this->_db->exec(sprintf('DELETE FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['category_id']));
        }
    }

    protected function _beforeUpdateTrigger1($id, array $new, array $old)
    {
        if (!empty($new['category_parent'])) {
            if ($new['category_parent'] == $new['category_id']) {
                // Cannot assign itself as the parent entity
                return false;
            }
            $sql = sprintf('SELECT tree_left, tree_right FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['category_id']);
            if (!$rs = $this->_db->query($sql)) {
                return false;
            }
            list($old_left, $old_right) = $rs->fetchRow();
            $sql = sprintf('SELECT tree_left FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $new['category_parent']);
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
        if (!empty($new['category_parent'])) {
            if (empty($old['category_parent']) || $new['category_parent'] != $old['category_parent']) {
                $sql = sprintf('SELECT tree_left, tree_right FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['category_id']);
                if ($rs = $this->_db->query($sql)) {
                    list($value_left, $value_right) = $rs->fetchRow();
                    $sql = sprintf('SELECT MAX(tree_right) + 1 FROM %scategory_tree', $this->_db->getResourcePrefix());
                    if ($rs = $this->_db->query($sql)) {
                        $temp_left = $rs->fetchSingle();
                        $value_between = $value_right - $value_left + 1;
                        $this->_db->exec(sprintf('UPDATE %4$scategory_tree SET tree_left = tree_left + %1$d - %2$d, tree_right = tree_right + %1$d - %2$d WHERE tree_left BETWEEN %2$d AND %3$d', $temp_left, $value_left, $value_right, $this->_db->getResourcePrefix()));
                        $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_left = tree_left - %d WHERE tree_left > %d AND tree_right < %d', $this->_db->getResourcePrefix(), $value_between, $value_right, $temp_left));
                        $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_right = tree_right - %d WHERE tree_right > %d AND tree_right < %d', $this->_db->getResourcePrefix(), $value_between, $value_right, $temp_left));
                        $sql = sprintf('SELECT tree_right FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $new['category_parent']);
                        if ($rs = $this->_db->query($sql)) {
                            $new_parent_right = $rs->fetchSingle();
                            $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_left = tree_left + %d WHERE tree_left > %d AND tree_left < %d', $this->_db->getResourcePrefix(), $value_between, $new_parent_right, $temp_left));
                            $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_right = tree_right + %d WHERE tree_right >= %d AND tree_left < %d', $this->_db->getResourcePrefix(), $value_between, $new_parent_right, $temp_left));
                            $value_diff = $new_parent_right - $temp_left;
                            $this->_db->exec(sprintf('UPDATE %3$scategory_tree SET tree_left = tree_left + %1$d, tree_right = tree_right + %1$d WHERE tree_left >= %2$d', $value_diff, $temp_left, $this->_db->getResourcePrefix()));
                        }
                    }
                }
            }
        } else {
            if (!empty($old['category_parent'])) {
                $sql = sprintf('SELECT tree_left, tree_right FROM %scategory_tree WHERE tree_id = %d', $this->_db->getResourcePrefix(), $old['category_id']);
                if ($rs = $this->_db->query($sql)) {
                    list($value_left, $value_right) = $rs->fetchRow();
                    $sql = sprintf('SELECT MAX(tree_right) + 1 FROM %scategory_tree', $this->_db->getResourcePrefix());
                    if ($rs = $this->_db->query($sql)) {
                        $temp_left = $rs->fetchSingle();
                        $value_diff = $temp_left - $value_left;
                        $this->_db->exec(sprintf('UPDATE %4$scategory_tree SET tree_left = tree_left + %1$d, tree_right = tree_right + %1$d WHERE tree_left BETWEEN %2$d AND %3$d', $value_diff, $value_left, $value_right, $this->_db->getResourcePrefix()));
                        $value_between = $value_right - $value_left + 1;
                        $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_left = tree_left - %d WHERE tree_left > %d', $this->_db->getResourcePrefix(), $value_between, $value_right));
                        $this->_db->exec(sprintf('UPDATE %scategory_tree SET tree_right = tree_right - %d WHERE tree_right > %d', $this->_db->getResourcePrefix(), $value_between, $value_right));
                    }
                }
            }
        }
    }

    protected function _beforeDeleteTrigger2($id, array $old)
    {
        return $this->_db->exec(sprintf('UPDATE %snode SET node_category_id = NULL WHERE node_category_id = %d', $this->_db->getResourcePrefix(), $id), false);
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
        if (!$this->_beforeDeleteTrigger2($id, $old)) return false;
        return true;
    }

    protected function _afterDeleteTrigger($id, array $old)
    {
        $this->_afterDeleteTrigger1($id, $old);
    }
}