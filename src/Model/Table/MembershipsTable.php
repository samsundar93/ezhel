<?php

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class MembershipsTable extends Table
{
	public function initialize(array $config)
	{
		$this->table('memberships');
        $this->addBehavior('Timestamp');
	}

	
}



?>