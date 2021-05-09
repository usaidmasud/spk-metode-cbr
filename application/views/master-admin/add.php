<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url().'home';?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Master<i class="icon-angle-right"></i></li>
					<li><a href="<?php echo base_url().'admin';?>">Admin</a><i class="icon-angle-right"></i></li>
                    <li class="active">Tambah Admin</li>
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
                    <h5><i class="fa fa-edit"></i> Entry Data Admin</h5>
                </div>
                <div class="panel-body">
                <?php echo $pesan;?>
        	        <form class="form-horizontal" action="<?php echo base_url().'admin/save';?>" method="post">
                      <div class="form-group">
                        <label for="id_user" class="col-sm-2 control-label">ID<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="id_user" name="id_user" placeholder="* ID Admin" required="on" readonly="on" maxlength="5" value="<?php echo $id_admin;?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Admin<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" placeholder="* Isi Username" required="on" autofocus="on" maxlength="10">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_pengguna" class="col-sm-2 control-label">Nama<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="* Isi Nama Admin" required="on" autofocus="on" maxlength="50">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="sandi" class="col-sm-2 control-label">Password<strong style="color: red;">*</strong></label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="sandi" name="sandi" placeholder="* Isi Password" required="on" autofocus="on" maxlength="10">
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
	</div> <!-- ./row -->
</div>	
</section>
