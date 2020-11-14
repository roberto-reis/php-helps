<?php 

    class SairController extends Controller {
        public function index() {
            session_start();

            unset($_SESSION["cLogin"]);
            header("Location: ".BASE_URL);


        }


    }


?>