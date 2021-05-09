<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Master<i class="icon-angle-right"></i></li>
					<li><a href="<?php echo base_url().'kasus';?>">Kasus</a><i class="icon-angle-right"></i></li>
                    <li class="active">Tambah Kasus</li>
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
                    <h5><i class="fa fa-edit"></i> Entry Data Kasus</h5>
                </div>
                <div class="panel-body">
                <?php echo $pesan;?>
        	        <form class="form-horizontal" action="<?php echo base_url().'kasus/save';?>" method="post">
                      <div class="form-group">
                        <label for="nama_pasien" class="col-sm-2 control-label">ID<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="id_kasus" name="id_kasus" placeholder="* Isi Nama Pasien" required="on" readonly="on" value="<?php echo $id_kasus;?>" maxlength="5">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="nama_pasien" class="col-sm-2 control-label">Nama<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="* Isi Nama Pasien" required="on" autofocus="on" maxlength="50">
                        </div>
                      </div>
                      <!-- Usia -->
                      <div class="form-group">
                        <label for="usia" class="col-sm-2 control-label">Usia<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="usia" class="form-control" id="usia" name="usia" placeholder="* Isi usia" required="on" autofocus="on" maxlength="3">
                        </div>
                      </div>
                      <!-- /Usia -->
                      
                      <!-- Gender -->
                      <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <select id="gender" name="gender" class="form-control">
                            <option value="">-- Pilih Gender --</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <!-- /Gender -->
                      
                      <!-- Penyakit -->
                      <div class="form-group">
                        <label for="penyakit" class="col-sm-2 control-label">Penyakit<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <select id="id_penyakit" name="id_penyakit" class="form-control">
                            <option value="">-- Pilih Penyakit --</option>
                            <?php foreach ($penyakit as $row):?>
                            <option value="<?php echo $row->id_penyakit;?>"><?php echo $row->penyakit;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <!-- /Penyakit -->
                      
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
