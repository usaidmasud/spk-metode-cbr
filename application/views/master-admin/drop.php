<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Master<i class="icon-angle-right"></i></li>
					<li><a href="<?php echo base_url().'admin';?>">Admin</a><i class="icon-angle-right"></i></li>
                    <li class="active">Hapus Admin</li>
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
                    <h5><i class="fa fa-question"></i> Konfirmasi Hapus Data Admin</h5>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>Admin</td>
                            <td>:</td>
                            <td><?php echo $record[0]->username;?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <?php
                                    echo anchor ('admin/drop/'.$record[0]->id_user,'<button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> Hapus</button>');
                                ?>
                            </td>
                        </tr>
                    </table>
        	        
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
