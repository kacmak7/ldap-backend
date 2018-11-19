<?php

/*
 * $Id$
 */

namespace Controller;

/**
 * @author Bartosz Kuzmab <bartosz.kuzma@release11.com>
 */
class Api {


    public function GET_dictionary_systems(\Base $f3) {
        $domain = array(
            'marol.com.pl',
            'chatapolska.pl',
        );

        echo $this->_view->render('json_data.phtml', 'application/json', array('data' => $domains));
    }

    public function GET_test_message(\Base $f3) {
	    $testMessage = 'papaya';


	    $view=\View::instance();
	    echo $view->render('json_data.phtml', 'application/json', array('data' => $testMessage));
    }

    public function GET_test_numbers(\Base $f3) {
	    $data = array(1, 5, 2, 97, 26);

	    $view=\View::instance();
	    echo $view->render('json_data.phtml', 'application_json', array('data' => $data));
    }
}
