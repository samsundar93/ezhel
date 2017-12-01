<?php

namespace App\Model\Table;

use App\Model\Entity\Serviceprovider;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ServiceprovidersTable extends Table
{
	public function initialize(array $config)
	{
		parent::initialize($config);
		$this->table('serviceproviders');

        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasOne('Users',[
            'className' => 'Users',
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Followers',[
            'className' => 'Followers',
            'foreignKey' => 'service_id'
        ]);
        
        $this->hasMany('ServiceproWorkphotos',[
            'className' => 'ServiceproWorkphotos',
            'foreignKey' => 'service_id'
        ]);

        $this->hasMany('ServiceproCertificates',[
            'className' => 'ServiceproCertificates',
            'foreignKey' => 'service_id'
        ]);

        $this->hasMany('Ratings',[
                'className' => 'Ratings',
                'foreignKey' => 'serviceprovider_id'
        ]);
        $this->hasMany('Projects',[
                'className' => 'Projects',
                'foreignKey' => 'serviceprovider_id'
        ]);
	}

	
}



?>