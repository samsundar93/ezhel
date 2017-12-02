<?php

namespace App\Model\Table;

use App\Model\Entity\SubCategorie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class SubCategoriesTable extends Table
{
	public function initialize(array $config)
	{
		parent::initialize($config);
		$this->table('sub_categories');

        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('MainCategories',[
            'className' 	=> 'MainCategories',
            'foreignKey' 	=> 'main_category_id'
        ]);

        $this->hasMany('Siblings', [
            'foreignKey' => 'subcat_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->belongsTo('Projects',[
            'className' 	=> 'Projects',
            'foreignKey' 	=> 'subcategory'
        ]);
        
	}

	
}



?>