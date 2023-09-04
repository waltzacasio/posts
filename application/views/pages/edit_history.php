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
      <th scope="col" class="text-center align-middle">First Name</th>
      <th scope="col" class="text-center align-middle">Last Name</th>
      <th scope="col" class="text-center align-middle">Address</th>
      <th scope="col" class="text-center align-middle">Contact Number</th>
      <th scope="col" class="text-center align-middle">Remarks</th>
    </tr>
  </thead>

</table>

<?= $this->pagination->create_links(); ?>
