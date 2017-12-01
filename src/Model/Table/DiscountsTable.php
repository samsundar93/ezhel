<?php

namespace App\Model\Table;

use App\Model\Entity\Discount;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class DiscountsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasMany('Orders', [
            'className' => 'Orders',
            'foreignKey' => 'upfront_id'
        ]);
    }
}

?>