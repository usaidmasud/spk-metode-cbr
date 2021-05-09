<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Basis Kasus<i class="icon-angle-right"></i></li>
                    <li><a href="<?php echo base_url().'basis_kasus/add';?>">Tambah Basis Kasus</a></li>
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
                    <h5><i class="fa fa-table"></i> Data Basis Kasus</h5>
                </div>
                <div class="panel-body">
                    <?php echo $pesan; ?>
        	        <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-asterisk "></i> No</th>
                                    <th><i class="fa fa-list"></i> Nama Pasien</th>
                                    <th><i class="fa fa-list"></i> Usia</th>
                                    <th><i class="fa fa-list"></i> Penyakit</th>
                                    <th><i class="fa fa-list"></i> Gejala</th>
                                    <th><i class="fa fa-cog"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($record as $row){
                                echo '<tr class="bg">';
                                    echo '<td>'.$no.'</td>';
                                    $no++;
                                    echo '<td>'.$row->nama_pasien.'</td>';
                                    echo '<td>'.$row->usia.'</td>';
                                    echo '<td>'.$row->penyakit.'</td>';
                                    echo '<td>'.$row->gejala.'</td>';
                                    echo '<td>';
                                    echo anchor('basis_kasus/edit/'.$row->id_basis_kasus,'<i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>');                                                                        
                                    echo '&nbsp || &nbsp';
                                    echo anchor('basis_kasus/confirm_drop/'.$row->id_basis_kasus,'<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>');
                                    echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
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
