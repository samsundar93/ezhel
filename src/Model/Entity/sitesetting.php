<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Sitesetting extends Entity
{

    protected $_accessible = [
        '*' => true,
    ];

    public function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}

?>