<h1><?= $title;?></h1>
<hr>
<div class="row">

    <div class="col-lg-12">
    
                <?= form_open('add');?>

                <b>Select Box Type :</b>
                
                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="gpinoy" id="gpinoy" onchange="toggleInput()" <?php if ($selectedBoxType === 'gpinoy') { echo 'checked'; } ?>>
                <label class="btn btn-outline-success" for="gpinoy">
                    Gpinoy
                </label>
                </div>

                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="gsathd" id="gsathd" onchange="toggleInput()" <?php if ($selectedBoxType === 'gsathd') { echo 'checked'; } ?>>
                <label class="btn btn-outline-primary" for="gsathd">
                    GSAT HD
                </label>
                </div>

                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="cignal" id="cignal" onchange="toggleInput()" <?php if ($selectedBoxType === 'cignal') { echo 'checked'; } ?>>
                <label class="btn btn-outline-danger" for="cignal">
                    Cignal
                </label>
                </div>

                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="satlite" id="satlite" onchange="toggleInput()" <?php if ($selectedBoxType === 'satlite') { echo 'checked'; } ?>>
                <label class="btn btn-outline-warning" for="satlite">
                    Satlite
                </label>
                </div>
                <?php echo form_error('boxtype'); ?>



        <div class="form-group">
                <br>
                <b>First Name :</b>
                <input type="text" name="firstname" class="form-control"  placeholder="Enter First Name" value="<?= set_value('firstname');?>">
                <?php echo form_error('firstname'); ?>
                <br> 
                <b>Last Name :</b>
                <input type="text" name="lastname" class="form-control"  placeholder="Enter Last Name" value="<?= set_value('lastname');?>">
                <?php echo form_error('lastname'); ?>
                <br> 
                <b>Address :</b>
                <input type="text" name="address" class="form-control"  placeholder="Enter Address" value="<?= set_value('address');?>"> 
                <?php echo form_error('address'); ?>
                <br> 
                <b>Box Number :</b>
                <input type="text" id="boxnumber" name="boxnumber" class="form-control"  placeholder="Enter Box / SN / Acc No." value="<?= set_value('boxnumber');?>"> 
                <?php echo form_error('boxnumber'); ?>
                <br>
                
                <div id="chipid-label"><b>Chip ID :</b>
                <input type="text" id="chipid" name="chipid" class="form-control"  placeholder="Enter Chip ID" value="<?= set_value('chipid');?>">
                <?php// if ($selectedBoxType === 'gpinoy' || $selectedBoxType === 'gsathd') {echo form_error('chipid');}?>
                <br> 
                </div>

                <div id="stb-cca-label">

                <b id="cca-label">CCA No. :</b>
                <input type="text" id="cca" name="cca" class="form-control"  placeholder="Enter CCA No." value="<?= set_value('cca');?>">
                <?php// if ($selectedBoxType === 'cignal' || $selectedBoxType === 'saltite') {echo form_error('cca');}?>
                <br> 


                <b>STB ID :</b>
                <input type="text" id="stb" name="stb" class="form-control"  placeholder="Enter STB ID" value="<?= set_value('stb');?>">
                <?php// if ($selectedBoxType === 'cignal' || $selectedBoxType === 'saltite') {echo form_error('stb');}?>
                <br>
            
                </div>
                
                <!-- purchase type -->
                <b>Transaction Type :</b>
                <br>
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
                <?php echo form_error('transactiontype'); ?>

                <br>
                <br>
                <b>Transaction Date :</b>
                <input type="text" name="dateofpurchase" class="form-control"  placeholder="Enter Date of Transaction" value="<?= set_value('dateofpurchase');?>">
                <?php echo form_error('dateofpurchase'); ?>
                <br> 
                <b>Contact No. :</b>
                <input type="text" name="contact" class="form-control"  placeholder="Enter Contact No." value="<?= set_value('contact');?>">
                <br> 
                <b>Installer :</b>
                <input type="text" name="installer" class="form-control"  placeholder="Enter Installer" value="<?= set_value('installer');?>"> 
                <?php echo form_error('installer'); ?>
                <br>
            <div class="form-group">
                <b>Remarks :</b>
                <textarea name="remarks" id="" cols="30" rows="5" class="form-control" placeholder="Enter remarks" value="<?= set_value('remarks');?>"></textarea>
            </div>

        </div>
            <br>
        
            <button type="submit" name="submit" class="btn btn-success">Submit</button>


    </div>


</div>


                    <script>

                    function toggleInput() {
                        var inputBoxNumber = document.getElementById("boxnumber");
                        var radioGpinoy = document.getElementById("gpinoy");
                        var radioGsatHD = document.getElementById("gsathd");
                        var radioCignal = document.getElementById("cignal");
                        var radioSatlite = document.getElementById("satlite");
                        var stbccaLabel = document.getElementById("stb-cca-label");
                        var chipidLabel = document.getElementById("chipid-label");

                        chipidLabel.style.display = "block";    
                        
                        if (radioGpinoy.checked) {
                            inputBoxNumber.placeholder = "Enter Serial Number (SN)";
                            chipidLabel.style.display = "block";
                            stbccaLabel.style.display = "none";

                        } else if (radioGsatHD.checked) {
                            inputBoxNumber.placeholder = "Enter Serial Number (SN) / Access ID";
                            chipidLabel.style.display = "block";
                            stbccaLabel.style.display = "none";

                        } else if (radioCignal.checked) {
                            inputBoxNumber.placeholder = "Enter Account No.";
                            stbccaLabel.style.display = "block";
                            chipidLabel.style.display = "none";

                        } else if (radioSatlite.checked) {
                            inputBoxNumber.placeholder = "Enter Account No.";
                            stbccaLabel.style.display = "block";
                            chipidLabel.style.display = "none";
                        }
                    }

                    toggleInput();

                    </script>