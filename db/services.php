<?php

$functions = array(
    'sandbox_is_complete' => array(           //web service name (unique in all Moodle)
        'classname'   => 'theme_sandbox_external', //class containing the function implementation
        'methodname'  => 'sandbox_is_complete',              //name of the function into the class
        'description' => 'Check if course module is complete',
        'type' => 'read',
        'ajax' => true,
        'loginrequired' => false
    )
);