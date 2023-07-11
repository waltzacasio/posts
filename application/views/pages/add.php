<h1><?= $title;?></h1>
<hr>
<div class="row">

    <div class="col-lg-12">





    
                <?= form_open('add');?>

                <b>Select Box Type :</b>
                
                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="gpinoy" id="gpinoy" onchange="toggleInput()">
                <label class="btn btn-outline-success" for="gpinoy">
                    Gpinoy
                </label>
                </div>

                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="gsathd" id="gsathd" onchange="toggleInput()">
                <label class="btn btn-outline-primary" for="gsathd">
                    GSAT HD
                </label>
                </div>

                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="cignal" id="cignal" onchange="toggleInput()">
                <label class="btn btn-outline-danger" for="cignal">
                    Cignal
                </label>
                </div>

                <div class="form-check form-check-inline">
                <input class="btn-check" type="radio" name="boxtype" value="satlite" id="satlite" onchange="toggleInput()">
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
                <b>Chip ID / CCA No. :</b>
                <input type="text" id="chipcca" name="chipcca" class="form-control"  placeholder="Enter Chip ID / CCA No." value="<?= set_value('chipcca');?>">
                <?php echo form_error('chipcca'); ?>
                <br> 
                <div id="stb_label_input">
                <b id="stb_label_add">STB ID :</b>
                <input type="text" id="stb" name="stb" class="form-control"  placeholder="Enter STB ID" value="<?= set_value('stb');?>">
                
                <?php if ($selectedBoxType === 'cignal' || $selectedBoxType === 'satlite') {if (form_error('stb')): ?>
                <div id="stb_error" class="error"><?php echo form_error('stb'); ?></div>
                 <?php endif;} ?>
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
                        var inputChipCCA = document.getElementById("chipcca");
                        //var inputSTB = document.getElementById("stb");
                        var radioGpinoy = document.getElementById("gpinoy");
                        var radioGsatHD = document.getElementById("gsathd");
                        var radioCignal = document.getElementById("cignal");
                        var radioSatlite = document.getElementById("satlite");
                        var stb_error = document.getElementById("stb_error");
                        var stb_label_input = document.getElementById("stb_label_input");



                        if (radioGpinoy.checked) {
                            inputBoxNumber.placeholder = "Serial Number (SN)";
                            inputChipCCA.placeholder = "Chip ID";
                            //inputSTB.style.display = "none";
                            stb_error.style.display = "none";
                            stb_label_input.style.display = "none";
                        } else if (radioGsatHD.checked) {
                            inputBoxNumber.placeholder = "Serial Number (SN) / Access ID";
                            inputChipCCA.placeholder = "Chip ID";
                            //inputSTB.style.display = "none";
                            stb_error.style.display = "none";
                            stb_label_input.style.display = "none";
                        } else if (radioCignal.checked) {
                            inputBoxNumber.placeholder = "Account No.";
                            inputChipCCA.placeholder = "CCA No.";
                            //inputSTB.style.display = "block";
                            //stb_label_input.style.display = "block";
                            stb_label_input.style.display = "block";
                        } else if (radioSatlite.checked) {
                            inputBoxNumber.placeholder = "Account No.";
                            inputChipCCA.placeholder = "CCA No.";
                            //inputSTB.style.display = "block";
                            //stb_label_input.style.display = "block";
                            stb_label_input.style.display = "block";
                        }
                    }

                    document.addEventListener("DOMContentLoaded", function() {
                    // Check if there is a stored value for 'boxtype' in local storage
                    var storedValue = localStorage.getItem("boxtype");
                    if (storedValue) {
                        // Retrieve the radio button element based on the stored value and set it as checked
                        var radio = document.querySelector('input[name="boxtype"][value="' + storedValue + '"]');
                        if (radio) {
                        radio.checked = true;
                        }
                    }

                    // Listen for change event on radio buttons
                    var radios = document.querySelectorAll('input[name="boxtype"]');
                    radios.forEach(function(radio) {
                        radio.addEventListener("change", function() {
                        // Store the selected value in local storage
                        localStorage.setItem("boxtype", this.value);
                        });
                    });

                    toggleInput();
                    });


                    </script>