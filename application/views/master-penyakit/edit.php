<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Master<i class="icon-angle-right"></i></li>
					<li><a href="<?php echo base_url().'penyakit';?>">Penyakit</a><i class="icon-angle-right"></i></li>
                    <li class="active">Edit Penyakit</li>
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
                    <h5><i class="fa fa-pencil"></i> Edit Data Penyakit</h5>
                </div>
                <div class="panel-body">
                    <?php echo $pesan;?>
        	        <form class="form-horizontal" action="<?php echo base_url().'penyakit/save';?>" method="post">
                      <div class="form-group">
                        <label for="penyakit" class="col-sm-2 control-label">ID<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="id_penyakit" name="id_penyakit" placeholder="* Isi Nama Penyakit" readonly="on" value="<?php echo $record[0]->id_penyakit;?>" autofocus="on" maxlength="5">
                        </div>
                      </div>
                      
                      <div class="form-group">
                      
                        <label for="penyakit" class="col-sm-2 control-label">Penyakit<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="penyakit" name="penyakit" placeholder="* Isi Penyakit" required="on" autofocus="on" value="<?php echo $record[0]->penyakit;?>" maxlength="50">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="penyakit" class="col-sm-2 control-label">Solusi<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="solusi" name="solusi" placeholder="* Isi Solusi" required="on" autofocus="on" cols="20" rows="3"><?php echo $record[0]->solusi;?></textarea>
                        </div>
                      </div>
                      <input type="hidden" name="mode" value="Edit"/>
                      
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
