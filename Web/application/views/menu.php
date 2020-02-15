<nav class="navbar navbar-expand-sm bg-light navbar-dark">
<div id="menu_area" class="menu-area">
  <div class="container">
    <div class="row">
<nav class="navbar navbar-light navbar-expand-lg mainmenu">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li><a href="<?php echo base_url();?>index.php/dashboard">
    <img src="<?php echo base_url(); ?>\assets\logo.png" width="130" height=26></a></li>                    
      <li class="dropdown">
      <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Master</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li class="dropdown">
          <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customer</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php echo anchor("customer/daftar","Daftar Customer",array("class"=>"dropdown-item")); ?>
              <?php echo anchor("customer/form","Form Input Customer",array("class"=>"dropdown-item")); ?>
            </ul>
          </li>
                                
                <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bis</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php echo anchor("bis/daftar","Daftar Bis",array("class"=>"dropdown-item")); ?>
                    <?php echo anchor("bis/form","Form Input Bis",array("class"=>"dropdown-item")); ?>
                  </ul>
                </li>
                              
                <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Driver</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php echo anchor("driver/daftar","Daftar Driver",array("class"=>"dropdown-item")); ?>
                    <?php echo anchor("driver/form","Form Input Driver",array("class"=>"dropdown-item")); ?>
                  </ul>
                </li>

                <li class="dropdown">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Asisten</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php echo anchor("asisten/daftar","Daftar Asisten",array("class"=>"dropdown-item")); ?>
                      <?php echo anchor("asisten/form","Form Input Asisten",array("class"=>"dropdown-item")); ?>
                    </ul>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Penyewaan</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><?php echo anchor("penyewaan/form","Form Input Penyewaan",array("class"=>"dropdown-item")); ?></li>
                  <li><?php echo anchor("penyewaan/daftar","Cetak BO",array("class"=>"dropdown-item")); ?></li>
                </ul>
            </li>
                                 
            <li class="dropdown">
              <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pembayaran</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><?php echo anchor("pembayaran/form","Form Input Pembayaran",array("class"=>"dropdown-item")); ?></li>
                <li><?php echo anchor("pembayaran/daftar","Cetak BR",array("class"=>"dropdown-item")); ?></li>
              </ul>  
            </li>

          <li class="dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Surat Jalan</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><?php echo anchor("antar/form","Form Input Surat Jalan",array("class"=>"dropdown-item")); ?></li>
              <li><?php echo anchor("antar/daftar","Cetak SJ",array("class"=>"dropdown-item")); ?></li>
            </ul>  
          </li>
                   

          <li class="dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><?php echo anchor("laporani/income","Laporan Pendapatan",array("class"=>"dropdown-item")); ?></li>
              <li><?php echo anchor("laporane/expense","Laporan Pengeluaran",array("class"=>"dropdown-item")); ?></li>
            </ul>  
          </li>

          
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" position="right" aria-expanded="false"><?php echo $this->session->userdata('NamaPengguna'); ?></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><?php echo anchor("login/logout","Log Out",array("class"=>"dropdown-item")); ?></li>
            </ul>
          </li>
          
        </ul>
				</li>
			  </ul>
		    </div>
      </nav>
    </div>
  </div>
</div>
</nav>
<script>
(function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});
})(jQuery)
</script>
<style>
.menu-area{background: #f8f9fa}
.dropdown-menu{padding:0;margin:0;border:0 solid transition!important;border:0 solid rgba(0,0,0,.15);border-radius:0;-webkit-box-shadow:none!important;box-shadow:none!important}
.mainmenu a, .navbar-default .navbar-nav > li > a, .mainmenu ul li a , .navbar-expand-lg .navbar-nav .nav-link{color:#000;font-size:16px;text-transform:capitalize;padding:16px 15px;font-family:'Roboto',sans-serif;display: block !important;}
.mainmenu .active a,.mainmenu .active a:focus,.mainmenu .active a:hover,.mainmenu li a:hover,.mainmenu li a:focus ,.navbar-default .navbar-nav>.show>a, .navbar-default .navbar-nav>.show>a:focus, .navbar-default .navbar-nav>.show>a:hover{color: #fff;background: #4CAF50;outline: 0;}
/*==========Sub Menu=v==========*/
.mainmenu .collapse ul > li:hover > a{background: #4CAF50;}
.mainmenu .collapse ul ul > li:hover > a, .navbar-default .navbar-nav .show .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .show .dropdown-menu > li > a:hover{background: #4CAF50;}
.mainmenu .collapse ul ul ul > li:hover > a{background: #4CAF50;}

.mainmenu .collapse ul ul, .mainmenu .collapse ul ul.dropdown-menu{background:#1565C0;}
.mainmenu .collapse ul ul ul, .mainmenu .collapse ul ul ul.dropdown-menu{background:#1E88E5}
.mainmenu .collapse ul ul ul ul, .mainmenu .collapse ul ul ul ul.dropdown-menu{background:#64B5F6}

/******************************Drop-down menu work on hover**********************************/
.mainmenu{background: none;border: 0 solid;margin: 0;padding: 0;min-height:20px;width: 100%;}
@media only screen and (min-width: 767px) {
.mainmenu .collapse ul li:hover> ul{display:block}
.mainmenu .collapse ul ul{position:absolute;top:100%;left:0;min-width:250px;display:none}
/*******/
.mainmenu .collapse ul ul li{position:relative}
.mainmenu .collapse ul ul li:hover> ul{display:block}
.mainmenu .collapse ul ul ul{position:absolute;top:0;left:100%;min-width:250px;display:none}
/*******/
.mainmenu .collapse ul ul ul li{position:relative}
.mainmenu .collapse ul ul ul li:hover ul{display:block}
.mainmenu .collapse ul ul ul ul{position:absolute;top:0;left:-100%;min-width:250px;display:none;z-index:1}

}
@media only screen and (max-width: 767px) {
.navbar-nav .show .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 35px}
.navbar-nav .show .dropdown-menu .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 45px}
}
</style>