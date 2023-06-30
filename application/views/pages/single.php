<h1><?= $title;?></h1>
<hr>
<p><b>First Name : </b><?= $firstName;?></p>

<p><b>Last Name : </b> <?= $lastName; ?></p>

<p><b>Address : </b> <?= $address; ?></p>

<p><b>Box Type : </b> <?php if($this->uri->segment(2) == "gpinoy"){echo "GPinoy";}
      else if($this->uri->segment(2) == "gsathd"){echo "GSat HD";}
      else if ($this->uri->segment(2) == "cignal"){echo "Cignal";}
      else if ($this->uri->segment(2) == "satlite"){echo "Satlite";}?></p>

<p><b id="boxnumber-label">Box Number : </b> <?= $boxNumber; ?></p>

<span id="chipid-label"><p><b>Chip ID: </b> <?= $chipid; ?></p></span>

<span id="cca-label"><p><b>CCA: </b> <?= $cca; ?></p></span>

<span id="stb-label"><p><b>STB: </b> <?= $stb; ?></p></span>

<p><b>Transaction Type : </b> <?= $transactionType; ?></p>

<p><b>Date Of Purchase : </b> <?= $dateOfPurchase; ?></p>

<p><b>Type :</b> <?= $type; ?></p>

<p><b>Contact Number : </b> <?= $contact; ?></p>

<p><b>Installer : </b> <?= $installer; ?></p>

<p><b>Remarks : </b> <?= $remarks; ?></p>



<?php if($this->session->logged_in == true && $this->session->access == 1){ ?>


    
<div class="btn-group">
    <a href="<?= base_url()?><?= "edit/";?><?= $this->uri->segment(2) . "/";?><?= $boxNumber;?>" class="btn btn-primary">Edit</a>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
</div>
<?php } ?>



<script>
                var boxType = "<?= $this->uri->segment(2); ?>";
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