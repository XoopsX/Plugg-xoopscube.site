<?php
require_once 'Sabai/Model/EntityCollection/Decorator/User.php';

class Plugg_Aggregator_Model_FeedsWithUserWithData extends Sabai_Model_EntityCollection_Decorator_User
{
    public function __construct(Sabai_Model_EntityCollection $collection)
    {
        parent::__construct($collection, true);
    }
}