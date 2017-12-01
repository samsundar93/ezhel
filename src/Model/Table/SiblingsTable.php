<?php
/**
 * Created by PhpStorm.
 * User: IlayaPrabu
 * Date: 14-06-2017
 * Time: 22:05
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class SiblingsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');

        $this->belongsTo('SubCategories', [
            'foreignKey' => 'subcat_id'
        ]);
    }
}