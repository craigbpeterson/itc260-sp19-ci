<?php
//application/views/pics/index.php

$this->load->view($this->config->item('theme') . 'header');

?>
<h2>Viewing Pics Tagged: <?php echo $title; ?></h2>

<?php
    if (isset($pics)) {



        foreach ($pics as $pic) {
        //set size of pic to request
        $size = 'm';

        //create url for each pic based on data from Flickr API
        $photo_url = 'https://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

        //display each pic on the page
        echo '
        <figure style="display:inline-block;margin:1rem;">
            <img title="' . $pic->title . '" src="' . $photo_url . '" />
            <figcaption>' . $pic->title . '</figcaption>
        </figure>
        ';
        }
    }

$this->load->view($this->config->item('theme') . 'footer');

?>
