<?php

namespace App\Model\Table;

use App\Model\Entity\Customer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class CustomersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        //$this->table('chats');

        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasMany('Leads',[
            'className' => 'Leads',
            'foreignKey' => 'id'
        ]);

        $this->hasMany('Ratings',[
            'className' => 'Ratings',
            'foreignKey' => 'id'
        ]);

        $this->hasOne('Users',[
            'className' => 'Users',
            'foreignKey' => 'user_id'
        ]);

    }


}



?>