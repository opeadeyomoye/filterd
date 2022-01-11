<?php
declare(strict_types=1);

namespace App\Form;

use Cake\Form\Schema;
use Cake\Validation\Validator;

class SignupForm extends Form
{
    /**
     * {@inheritDoc}
     */
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema
            ->addField('firstName', 'string')
            ->addField('email', 'string')
            ->addField('password', 'string');
    }

    /**
     * {@inheritDoc}
     */
    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->notEmptyString('firstNname')
            ->requirePresence('firstName')

            ->notEmptyString('email')
            ->email('email')
            ->requirePresence('email')

            ->notEmptyString('password')
            ->requirePresence('password')
            ->minLength('password', 8, 'Your password must be at least 8 characters long.')
            ->maxLength('password', 60, 'Your password should not be more than 60 characters long.');
    }
}
