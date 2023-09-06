<?php if($this->session->flashdata('user_loggedin')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
<?php endif;?>



<h1 class="text-center"><?= $title;?></h1>

<br/>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center align-middle">Time Stamp</th>
      <th scope="col" class="text-center align-middle">User</th>
      <th scope="col" class="text-center align-middle">Field Name</th>
      <th scope="col" class="text-center align-middle">Old Value</th>
      <th scope="col" class="text-center align-middle">New Value</th>
      <th scope="col" class="text-center align-middle">Change Description</th>
    </tr>
  </thead>

</table>

<?= $this->pagination->create_links(); ?>
