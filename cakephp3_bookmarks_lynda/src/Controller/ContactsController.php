<?php
namespace App\Controller;

use App\Form\ContactForm;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
{
    public function index()
    {
        $form = new ContactForm();
        if ($this->request->is('post')) {
            if ($form->execute($this->request->getData())) {
                $this->Flash->success('Received');
            } else {
                $this->Flash->error('Error');
            }
        }

        $this->set('form', $form);
    }
}
