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
        <b>Box Type :</b>
        <input type="text" id="boxtype" name="boxtype" class="form-control"  placeholder="<?php if($boxType == "gpinoy"){echo "GPinoy";}
      else if($boxType == "gsathd"){echo "GSat HD";}
      else if ($boxType == "cignal"){echo "Cignal";}
      else if ($boxType == "satlite"){echo "Satlite";}?>" disabled> 
        <br> 
        <span><b id="boxnumber-label">Box Number :</b></span>
        <input type="text" id="boxnumber" name="boxnumber" class="form-control"  placeholder="<?= $boxNumber;?>" disabled> 
        <br> 
        <span id="chipid-label"><b>Chip ID :</b>
        <input type="text" id="chipid" name="chipid" class="form-control"  placeholder="<?= $chipid;?>" disabled>
        <br></span> 
        <span id="cca-label"><b>CCA No. :</b>
        <input type="text" id="cca" name="cca" class="form-control"  placeholder="<?= $cca;?>" disabled>
        <br></span> 
        <span id="stb-label"><b>STB ID :</b>
        <input type="text" id="stb" name="stb" class="form-control"  placeholder="<?= $stb;?>" disabled> 
        <br></span>
        <b>Transaction Type :</b>
        <input type="text" id="transactiontype" name="transactiontype" class="form-control"  placeholder="<?= $transactionType;?>" disabled> 
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


            <script>
                var boxType = "<?= $boxType ?>";
                var chipIdLabel = document.getElementById("chipid-label");
                var ccaLabel = document.getElementById("cca-label");
                var stbLabel = document.getElementById("stb-label");
                var boxnumberLabel = document.getElementById("boxnumber-label");


                if (boxType === "gpinoy") {
                    ccaLabel.style.display = "none";
                    stbLabel.style.display = "none";
                    boxnumberLabel.innerHTML = "Box Number / Serial Number (SN) :";

                } else if (boxType === "gsathd") {
                    ccaLabel.style.display = "none";
                    stbLabel.style.display = "none";
                    boxnumberLabel.innerHTML = "Box Number / Serial Number (SN) / Access ID :";

                } else if (boxType === "cignal" || boxType === "satlite") {
                    chipIdLabel.style.display = "none";
                    boxnumberLabel.innerHTML = "Box Number / Account No. :";
                }
            </script>