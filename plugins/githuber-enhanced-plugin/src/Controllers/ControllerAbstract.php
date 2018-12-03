<?php

/**
 * Class Markdown
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

namespace Githuber\Controller;

abstract class ControllerAbstract {

    /**
     * Version.
     *
     * @var string
     */
    public $version = '1.1.0';

    /**
     * Text domain for transation.
     *
     * @var string
     */
    public $text_domain = 'githuber-plugin';

    /**
     * Array mapping of functionality for Post Type support.
     * Other functionality will be added in the future.
     * 
     * @var array
     */
    public $post_type_support = array(
        'markdown' => 'githuber_markdown'
    );

    /**
     * Initialize.
     *
     * @return void
     */
    abstract public function init();
    
    /**
     * Register CSS style files.
     * 
     * @return void
     */
    abstract public function enqueue_styles();

    /**
     * Register JS files.
     * 
     * @return void
     */
    abstract public function enqueue_scripts();
}
