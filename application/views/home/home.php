    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">POS dan NER Tagging</span> <br>Bahasa Indonesia</h1>
                            <p class="p-large">Bersama mendukung perkembangan Natural Language Programming Bahasa Indonesia</p>
                            <a class="btn-solid-lg page-scroll btn-primary" href="#carakerja">Cara Kerja</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="<?=base_url('images/header-teamwork.svg')?>" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Services -->
    <div id="carakerja" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cara Kerja</h2>
                    <p class="p-heading p-large">Lakukan tag pada artikelmu dan gabungkan dengan seluruh kontributor</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card" style="height:350px;">
                        <img class="card-image" src="<?=base_url('images/services-icon-1.svg')?>" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Unggah</h4>
                            <p>Unggah artikel (file txt atau doc atau docx) milikmu atau copy-paste artikel milikmu</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card" style="height:350px;">
                        <img class="card-image" src="<?=base_url('images/services-icon-2.svg')?>" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Tag</h4>
                            <p>Berikan tag pada setiap kata artikelmu dengan menggunakan tag yang telah disediakan atau kamu dapat menambahkannya sendiri</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card" style="height:350px;">
                        <img class="card-image" src="<?=base_url('images/services-icon-3.svg')?>" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Simpan</h4>
                            <p>Simpan artikel yang telah kamu tag dan tuliskan namamu sebagai kontributor</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->




    <!-- Details 1 -->
    <div class="basic-1" id="posdanner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Mulai Masukan Artikelmu</h2>
                        <p>Lakukan tag yang sesuai <a href="<?=base_url('docs');?>">dokumen</a> pada artikel yang kamu unggah</p>
                        <a class="btn-solid-reg" data-toggle="modal" href="#mulai">Mulai</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="<?=base_url('images/details-1-office-worker.svg')?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 1 -->

    
    <!-- Details 2 -->
    <div class="basic-2" id="tujuan">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="<?=base_url('images/details-2-office-team-work.svg')?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Tujuan Kami</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Membuat platform yang dapat menyalurkan kontribusi artikel dan tag kata dari berbagai penggiat NLP di Indonesia</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Membuat corpus lengkap dalam Bahasa Indonesia</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Corpus dan hasil kontribusi digunakan untuk kepentingan bersama</div>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->

    <!-- Modal -->
    <div class="modal fade" id="mulai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unggah atau Masukan Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="masukkan-tab" data-toggle="tab" href="#masukkan" role="tab" aria-controls="masukkan" aria-selected="true">Masukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="unggah-tab" data-toggle="tab" href="#unggah" role="tab" aria-controls="unggah" aria-selected="false">Unggah</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="masukkan" role="tabpanel" aria-labelledby="masukkan-tab">
                        <?=form_open(base_url('pos'))?>
                            <div class="form-group">
                                <textarea type="textarea" id="summernote" name="artikel" class="form-control" rows="14"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" style="width:100%;" value="Lanjutkan">
                        </form>
                    </div>
                    <div class="tab-pane fade" id="unggah" role="tabpanel" aria-labelledby="unggah-tab">
                        <?php echo form_open_multipart(base_url('pos'));?>
                            <div class="form-group">
                                <input type="file" name="userfile" required>
                                <small id="emailHelp" class="form-text text-muted">File .txt</small>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" style="width:100%;" value="Lanjutkan">
                        </form>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>


    


    <!-- Request -->
    <div id="unduh" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <h2>Daftar Unduh</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Konten</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Data POS Tagging.txt</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/postagingtxt" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data POS Tagging Filtered.txt</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/postagingfiltertxt" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data NER Tagging.txt</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/nertagingtxt" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data NER Tagging Filtered.txt</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/nertagingfiltertxt" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data POS & NER Tagging.txt</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/posnertagingtxt" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data POS & NER Tagging Filtered.txt</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/posnertagingfiltertxt" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data POS Tagging.csv</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/postagingcsv" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data NER Tagging.csv</td>
                                    <td>
                                        <?php
                                            if($this->session->has_userdata('email')){
                                                echo '<a href="download/nertagingcsv" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }else{
                                                echo '<a data-toggle="modal" href="#login" class="btn-solid-reg popup-with-move-anim">Unduh</a>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <style>
                           
                        </style>

    <!-- <div id="login_div" class="main-div">
        <h3>Firebase Web login Example</h3>
        <input type="email" placeholder="Email..." id="email_field" />
        <input type="password" placeholder="Password..." id="password_field" />

        <button onclick="login()">Login to Account</button>
    </div>

    <div id="user_div" class="loggedin-div">
        <h3>Welcome User</h3>
        <p id="user_para">Welcome to Firebase web login Example. You're currently logged in.</p>
        <button onclick="logout()">Logout</button>
    </div>

    <button class="btn btn-primary" onclick="loginGoogle()" >Login Google</button> -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of request -->


  

 