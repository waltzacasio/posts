<?php if($this->session->flashdata('user_loggedin')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
<?php endif;?>

<?php if($this->session->flashdata('post_added')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('post_added').'</p>';?>
<?php endif;?>

<?php if($this->session->flashdata('post_delete')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('post_delete').'</p>';?>
<?php endif;?>


<h1><?= $title;?></h1>

<form class="d-flex" role="search" method="post" action="<?= base_url();?>search">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" value="<?= set_value('search');?>" required>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

<!--
<ul class="list-group">
    <?php/* foreach($posts as $row){*/?>
    <a class="list-group-item list-group-item-action" href="<?= base_url();?><?= $row['slug'];?>"><?= $row['title'];?></a>  
    <?php /*}*/ ?>
</ul>
    -->

<br/>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Address</th>
      <th scope="col">Box Type</th>
      <th scope="col">Box Number</th>
      <th scope="col">Transaction Type</th>
      <th scope="col">Date of Transaction</th>
      <th scope="col">Installer</th>
      <th scope="col">Remarks</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($posts as $row){?>
    <tr>
      <td><?= $row['lastName'];?></td>
      <td><?= $row['firstName'];?></td>
      <td><?= $row['address'];?></td>
      <td><?= $row['tableName'];?></td>
      <td><?= $row['boxNumber'];?></td>
      <td><?= $row['transactionType'];?></td>
      <td><?= $row['dateOfPurchase'];?></td>
      <td><?= $row['installer'];?></td>
      <td><?= $row['remarks'];?></td>
      <td><a href="<?= base_url() . "details/";?><?php if($row['tableName'] == "GPinoy"){echo "gpinoy";}
      else if($row['tableName'] == "GSat HD"){echo "gsathd";}
      else if ($row['tableName'] == "Cignal"){echo "cignal";}
      else if ($row['tableName'] == "Satlite"){echo "satlite";}?><?= "/" . $row['boxNumber'];?>">
      <?= "View Details" ?></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?= $this->pagination->create_links(); ?>

<div class="alert alert-secondary" role="alert">
    Total post is <?= $total;?>.
</div>