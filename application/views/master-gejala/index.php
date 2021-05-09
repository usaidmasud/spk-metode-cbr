<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Master<i class="icon-angle-right"></i></li>
					<li class="active">Gejala<i class="icon-angle-right"></i></li>
                    <li><a href="<?php echo base_url().'gejala/add';?>">Tambah Gejala</a></li>
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
                    <h5><i class="fa fa-table"></i> Data Gejala</h5>
                </div>
                <div class="panel-body">
                    <?php echo $pesan; ?>
        	        <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-asterisk "></i> No</th>
                                    <th><i class="fa fa-list"></i> Gejala</th>
                                    <th><i class="fa fa-list"></i> Bobot</th>
                                    <th><i class="fa fa-cog"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($record as $row){
                                echo '<tr class="bg">';
                                    echo '<td>'.$row->id_gejala.'</td>';
                                    $no++;
                                    echo '<td>'.$row->gejala.'</td>';
                                    echo '<td>'.$row->bobot.'</td>';
                                    echo '<td>';
                                    echo anchor('gejala/edit/'.$row->id_gejala,'<i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>');                                    
                                    echo '&nbsp || &nbsp';
                                    echo anchor('gejala/confirm_drop/'.$row->id_gejala,'<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>');
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
