<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li><a href="<?php echo base_url().'basis_kasus';?>">Basis Kasus</a><i class="icon-angle-right"></i></li>
                    <li class="active">Tambah Basis Kasus</li>
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
                    <h5><i class="fa fa-edit"></i> Entry Data Basis Kasus</h5>
                </div>
                <div class="panel-body">
                <?php echo $pesan;?>
        	        <form class="form-horizontal" action="<?php echo base_url().'basis_kasus/save';?>" method="post">
                      <div class="form-group">
                        <label for="id_kasus" class="col-sm-2 control-label">Kasus<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_kasus">
                                <option value="">-- Pilih Kasus --</option>
                                <?php foreach ($kasus as $row):?>
                                <option value="<?php echo $row->id_kasus;?>"><?php echo $row->nama_pasien.nbs(3).'('.$row->usia.' th)';?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="gejala" class="col-sm-2 control-label">Pilih Gejala<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                        <?php $no = 0;foreach($gejala as $row):?>
                          <label class="checkbox-inline">
                              <input type="checkbox" id="inlineCheckbox1" name="<?php echo $row->id_gejala;?>"> <?php echo $row->gejala;?>
                          </label>
                        <?php endforeach;?>
                        </div>
                      </div>
                      
                      <input type="hidden" name="mode" value="New"/>
                      <input type="hidden" name="jum_gejala" value="<?php echo count($gejala);?>"/>
                      
                      
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
