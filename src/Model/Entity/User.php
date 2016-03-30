<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property \App\Model\Entity\QuestionsUser[] $questions_users
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    
    public function _getQuestionsUsersTable(){
            $questionsUsers = TableRegistry::get('QuestionsUsers');
            return $questionsUsers->find('all')->where(['user_id' => $this->id])->toArray();
    }
    
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
    // Criptografar senha
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
