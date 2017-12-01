<?php
/**
 * Created by PhpStorm.
 * User: IlayaPrabu
 * Date: 18-06-2017
 * Time: 15:51
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class FormFieldsTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->addBehavior('Timestamp');

        $this->hasMany('FormfieldAnswers', [
            'foreignKey' => 'field_id',
            'dependent' => true,
            'cascadeCallbackup' => true
        ]);
    }
}