<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 *
 * @method \App\Model\Entity\Account[] paginate($object = null, array $settings = [])
 */
class AccountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->Crud->on('beforePaginate', function(\Cake\Event\Event $event) {
            $this->paginate['conditions']['user_id'] = parent::getUserId();
            $this->paginate['contain'] = ['LastBalance'];
        });

        return $this->Crud->execute();
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Crud->on('beforeSave', function(\Cake\Event\Event $event) {
            $entity = $event->getSubject()->entity;
            $entity->user_id = parent::getUserId();
        });

        return $this->Crud->execute();
    }

    public function delete($id)
    {
        $this->Crud->on('beforeFind', function(\Cake\Event\Event $event) {
            $event->getSubject()->query->where(['user_id' => parent::getUserId()]);
        });

        return $this->Crud->execute();
    }

}
