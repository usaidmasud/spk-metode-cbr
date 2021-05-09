<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'guest';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Help<i class="icon-angle-right"></i></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="content">
<div class="container">
	<div class="row">
		<div class="col-lg-6">
            <div class="panel panel-info">
            	<div class="panel-heading">
            		
            	</div>
                <div class="panel-body">
                <?php
                	$help[0] = array(
                		'title'	 => 'Menu Home',
                		'content' => 'Untuk melihat tampilan awal sistem',
                		'keterangan' => 'Menu Home'
                		);
                	$help[1] = array(
                		'title'	 => 'Menu Login',
                		'content' => 'Untuk admin masuk ke dalam sistem',
                		'keterangan' => 'Menu Login'
                		);
                	$help[2] = array(
                		'title'	 => 'Menu Help',
                		'content' => 'Untuk melihat cara / bantuan tentang penggunaan sistem',
                		'keterangan' => 'Menu Help'
                		);
                	$help[3] = array(
                		'title'	 => 'Menu About',
                		'content' => 'Untuk melihat penjelasan tentang DBD (Demam Berdarah)',
                		'keterangan' => 'Menu About'
                		);
                	$help[4] = array(
                		'title'	 => 'Menu Konsultasi',
                		'content' => 'Untuk pengguna melakukan kosultasi dengan menginputkan nama, usia, dan gender(jenis kelamin) lalu pilih gejala yang dialami',
                		'keterangan' => 'Menu Konsultasi'
                		);
                	echo '<div class="list-group">';
                	for ($row = 0; $row < count($help); $row++):
                ?>
        	        
  <a tabindex="0" class="list-group-item" role="button" data-toggle="popover" data-trigger="focus" title="<?php echo $help[$row]['title'];?>" data-content="<?php echo $help[$row]['content'];?>"><?php echo $help[$row]['keterangan'];?></a>

        	    <?php endfor;?>
        	    </div>
                </div>
            </div>


		</div> <!-- ./col 6 -->
	</div> <!-- ./row -->
</div>	
</section>

