<?php if($this->session->flashdata('user_loggedin')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
<?php endif;?>

<br>
<hr>

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

  <tbody>
  <?php foreach($edit_logs as $row){?>
    <tr>
      <td class="text-center align-middle"><?= $row['timeStamp'];?></td>
      <td class="text-center align-middle"><?= $row['user'];?></td>
      <td class="text-center align-middle"><?= $row['fieldName'];?></td>
      <td class="text-center align-middle"><?= $row['oldValue'];?></td>
      <td class="text-center align-middle"><?= $row['newValue'];?></td>
      <td class="text-center align-middle"><?= $row['changeDescription'];?></td>
    </tr>
    <?php } ?>
  </tbody>

</table>

<?= $this->pagination->create_links(); ?> 
