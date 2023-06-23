<h1><?= $title;?></h1>
<hr>
<p><b>First Name: </b><?= $firstName;?></p>

<p><b>Last Name: </b> <?= $lastName; ?></p>

<p><b>Address: </b> <?= $address; ?></p>

<p><b>Box Number: </b> <?= $boxNumber; ?></p>

<p><b>Chip ID: </b> <?= $chipid; ?></p>

<p><b>CCA: </b> <?= $cca; ?></p>

<p><b>STB: </b> <?= $stb; ?></p>

<p><b>Transaction Type: </b> <?= $transactionType; ?></p>

<p><b>Date Of Purchase: </b> <?= $dateOfPurchase; ?></p>

<p><b>Type :</b> <?= $type; ?></p>

<p><b>Contact Number: </b> <?= $contact; ?></p>

<p><b>Installer: </b> <?= $installer; ?></p>

<p><b>Remarks: </b> <?= $remarks; ?></p>



<?php if($this->session->logged_in == true && $this->session->access == 1){ ?>


    
<div class="btn-group">
    <a href="<?= base_url()?><?= "edit/";?><?= $this->uri->segment(2) . "/";?><?= $boxNumber;?>" class="btn btn-primary">Edit</a>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
</div>
<?php } ?>