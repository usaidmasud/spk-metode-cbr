<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'guest';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="<?php echo base_url().'konsultasi';?>">Konsultasi</a></li>
                    <li class="active">Hasil Konsultasi<i class="icon-angle-right"></i></li>
                    
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="content">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5><i class="fa fa-table"></i> Data Kasus</h5>
                </div>
                <div class="panel-body">
                <label>Data Inputan</label>
                <dl class="dl-horizontal">
                
                  <dt>Nama pasien</dt>
                    <dd><?php echo $person['nama_pasien'];?></dd>
                  <dt>Usia</dt>
                    <dd><?php echo $person['usia'];?></dd>
                  <dt>Gender</dt>
                    <dd><?php echo $person['gender'];?></dd>
                  <dt>Gejala yang dialami</dt>
                  <?php 
                    for ($row = 0; $row < count($gejala); $row++){
                        if ($person[$gejala[$row]->id_gejala] == "True") 
                        echo '<dd><i class="fa fa-check fa fw"></i>'.nbs(2).$gejala[$row]->gejala.'</dd>';
                    }
                  ?>
                </dl>
                
                <hr />
                <label>Similarity</label>
                <?php 
                    echo form_open("konsultasi/save");
                    echo form_hidden('nama_pasien',$person['nama_pasien']);
                    echo form_hidden('usia',$person['usia']);
                    echo form_hidden('gender',$person['gender']);
                    
                    $jum_gejala = 0;
                    $no = 0;
                    for ($row = 0; $row < count($gejala); $row++){
                        if ($person[$gejala[$row]->id_gejala] == "True"){
                            echo form_hidden('g'.$no,$gejala[$row]->id_gejala);
                            $no++;
                            $jum_gejala++;    
                        } 
                    }
                    echo form_hidden('jum_gejala',$jum_gejala);
                ?>
                
                
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Usia</th>
                        <th>Gender</th>
                        <th>Gejala yg Dialami</th>
                        <th>Penyakit</th>
                        <th>Solusi</th>
                        <th>%</th>
                        <!--<th>Pilih</th>-->
                    </tr>
                    
                    <?php 
                   
                    $no = 1;
                    echo form_hidden('id_penyakit',$temp_kasus[0]->id_penyakit);
                    //echo heading($temp_kasus[0]->id_penyakit,2);
                    foreach($temp_kasus as $row){
                        echo '<tr>';
                            echo '<td>'.$row->id_kasus.'</td>';
                            echo '<td>'.$row->nama_pasien.'</td>';
                            echo '<td>'.$row->usia.' th</td>';
                            echo '<td>'.$row->gender.'</td>';
                            echo '<td>';
                            foreach ($basis_kasus as $col) {
                                
                                if ($col->id_kasus == $row->id_kasus) {
                                    echo '<i class="fa fa-check fa fw"></i>'.nbs(2).$col->gejala.br(1);
                                }
                                
                            }
                            echo '</td>';
                            echo '<td>'.$row->penyakit.'</td>';
                            echo '<td>'.$row->solusi.'</td>';
                            echo '<td>'.$row->skor.'</td>';
                        echo '</tr>';
                    }
                    ?>
                        
                </table>
                
                <hr />
                <!--
                <div class="well well-sm">
                    <dl>
                      <dt>Kasus</dt>
                        <dd><?php echo $temp_kasus[0]->nama_pasien;?></dd>
                      <dt>Tingkat kemiripan</dt>
                        <dd><?php echo $temp_kasus[0]->skor.' %';?></dd>
                      <dt>Penyakit</dt>
                        <dd><?php echo $temp_kasus[0]->penyakit;?></dd>
                      <dt>Solusi</dt>
                        <dd><?php echo $temp_kasus[0]->solusi;?></dd>
                    </dl>
                </div>
                <hr />
                -->
                <input type="submit" value="Simpan" class="btn btn-primary"/>
                <?php 
                
                echo form_close();?>
                </div> <!-- /panel-body-->
            </div>
		</div> <!-- ./col 6 -->
        
	</div> <!-- ./row -->
</div>	
</section>
