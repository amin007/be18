<form id="form1" name="form1" method="post" action="pengguna_dalam/kemaskini/borang/borangD_proses.php" 
style="background-color: #F8F8FF;
box-shadow: inset 0 0 0 .1em hsla(0,0%,0%,.1),
inset 0 0 1em hsla(0,0%,0%,.05),
0 .1em .25em hsla(0,0%,0%,.5); 
margin-top:0px; padding-left:10px;" onSubmit="return hantar()">
<table width="940px" border="0" align="center" >
<tr>
	<td width="537" align="center" class="textdescrp"><p>
		<input type="hidden" name="nosiri" id="nosiri" value="" />
		<input type="hidden" name="iduser" id="iduser" value="" />
		<p>BAHAGIAN D : PERBELANJAAN MODAL (Tidak termasuk CBP)</p>
	</td>
	<td width="31"></td>
	<td width="358" height="30" align="center" class="textdescrp2">&nbsp;</td>
</tr>
<tr>
	<td height="36" colspan="2"  align="left" class="textdescrp2">
		<table  width="543" border="0" style="background-color: #F0F8FF;
		box-shadow: inset 0 0 0 .1em hsla(0,0%,0%,.1),
		inset 0 0 1em hsla(0,0%,0%,.05),
		0 .1em .25em hsla(0,0%,0%,.5);">
		<tr id="belian">
			<td height="36" colspan="2" style="padding-top:10px;padding-left:5px;">
				Adakah pertubuhan ini membuat pembelian / 
				jualan harta dari tarikh 1 Januari - 31 Mac 2018&nbsp;?
			</td>
		</tr>
		<tr>
			<td width="104" height="31">
				<input type="hidden" id="enable1" name="enable1" value="2" />
				<input type="radio" name="enable" id="enable" value="1"  />&nbsp;Ya</td>
			<td width="429">Jika Ya, sila lengkapkan jadual di bawah.</td>
		</tr>
		<tr>
			<td><input type="radio" name="enable" id="enable" value="2" checked />&nbsp;Tidak</td>
			<td style="padding-bottom:12px;">Jika Tidak, sila ke Bahagian E : Maklumat Tambahan.</td>
		</tr>
		</table>     
	<td>
		<table width="342" height="79" border="0" id="maklumat">
		<tr><td width="84" bgcolor="#e9e7e9">No Siri</td><td width="252">000000337030</td></tr>
		<tr><td bgcolor="#e9e7e9">Syarikat</td><td>CHEE SIONG CONTRACT WORKS</td></tr>
		<tr><td bgcolor="#e9e7e9">Suku Tahun</td><td>1</td></tr>
		<tr><td bgcolor="#e9e7e9">Tahun</td><td>2018</td></tr>
		<tr><td bgcolor="#e9e7e9">BBU/SBU</td><td>BBU</td> </tr>
		</table>
	</td>  
</tr>
<tr>
	<td height="31" colspan="3"><div align="center" class="textdescrp2"><b>
	SUKU TAHUN <br>(1S 2018)<br>1 Januari - 31 Mac 2018</b></div>
	</td>
</tr>
</table>
<!-- ############################################################################################################################ -->
<table id="tbl2" width="917" align="center">
	<tr>
		<td colspan="2" rowspan="2" bgcolor="#FFFF99" class="textdescrp1" ><div align="center"><b>Item</b></div></td>
		<td height="20" colspan="3" bgcolor="#FFFF99"><div align="center"><strong>Belian (RM)</strong></div></td>
		<td width="171" rowspan="2" valign="top" bgcolor="#FFFF99"><div align="center"><strong>Harta yang dijual/ditamatkan</strong></div></td>
	</tr><tr>
		<td width="171" height="22" bgcolor="#FFFF99"><div align="center"><b>Baru*</b></div></td>
		<td width="171" bgcolor="#FFFF99"><div align="center"><b>Terpakai</b></div></td>
		<td width="171" bgcolor="#FFFF99"><div align="center"><b>Membuat/Membina sendiri</b></div></td>
	</tr><tr>
		<td width="20" class="textdescrp2">(a)</td>
		<td width="300" class="textdescrp2">Tanah</td>
<?php $b = '01'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
 	</tr><tr>
		<td class="textdescrp2">(b)</td>
		<td class="textdescrp2">Bangunan dan pembinaan lain</td>
<?php $b = '02'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr><tr>
		<td class="textdescrp2">(c)</td>
		<td class="textdescrp2">Pembangunan tanah</td>
<?php $b = '03'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr><tr>
		<td class="textdescrp2">(d)</td>
		<td class="textdescrp2">Alat pengangkutan</td>
<?php $b = '04'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr><tr>
		<td class="textdescrp2">(e)</td>
		<td height="30" class="textdescrp2">Komputer (termasuk perkakasan & perisian)</td>
<?php $b = '05'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr><tr>
		<td class="textdescrp2">(f)</td>
		<td class="textdescrp2">Jentera dan kelengkapan</td>
<?php $b = '06'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr><tr>
		<td class="textdescrp2">(g)</td>
		<td class="textdescrp2">Perabot dan pemasangan</td>
<?php $b = '07'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr><tr>
		<td class="textdescrp2">(h)</td>
		<td class="textdescrp2">Harta-harta lain (cth: paten, muhibah, kerja dalam proses, dll)</td>
<?php $b = '08'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			class="auto" data-v-max="999999999999" data-v-min="-9999999999999"
			style="width:108px;text-align:right; border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr><tr>
		<td class="textdescrp2">&nbsp;</td>
		<td class="textdescrp1"><div align="center">JUMLAH (a hingga h)</div></td>
<?php $b = '99'; # baris 
$ulang = array('F01' . $b,'F02' . $b,'F03' . $b,'F04' . $b);
foreach ($ulang as $papar):
	if(in_array($papar,array('F0201','F0301','F0304'))):
		echo "\n\t\t" . '<td bgcolor="#999999"><div align="right"></div></td>';
	else: echo "\n";?>
		<td align="left" valign="middle"><div align="right"><?php echo $papar . "\n" ?>
			<input type="text" id="<?php echo $papar ?>" value="" 
			style="width:108px;text-align:right;background-color:#e1e4e2;
			border: 1.5px solid #a5a5a5;border-radius: 1px;"
			readonly/>
		 </div></td>
<?php endif; endforeach; ?>
	</tr>
</table>
 
<table width="937" border="0" align="center">
<tr><td width="947" height="8" align="left">
	*Merujuk kepada perolehan aset baru termasuk harta tetap yang diimport sama ada baru atau terpakai.
	</td>
</tr><tr>
	<td height="19" align="center">&nbsp;</td>
</tr><tr>
	<td height="19" colspan="2" align="center">
		<!-- input type='submit' name='simpan' id='simpan' value='Simpan' style='width: 250px; height:50px;' class='blue' / -->
	</td>
</tr><tr>
	<td height="15" colspan="2" align="center">&nbsp;</td>
</tr>
</table>
  
</form>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php include 'kiraTextbox03_aset.php'; ?>
