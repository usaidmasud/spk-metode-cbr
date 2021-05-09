<section id="content">
<div class="container">
	<div class="row">
		<div class="col-lg-5">
            <div class="panel panel-primary" >
                <div class="panel-body">
                    <form class="form-inline" method="post" action="<?php echo base_url().'auth/cekLogin';?>">
                    <h2>Please Login</h2>
                      <div class="form-group">
                        <label class="sr-only">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" autofocus="on" required="on" maxlength="10">
                      </div>
                      <div class="form-group">
                        <label class="sr-only">Password</label>
                        <input type="password" class="form-control" name="sandi" placeholder="Password" autofocus="on" required="on" maxlength="10">
                      </div>
                      <br />  
                      <br />
                      <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in fa fw"></i> Sign in</button>
                    </form>
                </div>
            </div>
		</div> <!-- ./col 6 -->

	</div> <!-- ./row -->
</div>	
</section>
