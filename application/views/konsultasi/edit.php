<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li><a href="<?php echo base_url().'kasus';?>">Kasus</a><i class="icon-angle-right"></i></li>
                    <li class="active">Edit Kasus</li>
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
                    <h5><i class="fa fa-pencil"></i> Edit Data Kasus</h5>
                </div>
                <div class="panel-body">
                    <?php echo $pesan;?>
        	        <form class="form-horizontal" action="<?php echo base_url().'kasus/save';?>" method="post">
                      <div class="form-group">
                        <label for="nama_pasien" class="col-sm-2 control-label">Nama<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="* Isi Nama Pasien" required="on" autofocus="on" maxlength="50" value="<?php echo $record[0]->nama_pasien;?>">
                        </div>
                      </div>
                      <!-- Usia -->
                      <div class="form-group">
                        <label for="usia" class="col-sm-2 control-label">Usia<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="usia" class="form-control" id="usia" name="usia" placeholder="* Isi usia" required="on" autofocus="on" maxlength="3" value="<?php echo $record[0]->usia;?>">
                        </div>
                      </div>
                      <!-- /Usia -->
                      
                      <!-- Gender -->
                      <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <select id="gender" name="gender" class="form-control">
                            <option value="">-- Pilih Gender --</option>
                            <option value="L" <?php echo ($record[0]->gender == "L")?"selected":"";?>>Laki - Laki</option>
                            <option value="P" <?php echo ($record[0]->gender == "P")?"selected":"";?>>Perempuan</option>
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
                            <option value="<?php echo $row->id_penyakit;?>" <?php echo ($row->id_penyakit == $record[0]->id_penyakit)?"selected":"";?>><?php echo $row->penyakit;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <!-- /Penyakit -->
                      
                      <input type="hidden" name="mode" value="Edit"/>
                      <input type="hidden" name="id_kasus" value="<?php echo $record[0]->id_kasus;?>"/>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
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
