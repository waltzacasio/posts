<h1><?= $title;?></h1>
<hr>
<div class="row">

    <div class="col-lg-12">

                    <script>

                    function toggleInput() {
                        var inputBoxNumber = document.getElementById("boxnumber");
                        var inputChipCCA = document.getElementById("chipcca");
                        var inputSTB = document.getElementById("stb");
                        var radioGpinoy = document.getElementById("gpinoy");
                        var radioGsatHD = document.getElementById("gsathd");
                        var radioCignal = document.getElementById("cignal");
                        var radioSatlite = document.getElementById("satlite");

                        if (radioGpinoy.checked) {
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
                        }
                    }

                    </script>



    
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
                
                <input type="text" name="firstname" class="form-control"  placeholder="First Name" value="<?= set_value('firstname');?>">
                <?php echo form_error('firstname'); ?>
                <br> 
                <input type="text" name="lastname" class="form-control"  placeholder="Last Name" value="<?= set_value('lastname');?>">
                <?php echo form_error('lastname'); ?>
                <br> 
                <input type="text" name="address" class="form-control"  placeholder="Address" value="<?= set_value('address');?>"> 
                <?php echo form_error('address'); ?>
                <br> 
                <input type="text" id="boxnumber" name="boxnumber" class="form-control"  placeholder="Box / SN / Acc No." value="<?= set_value('boxnumber');?>"> 
                <?php echo form_error('boxnumber'); ?>
                <br> 
                <input type="text" id="chipcca" name="chipcca" class="form-control"  placeholder="Chip ID / CCA No." value="<?= set_value('chipcca');?>">
                <?php echo form_error('chipcca'); ?>
                <br> 
                <input type="text" id="stb" name="stb" class="form-control"  placeholder="STB ID" value="<?= set_value('stb');?>"> 
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Get the selected radio button value
                        $selectedBoxType = $_POST['boxtype'];
                        if (isset($_POST['boxtype'])) {
                        // Use the selected value
                        if ($selectedBoxType === 'cignal' || 'satlite') {
                            echo form_error('stb');
                        } else if ($selectedBoxType === 'gpinoy' || 'gsathd') {
                            //
                        }
                        }
                      }
                 ?>
                <br>

                
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
                <input type="text" name="dateofpurchase" class="form-control"  placeholder="Date of Transaction" value="<?= set_value('dateofpurchase');?>">
                <?php echo form_error('dateofpurchase'); ?>
                <br> 
                <input type="text" name="contact" class="form-control"  placeholder="Contact No." value="<?= set_value('contact');?>">
                <br> 
                <input type="text" name="installer" class="form-control"  placeholder="Installer" value="<?= set_value('installer');?>"> 
                <?php echo form_error('installer'); ?>
                <br>
            <div class="form-group">
                <textarea name="remarks" id="" cols="30" rows="5" class="form-control" placeholder="Enter remarks" value="<?= set_value('remarks');?>"></textarea>
            </div>

        </div>
            <br>
        
            <button type="submit" name="submit" class="btn btn-success">Submit</button>


    </div>


</div>