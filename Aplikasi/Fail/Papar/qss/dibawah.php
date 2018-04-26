<!-- end .grid_6 --><!-- end .grid_6 -->
<div class="clear"></div>
<div id="footer"><br><div style="text-align:center;">Paparan Terbaik dengan menggunakan Mozilla Firefox 3.6+ / 
Google Chrome versi terkini dengan resolusi melebihi 1024 x 768<br>
&#169; 2013 Jabatan Perangkaan Malaysia<br>
Blok C6, Kompleks C, Pusat Pentadbiran Kerajaan Persekutuan, 62514 PUTRAJAYA<br>
Tel: 03 8885 7000 | Faks: 03 8888 9248<br>
</div>
</div>
</div><!-- end .container_12 -->
</body>
</html>
<script src="<?php echo $pautan?>js_file/idle/src/jquery.idletimer.js" type="text/javascript"></script>
<script src="<?php echo $pautan?>js_file/idle/src/jquery.idletimeout.js" type="text/javascript"></script>
<script type="text/javascript">
$.idleTimeout('#idletimeout', '#idletimeout a', {
	idleAfter: 900,
	pollingInterval: 2,
	keepAliveURL: 'keepalive.php',
	serverResponseEquals: 'OK',
	onTimeout: function(){
		$(this).slideUp();
		window.location = "logout.php";
	},
	onIdle: function(){
		$(this).slideDown(); // show the warning bar
	},
	onCountdown: function( counter ){
		$(this).find("span").html( counter ); // update the counter
	},
	onResume: function(){
		$(this).slideUp(); // hide the warning bar
	}
});
</script>