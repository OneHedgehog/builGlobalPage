<?php

    App::uses('Controller', 'Controller');

    /**
     * Class AppController
     *
     * @property User $User
     *
     */
    class AppController extends Controller
    {

        public $uses
            = array(
                'User'
            );

        private $allowed_urls
            = array(
                'users/login',
            );

        public $current_user = array();

        public function beforeFilter()
        {

            $req_url = $this->request->params['controller'].'/'.$this->request->params['action'];
            if (in_array($req_url, $this->allowed_urls)) {
                return;
            }

            $user_id = $this->Session->read('user_id');
            $user_id *= 1;

            if (empty($user_id) || $user_id < 1) {
                $this->Session->delete('user_id');
                $this->redirect('/users/login');

                return;
            }

            $user = $this->User->find('first',
                array(
                    'conditions' => array(
                        'User.id' => $user_id
                    )
                ));


            if (empty($user)) {
                $this->Session->delete('user_id');
                $this->redirect('/users/login');

                return;
            }

            if ($user['User']['status'] === 0) {
                $this->Flash->set('Ваш аккаунт заблокирован', array('element' => 'error'));
                $this->Session->delete('user_id');
                $this->redirect('/users/login');

                return;
            }

            $this->current_user = $user;
        }
    }
