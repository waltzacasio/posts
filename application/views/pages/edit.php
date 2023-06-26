<?php if($this->session->flashdata('post_updated')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>

<?php endif;?>


<h1><?= $title;?></h1>
<hr>
<?= validation_errors();?>
<div class="row">

    <div class="col-lg-12">

            <?= form_open('edit');?>

        <div class="form-group">
        <br>
        <b>First Name :</b>
        <input type="text" name="firstname" class="form-control"  placeholder="Enter First Name" value="<?= $firstName;?>">
        <?php echo form_error('title'); ?>
        <br>
        <b>Last Name :</b>
        <input type="text" name="lastname" class="form-control"  placeholder="Enter Last Name" value="<?= $lastName;?>">
        <br> 
        <b>Address :</b>
        <input type="text" name="address" class="form-control"  placeholder="Enter Address" value="<?= $address;?>"> 
        <br> 
        <b>Box Number :</b>
        <input type="text" id="boxnumber" name="boxnumber" class="form-control"  placeholder="Enter Box / SN / Acc No." value="<?= $boxNumber;?>"> 
        <br> 
        <b>Chip ID :</b>
        <input type="text" id="chipcca" name="chipcca" class="form-control"  placeholder="Enter Chip ID / CCA No." value="<?= $chipid;?>">
        <br> 
        <b>STB ID :</b>
        <input type="text" id="stb" name="stb" class="form-control"  placeholder="Enter STB ID" value="<?= $stb;?>"> 
        <br>


        <!-- purchase type -->
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transactiontype" value="INSTALL" id="install">
        <label class="form-check-label" for="install">
            Install
        </label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transactiontype" value="SET" id="set">
        <label class="form-check-label" for="set">
            Set
        </label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transactiontype" value="BOX KIT" id="boxkit">
        <label class="form-check-label" for="boxkit">
            Box Kit
        </label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transactiontype" value="Nagparecord" id="nagparecord">
        <label class="form-check-label" for="nagparecord">
            Nagparecord
        </label>
        </div>
        <br>
        <br>
        <b>Date Of Purchase :</b>
        <input type="text" name="dateofpurchase" class="form-control"  placeholder="Enter Date of Purchase" value="<?= $dateOfPurchase;?>"> 
        <br> 
        <b>Contact No. :</b>
        <input type="text" name="contact" class="form-control"  placeholder="Enter Contact No." value="<?= $contact;?>">
        <br> 
        <b>Installer :</b>
        <input type="text" name="installer" class="form-control"  placeholder="Enter Installer" value="<?= $installer;?>"> 
        <br>
        <div class="form-group">
        <b>Remarks :</b>
        <textarea name="remarks" id="" cols="30" rows="5" class="form-control" placeholder="Enter remarks" value="<?= $remarks;?>"></textarea>
        </div>

        </div>
        <br>

        <button type="submit" name="submit" class="btn btn-success">Submit</button>


    </div>


</div>