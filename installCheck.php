<?php
	require_once('index.php');
?>

	<!doctype html>
		<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Smooth Php Framework</title>
				<link rel="stylesheet" href="https://raw.github.com/twitter/bootstrap/master/docs/assets/css/bootstrap.css">
				<link rel="stylesheet" href="https://raw.github.com/twitter/bootstrap/master/docs/assets/css/bootstrap.css">

			    <style type="text/css">
			      body {
			        padding-top: 20px;
			        padding-bottom: 40px;
			      }

			      .container-narrow {
			        margin: 0 auto;
			        max-width: 700px;
			      }
			      .container-narrow > hr {
			        margin: 30px 0;
			      }

			      span, td {
			      	font-weight: bold;
			      }

			     .jumbotron {
			        margin: 60px 0;
			        text-align: center;
			      }
			      .jumbotron h1 {
			        font-size: 72px;
			        line-height: 1;
			      }

			    </style>
			</head>
			<body>

				<div class="container-narrow">

			      <div class="masthead">
			        <ul class="nav nav-pills pull-right">
			          <li class="active"><a href="#">Dependency Test</a></li>
			        </ul>
			        <h3 class="muted">Smooth version 1.0.2</h3>
			      </div>

			      <hr>

			        <div class="jumbotron">
				       <h1><strong style="color: #97ca47;">Smooth</strong> checker</h1>
				       <p class="lead">
					       	<h6>
					       		In order to speed and ensure your work process we created an automated Environment and Extenstions check.
					       		Your results are shown below. Some of the extensions are not require, however we recommend you to enable them.
					       </h6>
					       <h6>
					       		In case you have already installed the extensions check the php.ini file if they are enabled.
					       </h6>
					       <h5>
					       		After running the tests please delete the installChecker.php or either rename and move the file to another protected folder.
					       </h5>
				   	   </p>
				      
				    </div>

					<table class="table table-bordered table-striped">
		            <tbody>
		            	<tr>
		            		<td>Environment</td>
		            		<td></td>
		            	</tr>
						<tr>
		            		<td>
		            			PHP version
		            		</td>
		                  	<td>
		                  	<?php echo ( version_compare(PHP_VERSION, '5.3.0', '>=') ) ? '<span class="label label-success"><i class="icon-ok"></i> ' . PHP_VERSION . '</span>' : '<span class="label label-important"><i class="icon-remove"></i> Error occured </span>'; ?>
		                	</td>
						</tr>
						<tr>
		            		<td>
		            			System folder
		            		</td>
		            		<td>
		            			<?php echo ( defined('SYSPATH') ) ? '<span class="label label-success"><i class="icon-ok"></i> ' . SYSPATH . '</span>' : '<span class="label label-important"><i class="icon-remove"></i> Error occured </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			Application folder
		            		</td>
		            		<td>
		            			<?php echo ( defined('APPPATH') ) ? '<span class="label label-success"><i class="icon-ok"></i> ' . APPPATH . '</span>' : '<span class="label label-important"><i class="icon-remove"></i> Error occured </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			Base folder
		            		</td>
		            		<td>
		            			<?php echo ( defined('BASEPATH') ) ? '<span class="label label-success"><i class="icon-ok"></i> ' . BASEPATH . '</span>' : '<span class="label label-important"><i class="icon-remove"></i> Error occured </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			Extensions
		            		</td>
		            		<td></td>
						</tr>
						<tr>
		            		<td>
		            			PDO
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('PDO') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			PDO MySQL
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('pdo_mysql') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			PDO SQLite
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('pdo_sqlite') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			SQLite3 
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('sqlite3') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			PgSQL 
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('pgsql') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			PDO SQLSrv
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('pdo_sqlsrv') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			MongoDB
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('mongo') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			Date 
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('date') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			SPL
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('SPL') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			Session
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('session') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			cUrl
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('curl') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			Mcrypt
		            		</td>
		            		<td>
		            			<?php echo ( extension_loaded('mcrypt') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>
						<tr>
		            		<td>
		            			GD
		            		</td>
		            		<td>
		            			<?php echo ( function_exists('gd_info') ) ? '<span class="label label-success"><i class="icon-ok"></i> Installed</span>' : '<span class="label label-important"><i class="icon-remove"></i> Needs installing </span>'; ?>
		            		</td>
						</tr>

		            </tbody>
		          </table>

	      		</div>

			</body>
		</html>
