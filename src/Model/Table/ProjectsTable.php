<?php
/**
 * Created by PhpStorm.
 * User: Sundar
 * Date: 9/20/2017
 * Time: 11:06 PM
 */
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ProjectsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('projects');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Serviceproviders',[
            'className' 	=> 'Serviceproviders',
            'foreignKey' 	=> 'serviceprovider_id'
        ]);
    }


}