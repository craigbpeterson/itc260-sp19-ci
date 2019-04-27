<?php
//application/models/Pics_model.php
class Pics_model extends CI_Model {

    public function __construct()
    {
        $this->load->database(); //the constructor makes the database available to all methods in this model
    }

    public function get_pics($tags = FALSE)
    {
        //get the unique Flickr API Key from custom_config.php
        $api_key = $this->config->item('flickrKey');

        //build the Flickr API request
        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $api_key;
        $url.= '&tags=' . $tags;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';

        //make the API request and return the results to the Pics controller
        $response = json_decode(file_get_contents($url));
        return $response->photos->photo;

    }

}
