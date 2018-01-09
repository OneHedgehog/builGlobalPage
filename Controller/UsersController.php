<?php

    class UsersController extends AppController
    {

        public $uses
            = array(
                'User'
            );

        public function login()
        {

            $this->layout = 'empty';

            if (empty($this->request->data)) {

                return;
            }

            $login = $this->request->data['User']['login'];
            $password = $this->request->data['User']['password'];
            unset($this->request->data['User']['password']);

            // Verify login
            if (empty($login)) {
                $this->Flash->set(__('Логин не может быть пустым'), array('element' => 'error'));

                return;
            }

            if ( !preg_match('/^[a-z_]+$/', $login)) {
                $this->Flash->set(__('Не корректный логин и пароль пользователя, обратитесь к администратору!'), array('element' => 'error'));

                return;
            }

            // Verify password
            if (empty($password)) {
                $this->Flash->set(__('Пароль не может быть пустым'), array('element' => 'error'));

                return;
            }
            if ( !preg_match('/^[a-zA-Z0-9]+$/', $password)) {
                $this->Flash->set(__('Не корректный логин и пароль пользователя, обратитесь к администратору!'), array('element' => 'error'));

                return;
            }

            $user = $this->User->find('first',
                array(
                    'conditions' => array(
                        'User.login' => $login,
                    )
                )
            );

            if (empty($user)) {
                $this->Flash->set(__('Не корректный логин и пароль пользователя, обратитесь к администратору!'), array('element' => 'error'));

                return;
            }

            if ($user['User']['pass'] !== sha1($password.'MU2zoJp1d3fyEaZ20r6t')) {
                $this->Flash->set(__('Не корректный логин и пароль пользователя, обратитесь к администратору!'));

                return;
            }

            if ($user['User']['status'] !== 1) {
                $this->Flash->set(__('Ваш аккаунт неактивен!'));

                return;
            }

            $this->Session->write('user_id', $user['User']['id']);
            $this->redirect('/');
        }

        public function logout()
        {

            $this->autoRender = false;
            $this->Session->delete('user_id');
            $this->redirect('/users/login');
        }
    }

