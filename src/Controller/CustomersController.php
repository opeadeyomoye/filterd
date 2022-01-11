<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SignupForm;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Http\Response;
use Cake\ORM\Entity;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Database;

/**
 * Customers Controller
 */
class CustomersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['signup', 'login']);
    }

    /**
     * Signs people up.
     *
     * @param SignupForm $form
     * @param Database $db
     *
     * @return Response|null
     */
    public function signup(SignupForm $form, Database $db): ?Response
    {
        if (!$this->request->is('post')) {
            return null;
        }

        $errorMsg = 'We couldn\'t sign you up. Please check your information and try again.';

        if ($form->hasErrors()) {
            $this->Flash->error($errorMsg);

            return $this->render();
        }

        $customers = $db->selectCollection('customers');
        $exists = $customers->findOne(['email' => $form->getData('email')]);

        if ($exists) {
            $this->Flash->error($errorMsg);

            return $this->render();
        }
        $hasher = new DefaultPasswordHasher();

        $customer = [
            '_id' => $this->nextId(),
            'password' => $hasher->hash($form->getData('password')),
            'created' => new UTCDateTime(),
        ];
        $customer = $customer + $form->getData();
        $key = $this->makeApiKey($customer['_id'], $db);

        if (!$key) {
            $this->Flash->error($errorMsg);

            return $this->render();
        }

        $customers->insertOne($customer);

        $this->Authentication->setIdentity(new Entity($customer));

        return $this->redirect(['action' => 'dashboard']);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/dashboard';

            return $this->redirect($target);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();

        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }

    public function dashboard()
    {
    }

    /**
     * Provides a fresh customer id string.
     *
     * @return string
     */
    protected function nextId(): string
    {
        // missing some letters to avoid unfortunate results
        $result = str_shuffle('0123456789ABCDEFGHJKLMNPQRSTVWXYZ');

        // there are 8.688E+36 possible arrangements of those 33 chars.
        // simply picking the first 12 each time should give us enough room for tons of ids.
        // maybe a thousand trillion. Maybe not.
        return substr($result, 0, 12);
    }

    protected function makeApiKey(string $id, Database $db)
    {
        $charList = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
        $key = substr(str_shuffle($charList), 0, 38);

        $collection = $db->selectCollection('apiKeys');

        $exists = $collection->findOne(['_id' => $key]);
        if ($exists) {
            return null;
        }

        return $collection->insertOne([
            '_id' => $key,
            'customerId' => $id,
            'created' => new UTCDateTime(),
        ]);
    }
}
