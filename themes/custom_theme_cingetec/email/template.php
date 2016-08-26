<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title> Email Design by Ingenioart and JGreen </title>
</head>

<?php  
	//Varibles colores de plantila - en hexadecimal
	$bg_header     = "#0070B8";
	$bg_body       = "#ffffff";
	$bg_footer     = "#A5C938";
	$bg_ingenioart = "#0074BB";
?>


<body style="margin: 0; padding: 0;">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; font-family: 'Arial', sans-serif; border: 1px solid rgba(0,0,0,.4) ">
		
		<!-- Header -->
		<tr>
			<td align="center" bgcolor="<?= $bg_header; ?>" style="padding: 20px 0 20px 0;">

				<a href="http://iuigv.com/cingetec/web" target="_blank" style="display:inline-block; border: 2px solid #ffffff;">

					<img src="http://iuigv.com/cingetec/web/wp-content/themes/custom_theme_cingetec/assets/images/logo.jpg" alt="Mail Template by Ingenioart - JGreen" width="125" height="111" style="display: block;" />

				</a> 
			</td>
		</tr>	
		
		<!-- Cuerpo -->
		<tr>
			<td bgcolor="<?= $bg_body; ?>" style="padding: 40px 30px 40px 30px;"> 

				<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
					
					<tr>
						<td>
							<h2> Cingetec Ingenier&iacute;a y tecnolog&iacute;a  </h2>
						</td>
					</tr>					
					<tr>
						<td style="padding: 20px 0 30px 0;">
							Ha recibido un nuevo mensaje de consulta y/o duda de:

							<div style="height:10px"></div>

							<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
								<tr>
									<td><strong> Nombre:</strong></td>
									<td> <?= $name; ?> </td>
								</tr>								
								<tr>
									<td><strong> Direcci&oacute;n: </strong></td>
									<td>  <?= $address; ?> </td>
								</tr>								
								<tr>
									<td><strong> Tel&eacute;fono :</strong></td>
									<td> <?= $phone; ?></td>
								</tr>								
								<tr>
									<td><strong> Email:</strong></td>
									<td> <?= $from; ?></td>
								</tr>								
								<tr>
									<td><strong> Mensaje:</strong></td>
								</tr>
								<tr>
									<td> <?= $message; ?> </td>
								</tr>
							</table>

						</td>
					</tr>					

				</table>
			</td>
		</tr>	
		
		<!-- Footer -->
		<tr>
			<td bgcolor="<?= $bg_footer; ?>" align="center" style="padding: 10px 0 10px 0;">
				<p style="color: white">
					Gracias Por Revisar Este Mensaje - Cingetec <?= date("Y"); ?>
				</p>
			</td>
		</tr>		
		
		<!-- Ingenioart -->
		<tr>
			<td bgcolor="<?= $bg_ingenioart; ?>" align="center">
				<p style="color: white; font-size: 12px;">
					Design by <a style="color: white;" target="_blank" href="http://www.ingenioart.com/"> Ingenioart </a>
				</p>
			</td>
		</tr>
	</table>
 
</body>
 
</html>