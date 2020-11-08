		<link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>assets/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/index.js?v=1"></script>
		
		<style>
			div#msg
			{
				text-align:left;color:#F00;font-size:8pt;
			}

			div.loginformx
			{
				margin:0 auto;
				margin-top:10%;
			}
			@media (max-width: 767px){
				div.loginformx
				{
					margin:0 auto;
					width:80%;
					margin-top:30%;
				}	
			}

			/*LOGIN STYLE*/
			.login-top {
				position: relative;
			}

			.img-top {
				position: absolute; top: 0; left: 50%; transform: translateX(-50%);
			}

			.title-top {
				position: absolute; top: 20px; left: 50%; transform: translateX(-50%); text-align: center; width: 300px;
			}

			.body-log {
				position: relative; top: 75px;
			}

			.img-body {
				position: absolute; top: 0; left: 50%; transform: translateX(-50%);
			}

			.body-ct {
				position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 300px;
			}

			.logo-body {
				text-align: center; margin-top: 10px;
			}

			.body-form {
				margin-left: 30px; margin-right: 30px; margin-top: 30px;
			}

			.icon-input {
				border-top-left-radius: 10px; border-bottom-left-radius: 10px;
			}

			.tx-input {
				border-top-right-radius: 10px; border-bottom-right-radius: 10px;
			}

			.footer {
				display: none;
			}
		</style>
		<!-- Top content -->
		
		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-: 0 auto;">
			<div class="loginformx">
				<div class="login-top">
					<img src="<?php echo $baseurl;?>images/login/head.png" width="300px" class="img-top">
					<div class="title-top">
						<b>
						TRIAL PROGRAM<br>
			          	KEMENHUB
			        	</b>
					</div>
					<!-- <img src="./image/login/head.png"> -->
				</div>
				<div class="body-log">
					<img src="<?php echo $baseurl;?>images/login/body.png" width="300px" class="img-body">
					<div class="body-ct">
						<p class="logo-body">
							<img src="<?php echo $baseurl;?>images/login/logo.png" width="150px;">
						</p>
						<form class="form-horizontal body-form" role="form" method="post" id="frmLogin" name="frmLogin">
			                <div class="form-group" >
			                	<div class="col-xs-12 col-md-12 col-sm-12">
				                	<div class="input-group">
										<span class="input-group-addon icon-input" id="sizing-addon1">
											<i class="far fa-envelope"></i>
										</span>
										<input type="text" class="form-control validate[required] tx-input" placeholder="Username" id="username" name="username" autofocus/>
									</div>
								</div>
			                        <!-- <input type="text" class="form-control transparent-input validate[required]" placeholder="Username" id="user" name="username" autofocus/> -->
			                </div>
			                <div class="form-group" >
			                    <div class="col-xs-12 col-md-12 col-sm-12">
			                        <div class="input-group" style="border-radius: 100px !important;">
										<span class="input-group-addon icon-input" id="sizing-addon1">
											<i class="fas fa-unlock-alt"></i>
										</span>
										<input type="password" class="form-control validate[required] tx-input" placeholder="Password" id="password" name="password"/>
									</div>

			                        <!-- <input type="password" class="form-control transparent-input validate[required]" placeholder="Password" id="pwd" name="password"/> -->
			                    </div>
			                </div>
			                <div class="form-group text-center">
			                    <!-- <div class="col-xs-12 col-md-12 col-sm-12 text-center"> -->
			                        <!-- <input name="login" type="submit" class="btn btn-sm" value="LOGIN" style="background-color: #aa3e03" /> -->
			                        <button type="submit" class="btn btn-sm" style="background-color: #222abd; font-size: 13pt;">
			                        	<i class="fa fa-lock"></i>&nbsp;LOGIN
			                        </button>
									<!-- <p class="message" style="color: #333;">Not registered? <a href="#">Create an account</a></p> -->
			                    <!-- </div> -->
			                </div>
			            </form>
			            <div id="msg">
						</div>
					</div>
					<!-- <img src="./image/login/head.png"> -->
				</div>
			</div>
		</div>




					
		