<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this free HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title><?=$title?> - POS Tag Indonesia</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/4.2.0/firebaseui.css" />
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.2.0/firebase-ui-auth.css" />
    <link href="<?=base_url()?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>css/fontawesome-all.css" rel="stylesheet">
    <link href="<?=base_url()?>css/swiper.css" rel="stylesheet">
    <link href="<?=base_url()?>css/magnific-popup.css" rel="stylesheet">
    <link href="<?=base_url()?>css/checkbox.css" rel="stylesheet">
    <link href="<?=base_url()?>css/styles.css" rel="stylesheet">
    <link href="<?=base_url()?>css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.15.4/dist/extensions/sticky-header/bootstrap-table-sticky-header.css" rel="stylesheet">

    
	
	<!-- Favicon  -->
    <link rel="icon" href="<?=base_url()?>images/favicon.png">

    <script src="<?=base_url()?>js/jquery.min.js"></script>
    <script>
        
        var base_url = "<?=base_url()?>";
        <?php
            if($page=="pos" || $page=="ner"){
        ?>
                var onContribute = true;
        <?php
            }else{
        ?>
                var onContribute = false;
        <?php
            }
        ?>

        <?php
            if($this->session->has_userdata('email')){
        ?>
                var loginStatus = true;
        <?php
            }else{
        ?>
                var loginStatus = false;
        <?php
            }
        ?>
        
        var csrf_token_name = "<?=$this->security->get_csrf_token_name()?>";
        var csrf_token_hash = "<?=$this->security->get_csrf_hash()?>";
    
    </script>
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

    <?php
        if(
            !empty($this->session->flashdata('notification'))
        ){
    ?>
            <div id="notif" class="alert alert-<?=$this->session->flashdata('notification')['type']?>" role="alert" style="position:fixed;top:10px;right:10px;z-index:1000;">
                <?=$this->session->flashdata('notification')['message']?>
            </div>
    <?php
        }
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom static-top top-nav-collapse">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="<?=base_url()?>">
			<!-- <img src="images/logo.svg" alt="alternative"> -->
			<h4><span class="turquoise">POSTAG </span>Indonesia</h4><?php print_r($this->session->flashdata('notification'));?>
		</a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->
		
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=base_url()?>#header">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=base_url()?>#carakerja">Cara Kerja</a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=base_url()?>#posdanner">POS & NER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=base_url()?>#tujuan">Tujuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=base_url('docs')?>">Dokumentasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=base_url()?>#unduh">Unduh</a>
                </li>
                <li class="nav-item">
                    <?php
                        if(empty($this->session->userdata('email'))){
                    ?>
                    <a class="nav-link" data-toggle="modal" href="#login">Masuk</a>
                    <?php
                        }else{
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$this->session->userdata('email')?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('user')?>">Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('user/contribution')?>">Contribution</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="logout('<?=base_url()?>')" href="#">Logout</a>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </li>
                

            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="#facebook">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="#twitter">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

    <?=$contents?>

        
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col">
                        <h4>Tentang POSTAG Indonesia</h4>
                        <p>Kami berinisiatif untuk meningkatkan bidang NLP di Indonesia dengan membuat wadah yang mampu menampung dan menggabungkan para penggiat NLP sebagai kontributor</p>
                    </div>
                </div>
                <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Important Links</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Our partners
                                    <a class="turquoise" href="http://kalbis.ac.id">Kalbis Institute</a>
                                </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Read our
                                    <a class="turquoise" href="terms-conditions.html">Terms & Conditions</a>,
                                    <a class="turquoise" href="privacy-policy.html">Privacy Policy</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end of col -->
                <div class="col-md-4"> 
                    <div class="footer-col last">
                        <h4>Social Media</h4>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-google-plus-g fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of footer -->
    <!-- end of footer -->

    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © POSTAG Indonesia 2019</p>
                </div>
                <!-- end of col -->
            </div>
            <!-- enf of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of copyright -->
    <!-- end of copyright -->

    <!-- Scripts -->
    
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php
                    if($this->session->has_userdata('email')){
                        echo "Terima kasih kontribusimu telah kami catat";
                    }else{
                ?>
                    <?=form_open('#', array('id'=>'loginForm'))?>
                        <div class="form-group">
                            <input class="form-control"  name="email" type="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control"  name="password" type="password" placeholder="Password" required>
                        </div>
                    </form>
                    
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" onclick="login()">Masuk</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-block" data-toggle="modal" href="#daftar">Daftar</button>
                    </div>
                        
                    <hr>

                    <div class="firebaseui-auth-container"></div>

                <?php
                    }
                ?>

                </div>
            </div>
        </div>
    </div>
    
    <?php

        if(!$this->session->has_userdata('email')){
    ?>
            <!-- Modal -->
            <div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <?=form_open('#', array('id'=>'registerForm'))?>
                                <div class="form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="email" type="email" placeholder="Email" onchange="checkEmail()" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="no_telp" type="text" placeholder="Nomor Telepon" require>
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="password" type="password" placeholder="Kata Sandi" onchange="checkPassword()" required>
                                    <small id="length-help-text" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="passwordagain" type="password" placeholder="Ulangi Kata Sandi" onchange="checkPassword()" required>
                                </div>

                            </form>
							
                            <div class="form-group">
                                <button class="btn btn-info btn-block" id="btnDaftar" onclick="register()" disabled>Daftar</button>
                            </div>  
                            
                                <!-- <button class="btn btn-info" id="register" onclick="registermanual()">Submit</button> -->
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }

    ?>

    <script src="<?=base_url()?>js/popper.min.js"></script>
    <!-- Popper tooltip library for Bootstrap -->
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <!-- Bootstrap framework -->
    <script src="<?=base_url()?>js/jquery.easing.min.js"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?=base_url()?>js/swiper.min.js"></script>
    <!-- Magnific Popup for lightboxes -->
    <script src="<?=base_url()?>js/validator.min.js"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="<?=base_url()?>js/pwstrength-bootstrap/pwstrength-bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/jquery.nicescroll.min.js"></script>
    <script src="<?=base_url()?>js/scripts.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-app.js"></script>
    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-firestore.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-analytics.js"></script>
    <script src="https://cdn.firebase.com/libs/firebaseui/4.2.0/firebaseui.js"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/4.2.0/firebase-ui-auth__id.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script src="<?=base_url()?>js/login.js"></script>
    <script src="<?=base_url()?>js/firebase.js"></script>
    <script src="<?=base_url()?>js/firebase-ui.js"></script>
  
    
    <script>
        var nice = $("html").niceScroll({cursorcolor: "#12bbd4"});
        var nice = $(".section-table-tag").niceScroll({cursorcolor: "#12bbd4", boxzoom: true});
        //$(".table").bootstrapTable();
    </script>
    <script>
        $(window).on('load', function() {
            $("#table").bootstrapTable({});
	    });
    </script>

    </body>
</html>