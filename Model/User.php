<?php

    class User extends AppModel
    {

        public $hasAndBelongsToMany = array('Service');
    }