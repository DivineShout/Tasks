<?php

    return array(

        'admin' => 'tasks/login',
        'admin/logout' => 'tasks/logout',
        'update-task/([0-9]+)' => 'tasks/update/$1',
        'delete-task/([0-9]+)' => 'tasks/delete/$1',
        'create-task' => 'tasks/create',
        'page-([0-9]+)' => 'tasks/index/$1',
        '' => 'tasks/index',
    );