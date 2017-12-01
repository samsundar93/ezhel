<?php
/**
 * Created by PhpStorm.
 * User: IlayaPrabu
 * Date: 18-06-2017
 * Time: 16:07
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class FormfieldAnswersTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');

        $this->belongsTo('FormFields', [
            'foreignKey' => 'field_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
    }
}