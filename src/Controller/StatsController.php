<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stats Controller
 *
 * @property \App\Model\Table\StatsTable $Stats
 *
 * @method \App\Model\Entity\Stat[] paginate($object = null, array $settings = [])
 */
class StatsController extends AppController
{


    /**
     * View method
     *
     * @param string|null $id Stat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stat = $this->Stats->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('stat', $stat);
        $this->set('_serialize', ['stat']);
    }

}
