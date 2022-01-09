<?php

declare(strict_types=1);

namespace App\Form;

use Cake\Form\Form as CakeForm;

class Form extends CakeForm
{
    /**
     * Helps us see if the current form state is valid, without
     * having to pass in `$data` again if we've already set it.
     *
     * @return boolean
     */
    public function isValid(): bool
    {
        return $this->validate($this->_data);
    }

    /**
     * See if this form contains validation errors.
     *
     * @return boolean
     */
    public function hasErrors(): bool
    {
        return !$this->isValid();
    }
}
