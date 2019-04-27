<?php
//application/controllers/News.php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->config->set_item('banner', 'News Section');
        $this->load->model('news_model'); //load the model News_model.php every time this controller is utilized
        $this->load->helper('url_helper'); //load helper functions from the core folder
    }

    public function index()
    {
        $this->config->set_item('title', 'Seattle Sports News');

        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('news/index', $data);
    }

    public function view($slug = NULL)
    {
        // //slug without dashes
        // $dashless_slug = str_replace('-', ' ', $slug);
        //
        // //uppercase slug words
        // $dashless_slug = ucwords($dashless_slug);
        //
        // //use dashless slug for the title
        // $this->config->set_item('title', 'News Flash - ' . $dashless_slug);

        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        //using $data['title'] instead of the above commented slug manipulation
        //retains special characters like apostrophes and does not require capitalizing characters
        $this->config->set_item('title', 'News Flash - ' . $data['title']);

        $this->load->view('news/view', $data);
    }

    public function create()
    {
        //the following two items need to be loaded together
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';
        $this->config->set_item('title', 'Create a news item');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('news/create', $data);
        }
        else
        {
            // $this->news_model->set_news();
            // $this->load->view('news/success', $data);

            //get the return from the news story creation that was just attempted
            $slug = $this->news_model->set_news();

            if ($slug !== false)
            {//slug sent
                feedback('Data entered successfully!','info'); //this is a function in our common_helper.php
                                                               //it displays bootswatch styled feedback at the top of the page (below the header)
                redirect('news/view/' . $slug); //display the view page of the news story that was just created
            } else {//error
                feedback('Data NOT entered!','error');
                redirect('news/create'); //reload the create news page
            }
        }
    }

}
