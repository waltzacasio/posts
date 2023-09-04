<?php if($this->session->flashdata('user_loggedin')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
<?php endif;?>

<?php if($this->session->flashdata('post_added')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('post_added').'</p>';?>
<?php endif;?>

<?php if($this->session->flashdata('post_delete')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('post_delete').'</p>';?>
<?php endif;?>


<h1 class="text-center"><?= $title;?></h1>

<form class="d-flex" role="search" method="post" action="<?= base_url('search/');?>">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" value="<?= $keywords;?>" required>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

<br/>

<div class="alert alert-secondary" role="alert">
    "<?= $keywords;?>" has <?= number_format($total);?> result.
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center align-middle">Last Name</th>
      <th scope="col" class="text-center align-middle">First Name</th>
      <th scope="col" class="text-center align-middle">Address</th>
      <th scope="col" class="text-center align-middle">Box Type</th>
      <th scope="col" class="text-center align-middle">Box Number</th>
      <th scope="col" class="text-center align-middle">Transaction Type</th>
      <th scope="col" class="text-center align-middle">Date of Transaction</th>
      <th scope="col" class="text-center align-middle">Installer</th>
      <th scope="col" class="text-center align-middle">Remarks</th>
      <th scope="col" class="text-center align-middle">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($posts as $row){?>
    <tr>
      <td class="text-start align-middle"><?= $row['lastName'];?></td>
      <td class="text-start align-middle"><?= $row['firstName'];?></td>
      <td class="text-center align-middle"><?= $row['address'];?></td>
      <td <?php if($row['tableName'] == "GPinoy"){echo 'class="table-success text-center align-middle"';}
      else if($row['tableName'] == "GSat HD"){echo 'class="table-primary text-center align-middle"';}
      else if ($row['tableName'] == "Cignal"){echo 'class="table-danger text-center align-middle"';}
      else if ($row['tableName'] == "Satlite"){echo 'class="table-warning text-center align-middle"';}?>><?= $row['tableName'];?></td>
      <td class="text-center align-middle"><b><?= $row['boxNumber'];?></b></td>
      <td class="text-center align-middle"><?= $row['transactionType'];?></td>
      <td class="text-center align-middle"><?= $row['dateOfPurchase'];?></td>
      <td class="text-center align-middle"><?= $row['installer'];?></td>
      <td class="text-center align-middle"><?= $row['remarks'];?></td>
      <td class="text-center align-middle"><a href="<?= base_url() . "details/";?><?php if($row['tableName'] == "GPinoy"){echo "gpinoy";}
      else if($row['tableName'] == "GSat HD"){echo "gsathd";}
      else if ($row['tableName'] == "Cignal"){echo "cignal";}
      else if ($row['tableName'] == "Satlite"){echo "satlite";}?><?= "/" . $row['boxNumber'];?>">
      <?= '<button type="button" class="btn btn-primary btn-sm text-nowrap">View Details</button>' ?></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?= $this->pagination->create_links(); ?>
