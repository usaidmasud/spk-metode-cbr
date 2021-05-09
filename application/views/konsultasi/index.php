<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Konsultasi<i class="icon-angle-right"></i></li>
                    <!--<li><a href="<?php echo base_url().'kasus/add';?>">Tambah Kasus</a></li>-->
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="content">
<div class="container">
	<div class="row">
		<div class="col-lg-8">
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5><i class="fa fa-table"></i> Konsultasi</h5>
                </div>
                <div class="panel-body">
                <?php echo form_open("konsultasi/hasil_konsultasi");?>
                    <div class="row">
                      <div class="col-xs-4">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama pasien" required="on" max="50">
                      </div>
                      <div class="col-xs-2">
                        <label>Usia</label>
                        <input type="text" name="usia" class="form-control" placeholder="Usia" required="on" maxlength="3">
                      </div>
                      <div class="col-xs-3">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="">--Pilih--</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    
                    <!-- /Row -->
                    <!-- Gejala -->
                    <div class="row">
                      <div class="col-xs-4">
                        <label>Gejala yang dialami</label>
                          <?php foreach ($gejala as $row):?>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="<?php echo $row->id_gejala;?>"> <?php echo $row->gejala;?>
                            </label>
                          </div>
                          <?php endforeach;?>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>OK</button>
                <?php echo form_close();?>
                </div>
            </div>
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
