<?php

class homeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();
        
        $posts = new Posts();
        $dados['posts'] = $posts->getPosts(10);        
        
        $this->loadTemplate('home', $dados);
    }

}