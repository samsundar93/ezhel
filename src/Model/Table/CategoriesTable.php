<?php

namespace App\Model\Table;

use App\Model\Entity\Categories;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class CategoriesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->primaryKey('id');
        $this->addBehavior('Timestamp');


        $this->hasMany('Items',[
            'className' => 'Items',
            'foreignKey' => 'catid',
            'dependent' => true
        ]);
    }
}

?>