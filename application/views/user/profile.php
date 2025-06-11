<section id="content">



    <div class="container">

        <div class="row">

            <div class="col-12">

                <h3>Profil</h3> 

                <hr>
                <div class="row">
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item"><div class="label">Nama: </div><div id="nameProfile"></div></li>
                            <li class="list-group-item"><div class="label">Email: </div><div id="emailProfile"></div></li>
                            <li class="list-group-item"><div class="label">Jenis Kelamin: </div><div id="genderProfile"></div></li>
                            <li class="list-group-item"><div class="label">Tanggal Lahir: </div><div id="birthdayProfile"></div></li>
                            <li class="list-group-item"><div class="label">Nomor Telepon: </div><div id="phoneProfile"></div></li>
                            <?php
                                if($this->session->userdata('source')){
                            ?>  
                                    <li class="list-group-item">Akun terkait dengan <?=$this->session->userdata('source')?></li>
                            <?php
                                }
                            ?>
                            
                        </ul>
                    </div>

                    <div class="col-6">
                    <div class="btn-group-vertical" role="group" style="width:100%;">
                        <button type="button" data-toggle="modal" href="#edit" class="btn btn-primary btn-block">Ubah Profil</button>
                        <?php
                            if($this->session->userdata('source')==""){
                        ?>
                                <button type="button" data-toggle="modal" href="#editPassword" class="btn btn-primary btn-block">Ganti Kata Sandi</button>
                        <?php
                            }
                        ?>
                        
                    </div>
                    </div>
                </div>

            </div>



        </div>



    </div>

    

</section>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <?=form_open('#', array('id'=>'editForm'))?>
                        <div class="form-group">
                            <input class="form-control" name="editName" type="text" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control"  name="editEmail" type="email" placeholder="Email" onchange="checkemail(this)" disabled required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="editJenisKelamin" required>
                                <option selected disabled>Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="editTanggalLahir" type="date" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="uintTextBox" name="editNoTelp" type="text" placeholder="Nomor Telepon" require>
                        </div>
                        <input type="hidden" name="editIdUser" value="">

                    </form>
                    <div class="form-group">
                        <button class="btn btn-info btn-block" id="btnEdit" onclick="edit()">Simpan</button>
                    </div>  
                    
                        <!-- <button class="btn btn-info" id="register" onclick="registermanual()">Submit</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <?=form_open('#', array('id'=>'editPasswordForm'))?>
                        <div class="form-group">
                            <input class="form-control"  name="editCurrentPassword" type="password" placeholder="Kata Sandi Saat Ini" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control"  name="editPassword" type="password" onchange="checkChangePassword()" placeholder="Kata Sandi Baru" required>
                            <small id="length-help-text" class="form-text text-muted">
                        </div>
                        <div class="form-group">
                            <input class="form-control"  name="editPasswordAgain" type="password" onchange="checkChangePassword()" placeholder="Ulangi Kata Sandi" required>
                        </div>
                        <input type="hidden" name="editIdUser" value="">
                        <input type="hidden" name="editEmail" value="<?=$this->session->userdata('email')?>">

                    </form>
                    <div class="form-group">
                        <button class="btn btn-info btn-block" id="btnEditPassword" onclick="changePassword()" disabled>Simpan</button>
                    </div>  
                    
                        <!-- <button class="btn btn-info" id="register" onclick="registermanual()">Submit</button> -->
                </div>
            </div>
        </div>
    </div>



<script src="<?=base_url()?>js/profil.js"></script>