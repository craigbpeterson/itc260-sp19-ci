<?php
//application/views/pics/index.php

$this->load->view($this->config->item('theme') . 'header');

?>
<h2><?php echo $title; ?></h2>

<h3>Choose a tag to view a selection of pics:</h3>

<?php foreach ($default_tags as $tag): ?>

    <a href="<?=site_url('pics/view/' . $tag);?>">
        <button type="button" class="btn btn-primary"><?=$tag?></button>
    </a>

<?php endforeach; ?>

<h3>Or type in your own tag:</h3>
<input type="input" name="tagname" id="tagname" class="form-control form-control-lg" style="width:100%;max-width:300px;margin-bottom:1rem;" />
<button type="button" id="submit" class="btn btn-primary">Submit</button>

<script>
    var submitButton = document.querySelector('#submit');
    var tagName = '';
    submitButton.addEventListener('click', function() {
        tagName = document.querySelector('#tagname').value;
        window.location.href = '<?=site_url('pics/view/')?>' + tagName;
    });
</script>



<?php

$this->load->view($this->config->item('theme') . 'footer');

?>
