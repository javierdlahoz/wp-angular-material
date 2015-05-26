<?php

/**
* Plugin Name: WP Angular Material
* Description: WP Angular Material
* Version: 1.0
* Author: Javier De la Hoz
* License: GPL2
*/
require __DIR__ . '/config/autoloader.php';

use INUtils\Helper\InterceptorHelper;

if (!class_exists("wpAngularMaterial")) {

    class wpAngularMaterial{

        /**
         *
         * @var InterceptorHelper
         */
        private $interceptors;

        function __construct() {
            $this->interceptors = new InterceptorHelper();
            add_action('init', array(&$this, 'init' ));
            add_action('post_edit_form_tag' , array(&$this, 'EditFormTag'));
            add_action('admin_init', array(&$this, 'adminFeatures'));
        }

        public function init(){
        }

        public function adminFeatures(){
        }

        /**
         *
         * @return \stdClass
         */
        public function getResultsFromPostAction(){
            return $this->interceptors->getResults();
        }

        /*
         * It allows to upload files
         */
        public function EditFormTag(){
            echo ' enctype="multipart/form-data"';
        }
    }
}

$wpAngularApp = new wpAngularMaterial();