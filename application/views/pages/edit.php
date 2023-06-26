<?php if($this->session->flashdata('post_updated')) : ?>
    <?= '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>

<?php endif;?>


<h1><?= $title;?></h1>
<hr>
<?= validation_errors();?>
<div class="row">

    <div class="col-lg-12">

                <script>

                var inputBoxNumber = document.getElementById("boxnumber");
                var inputChipID = document.getElementById("chipid");
                var inputCCA = document.getElementById("cca");
                var inputSTB = document.getElementById("stb");

            function toggleInput() {
                var boxType = "<?php echo $boxType; ?>";

                /*var radioGpinoy = document.getElementById("gpinoy");
                var radioGsatHD = document.getElementById("gsathd");
                var radioCignal = document.getElementById("cignal");
                var radioSatlite = document.getElementById("satlite");*/

                if (boxType === "gpinoy" || boxType === "gsathd") {
                    inputCCA.style.display = "none";
                    inputSTB.style.display = "none";
                } else if (boxType === "cignal" || boxType === "satlite") {
                    boxNumberInput.style.display = "block";
                    chipidInput.style.display = "none";
                    ccaInput.style.display = "block";
                    stbInput.style.display = "block";
                }

                /*if (radioGpinoy.checked) {
                    inputBoxNumber.placeholder = "Serial Number (SN)";
                    inputChipCCA.placeholder = "Chip ID";
                    inputSTB.style.display = "none";
                } else if (radioGsatHD.checked) {
                    inputBoxNumber.placeholder = "Serial Number (SN) / Access ID";
                    inputChipCCA.placeholder = "Chip ID";
                    inputSTB.style.display = "none";
                } else if (radioCignal.checked) {
                    inputBoxNumber.placeholder = "Account No.";
                    inputChipCCA.placeholder = "CCA No.";
                    inputSTB.style.display = "block";
                } else if (radioSatlite.checked) {
                    inputBoxNumber.placeholder = "Account No.";
                    inputChipCCA.placeholder = "CCA No.";
                    inputSTB.style.display = "block";
                }*/
            }

            </script>

        

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
        <b>Box Number :</b>
        <input type="text" id="boxnumber" name="boxnumber" class="form-control"  placeholder="<?= $boxNumber;?>" disabled> 
        <br> 
        <b>Chip ID :</b>
        <input type="text" id="chipid" name="chipid" class="form-control"  placeholder="<?= $chipid;?>" disabled>
        <br> 
        <b>CCA No. :</b>
        <input type="text" id="cca" name="cca" class="form-control"  placeholder="<?= $cca;?>" disabled>
        <br> 
        <b>STB ID :</b>
        <input type="text" id="stb" name="stb" class="form-control"  placeholder="<?= $stb;?>" disabled> 
        <br>
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