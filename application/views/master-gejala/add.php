<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Master<i class="icon-angle-right"></i></li>
					<li><a href="<?php echo base_url().'gejala';?>">Gejala</a><i class="icon-angle-right"></i></li>
                    <li class="active">Tambah Gejala</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="content">
<div class="container">
	<div class="row">
		<div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5><i class="fa fa-edit"></i> Entry Data Gejala</h5>
                </div>
                <div class="panel-body">
                <?php echo $pesan;?>
        	        <form class="form-horizontal" action="<?php echo base_url().'gejala/save';?>" method="post">
                      
                      <div class="form-group">
                        <label for="id_gejala" class="col-sm-2 control-label">ID<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="id_gejala" name="id_gejala" placeholder="* ID Gejala" required="on" value="<?php echo $id_gejala;?>" readonly="on" maxlength="5">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="gejala" class="col-sm-2 control-label">Gejala<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="gejala" name="gejala" placeholder="* Isi nama gejala" required="on" autofocus="on" maxlength="100">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="bobot" class="col-sm-2 control-label">Bobot<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="bobot" name="bobot" placeholder="* Isi bobot gejala" required="on" autofocus="on" maxlength="3">
                          <span id="helpBlock" class="help-block">Isi bobot (1 .. 100)</span>
                        </div>
                      </div>
                      <input type="hidden" name="mode" value="New"/>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      </div>
                    </form> <!-- ./form -->
                </div> <!-- ./panel body -->
            </div> <!-- ./panel -->
		</div> <!-- ./col 6 -->
        <!--
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <div class="panel-body">
                
                </div>
            </div>
		</div> <!-- End col 6 -->
	</div> <!-- ./row -->
</div>	
</section>
