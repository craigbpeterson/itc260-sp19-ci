<?php
//application/controllers/Pics.php
class Pics extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->config->set_item('banner', 'See Flickr Pics');
        $this->load->model('pics_model');
        $this->load->helper('url_helper'); //load helper functions from the core folder
    }

    public function index()
    {
        $this->config->set_item('title', 'See Flickr Pics');

        $data['title'] = 'See Flickr Pics';
        $data['default_tags'] = ['glacier', 'mountainbiking', 'camping'];

        $this->load->view('pics/index', $data);

    }

    public function view($tags = NULL)
    {
        if ($tags === NULL) {
            $this->config->set_item('title', 'See Flickr Pics | Oops!' . $tags);
            $data['title'] = 'Oops. No tag entered.';
        } else {
            $this->config->set_item('title', 'See Flickr Pics | ' . $tags);
            $data['title'] = $tags;
            $data['pics'] = $this->pics_model->get_pics($tags);

            /*
            echo "<pre>";
            echo var_dump($data['pics']);
            echo "</pre>";
            die;
            */

        }

        $this->load->view('pics/view', $data);

    }

}
