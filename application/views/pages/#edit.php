<?php if($this->session->flashdata('post_updated')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>

<?php endif;?>


<h1><?= $title;?></h1>
<hr>
<?= validation_errors();?>
<div class="row">

    <div class="col-lg-12">

    <?= form_open('edit/'.$boxType.'/'.$boxNumber);?>
    <div class="form-group">
        <br>
        <input type="hidden" name="id" value="<?= $id;?>">
        <b>First Name :</b>
        <input type="text" name="firstname" class="form-control"  placeholder="Enter First Name" value="<?= $firstName;?>">
        <?php echo form_error('title'); ?>
        <br>
        <b>Last Name :</b>
        <input type="text" name="lastname" class="form-control"  placeholder="Enter Last Name" value="<?= $lastName;?>">
        <br> 
        <input type="text" id="boxtype" name="boxtype" class="form-control"  value="<?= $boxType;?>"> 
        <br> 
            <button type="submit" name="submit" class="btn btn-primary">Update</button>


    </div>


</div>