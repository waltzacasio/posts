<h1><?= $title;?></h1>
<hr>
<?= validation_errors();?>
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



    
                <?= form_open('add');?>

        
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="boxtype" id="gpinoy" onchange="toggleInput()">
                <label class="form-check-label" for="gpinoy">
                    Gpinoy
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="boxtype" id="gsathd" onchange="toggleInput()">
                <label class="form-check-label" for="gsathd">
                    GSAT HD
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="boxtype" id="cignal" onchange="toggleInput()">
                <label class="form-check-label" for="cignal">
                    Cignal
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="boxtype" id="satlite" onchange="toggleInput()">
                <label class="form-check-label" for="satlite">
                    Satlite
                </label>
                </div>



        <div class="form-group">
<br>
                <input type="text" name="firstname" class="form-control"  placeholder="First Name" value="<?= set_value('firstname');?>">
                <br> 
                <input type="text" name="lastname" class="form-control"  placeholder="Last Name" value="<?= set_value('lastname');?>">
                <br> 
                <input type="text" name="address" class="form-control"  placeholder="Address" value="<?= set_value('address');?>"> 
                <br> 
                <input type="text" id="boxnumber" name="boxnumber" class="form-control"  placeholder="Box / SN / Acc No." value="<?= set_value('boxnumber');?>"> 
                <br> 
                <input type="text" id="chipcca" name="chipcca" class="form-control"  placeholder="Chip ID / CCA No." value="<?= set_value('chipcca');?>">
                <br> 
                <input type="text" id="stb" name="stb" class="form-control"  placeholder="STB ID" value="<?= set_value('stb');?>"> 
                <br>

                
                <!-- purchase type -->
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="purchasetype" id="install">
                <label class="form-check-label" for="install">
                    Install
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="purchasetype" id="set">
                <label class="form-check-label" for="set">
                    Set
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="purchasetype" id="boxkit">
                <label class="form-check-label" for="boxkit">
                    Box Kit
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="purchasetype" id="nagparecord">
                <label class="form-check-label" for="nagparecord">
                    Nagparecord
                </label>
                </div>
                <br>
                <br>
                <input type="text" name="dateofpurchase" class="form-control"  placeholder="Date of Purchase" value="<?= set_value('dateofpurchase');?>"> 
                <br> 
                <input type="text" name="contact" class="form-control"  placeholder="Contact No." value="<?= set_value('contact');?>">
                <br> 
                <input type="text" name="installer" class="form-control"  placeholder="Installer" value="<?= set_value('installer');?>"> 
                <br>
            <div class="form-group">
                <textarea name="remarks" id="" cols="30" rows="5" class="form-control" placeholder="Enter remarks" value="<?= set_value('remarks');?>"></textarea>
            </div>

        </div>
            <br>
        
            <button type="submit" name="submit" class="btn btn-success">Submit</button>


    </div>


</div>