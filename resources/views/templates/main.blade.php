<!DOCTYPE html>
<html>
	<head>
		<title>@yield("titulo")</title>
		
		<!-- BOOTSTRAP.CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<!-- BOOTSTRAP ICONS.CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		
		<!-- BOOTSTRAP.JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		
		<!-- SWEET ALERT -->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<!-- JQUERY -->
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		
		<!-- JQUERY MASK -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		
		<!-- SELECTPICKER -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js" integrity="sha512-yrOmjPdp8qH8hgLfWpSFhC/+R9Cj9USL8uJxYIveJZGAiedxyIxwNw4RsLDlcjNlIRR4kkHaDHSmNHAkxFTmgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		
		<!-- SELECTPICKER CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css" integrity="sha512-g2SduJKxa4Lbn3GW+Q7rNz+pKP9AWMR++Ta8fgwsZRCUsawjPvF/BxSMkGS61VsR9yinGoEgrHPGPn2mrj8+4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
		<!-- MAGNIFIC POPUP JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		
		<!-- MAGNIFIC POPUP CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
	</head>
	<body>
		<div class="container">
		
			<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
				<div class="navbar-nav">
					<a class="nav-link" href="/animal">Animal</a>
					<a class="nav-link" href="/especie">Especie</a>
				</div>
			</nav>
			
			@if (Session::get("status") == "salvo")
				<div class="alert alert-success">
					Salvo com sucesso!
				</div>
			@endif
			
			@if (Session::get("status") == "excluido")
				<div class="alert alert-danger">
					Excluído com sucesso!
				</div>
			@endif
			
			@yield("formulario")
			@yield("tabela")
			
		</div>
	</body>
</html>