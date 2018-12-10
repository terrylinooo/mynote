<?php

/**
 * Class ModelAbstract
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

namespace Githuber\Model;

abstract class ModelAbstract {

    /**
     * WP DB instance.
     *
     * @var object
     */
    public $db;

    /**
     * Constructer.
     * 
     * @return void
     */
    public function __construct() {

        // Get WP DB object.
        global $wpdb;

        $this->db = &$wpdb;
    }
}
