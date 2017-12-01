<?php

namespace App\Model\Table;

use App\Model\Entity\MainCategorie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class MainCategoriesTable extends Table
{
	public function initialize(array $config)
	{
		parent::initialize($config);
		$this->table('main_categories');

        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        /*$this->hasOne('SubCategories',[
            'className'     => 'SubCategories',
            'foreignKey'    => 'main_category_id',
            'dependent'     => true
        ]);*/

        $this->hasMany('SubCategories',[
            'className' 	=> 'SubCategories',
            'foreignKey' 	=> 'main_category_id',
            'dependent' => true
        ]);
	}

	
}



?>