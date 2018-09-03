<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>Hello, world!</title>
</head><body>
<h1>Bentuk Soalan</h1>
<!-- ------------------------------------------------------------------------------------------------------------------ -->
<div class="row">
<div class="col-3">
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" 
	href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
	<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" 
	href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
	<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" 
	href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
	<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" 
	href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
	</div>
</div><!-- div class="col-3" -->
<div class="col-9">
	<div class="tab-content" id="v-pills-tabContent">
		<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
		<!-- --------------------------------------------------------------------------------------------------------- -->
		<p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui.
		Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate mini
		reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>
		<!-- --------------------------------------------------------------------------------------------------------- -->
		</div>
		<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
		<!-- ---------------------------------------------------------------------------------------------------------- -->
		<p>Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis pariatur mollit aute magna pariatur consectetur.
		Eu veniam duis non ut dolor deserunt commodo et minim in quis laboris ipsum velit id veniam. Quis ut consectetur adipisicing officia excepteur non sit.
		Ut et elit aliquip labore Lorem enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui esse anim eiusmod do sint minim consectetur qui.</p>
		<!-- ---------------------------------------------------------------------------------------------------------- -->
		</div>
		<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
		<!-- ---------------------------------------------------------------------------------------------------------- -->
		<p>Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem 
		veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip 
		labore est magna commodo est ea veniam consectetur.</p>
		<!-- ---------------------------------------------------------------------------------------------------------- -->
		</div>
		<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		<!-- ---------------------------------------------------------------------------------------------------------- -->
		<p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia.
		Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet.
		Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
		<!-- ---------------------------------------------------------------------------------------------------------- -->
		</div>
	</div>
</div><!-- div class="col-9" -->
</div><!-- <div class="row" -->
<!-- ------------------------------------------------------------------------------------------------------------------ -->
<h1>Bentuk Soalan Banyak</h1>
<div class="row">
<div class="col-3">
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<?php foreach($this->soalan as $key => $tanya): ?>
		<a class="nav-link" data-toggle="pill" role="tab" 
		href="#<?php echo $tanya ?>"  id="<?php echo $tanya ?>"><?php echo $tanya ?></a>
<?php endforeach; ?>
	</div>
</div><!-- div class="col-3" -->
<div class="col-9">
	<div class="tab-content" id="v-pills-tabContent">
<?php foreach($this->soalan as $key => $tanya): ?>
		<div class="tab-pane fade" id="<?php echo $tanya ?>" role="tabpanel">
		<!-- --------------------------------------------------------------------------------------------------------- -->
		<p>Banyak soalan daa : <?php echo $tanya ?></p>
		<!-- --------------------------------------------------------------------------------------------------------- -->
		</div>
<?php endforeach; ?>
	</div><!-- / class="tab-content" id="v-pills-tabContent" -->
</div><!-- / class="col-9" -->
</div><!-- / class="row" -->

<!-- ------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------ -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>