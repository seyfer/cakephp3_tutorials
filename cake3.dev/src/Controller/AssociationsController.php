<?php

namespace App\Controller;

class AssociationsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Countries');
        $this->loadModel('Cities');
    }

    public function index()
    {
        $this->set('pageHeader', 'CakePHP 3 Associations - Linking Tables Together');
        $countries = $this->Countries->find()->order('id');
        $this->set(compact('countries'));
    }

    public function view($countryId)
    {
        $this->set('pageHeader', 'View cities');
        $country = $this->Countries->findById($countryId)->contain([
                                                                       'Cities' => [
                                                                           'sort' => ['Cities.id' => 'DESC']
                                                                       ]
                                                                   ])->first();
        $this->set(compact('country'));
    }

}