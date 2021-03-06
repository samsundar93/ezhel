<?php 
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

    protected $_accessible = [
        '*' => true,
    ];
    
    public function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    public function _setSpPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}

?>