<form id="form1" name="form1" method="post" action="pengguna_dalam/kemaskini/borang/borangA_proses.php" style="
background-color: #F8F8FF;
box-shadow: inset 0 0 0 .1em hsla(0,0%,0%,.1),
                inset 0 0 1em hsla(0,0%,0%,.05),
                0 .1em .25em hsla(0,0%,0%,.5); 
margin-top:0px; padding-left:10px;" >

<table width="961"  align="center" height="20">
<tr><td height="20" colspan="3" align="left" ><p><div class="textdescrp"></div></p></td></tr>
<tr style="display:none;">
	<td colspan="3" align="left" height="20" >
		<input type="hidden" name="nosiri" id="nosiri" value="000003396288" />
		<input type="hidden" name="kod" id="kod" value="01" />
		Kod Respon<input type="text" name="kod_respon" id="kod_respon" size="4" />
		Status<input type="text" name="cara_terima" id="cara_terima" size="8" />
		<input  name="get_lang" id="get_lang" type="hidden" />
	</td>
</tr>
<tr height="30">
	<td width="221" align="left" class="textdescrp2">No. Pendaftaran Syarikat/Perniagaan :</td>
	<td width="349" align="left" >
		<input type="text" name="no_ssm" id="no_ssm" value="JR0021794" disabled="disabled" />
		<input type="hidden" name="iduser" id="iduser" value="ABD MUHAIMIN BIN ABD GHANI" />
	</td>
	<td width="375" rowspan="4" align="left">
		<table width="108" align="center">
		<tr><td width="98" bgcolor="#FF0000"><div align="center"><em>Error</em></div></td></tr>
		<tr><td bgcolor="#bffcc0"><div align="center"><em>Force Accept</em></div></td></tr>
		</table>
		<table width="341" height="79" border="0" id="maklumat">
		<tr><td width="88" bgcolor="#e9e7e9">No Siri</td><td width="272">000003396288</td></tr>
		<tr><td bgcolor="#e9e7e9">Syarikat</td><td>A AZIZ ABU ENTERPRISE</td></tr>
		<tr><td bgcolor="#e9e7e9">Suku Tahun</td><td>1</td></tr>
		<tr><td bgcolor="#e9e7e9">Tahun</td><td>2018</td></tr>
		<tr><td bgcolor="#e9e7e9">BBU/SBU</td><td>SBU</td></tr>
		</table>
	</td>
</tr>
<tr height="30">
	<td width="221" align="left" class="textdescrp2">Kod Industri Asal :</td>
	<td width="349" align="left"><input type="text" name="msic" id="msic" value="49225" disabled="disabled"/></td>
</tr>
<tr>
	<td width="221" align="left" class="textdescrp2">Kod Industri Baru :</td>
	<td width="349" align="left"><input name="msic_baru" type="text" value="49225" disabled="disabled"/></td>
</tr>
<tr>
	<td width="221" align="left">&nbsp;</td>
	<td><textarea name="msic_desc" id="msic_desc" cols="35" rows="3" style="resize:none;" disabled="disabled"></textarea></td>
</tr>
</table>

<!-- ************************************************************************************************************************************ -->
<table width="99%" border="0" align="center" id="tbl2">
<tr>
	<td height="27" colspan="3" bgcolor="#FFFF99"><div align="center"><b>BAHAGIAN A: HASIL (Tidak termasuk CBP)</b></div></td>
</tr>
<tr>
	<td width="516" height="39"   align="left" bgcolor="#FFFF99" class="textdescrp1"><strong>1. HASIL</strong></td>
	<td bgcolor="#FFFF99">Okt 2017</td><td bgcolor="#FFFF99">Nov 2017</td><td bgcolor="#FFFF99">Dis 2017</td>
	<!-- td width="202" bgcolor="#FFFF99"  ><div align="center">Suku Tahun (4S 2017)<br />1 Oktober - 31 Disember 2017</div></td -->
	<td width="202" bgcolor="#FFFF99"  ><div align="center">(4S 2017)</div></td>
	<td bgcolor="#FFFF99">Jan 2018</td><td bgcolor="#FFFF99">Feb 2018</td><td bgcolor="#FFFF99">Mac 2018</td>
	<!-- td width="196" bgcolor="#FFFF99"  ><div align="center">Suku Tahun (1S 2018)<br />1 Januari - 31 Mac 2018</div></td -->
	<td width="196" bgcolor="#FFFF99"  ><div align="center">(1S 2018)</div></td>
</tr>
<tr>
	<td align="left" class="textdescrp2" >&nbsp;&nbsp;&nbsp;1.1 Hasil kendalian / Perolehan / Jualan&nbsp;<a href="nota/nota-1.php?a=315&b=01&c=49" 
	onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><img src="graphics/I ICON.jpg" width="10" height="10"/></a></td> 
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
     </div>
	</td>
<?php endfor; ?>
	<td align="left" ><div align="left">RM 
		<input name="f0708a_p" type="text" id="f0708a_p" style="width:120px;text-align:right;" value="7190" 
		tabindex="1" onkeyup="total_f1112a_p();" class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
      F0007</div>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
     </div>
	</td>
<?php endfor; ?>
	<td>      
		<div align="left">RM 
		<input  name="f0708a_c" type="text" id="f0708a_c" style="width:120px;text-align:right;" value="4520" 
		tabindex="2" onkeyup="total_f1112a_c();" class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
        F0008</div>
	</td> 
</tr>
<tr>
	<td align="left" class="textdescrp2">&nbsp;&nbsp;&nbsp;1.2 Pendapatan lain&nbsp;<a href="nota/nota-1-3.php" 
	onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><img src="graphics/I ICON.jpg" width="10" height="10"/></a></td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
     </div>
	</td>
<?php endfor; ?>
	<td>
		<div align="left">RM 
		<input  name="f0910a_p" type="text" id="f0910a_p" style="width:120px;text-align:right;" value="0" 
		tabindex="5" onkeyup="total_f1112a_p();" class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0009</div>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f0910a_c" type="text" id="f0910a_c" style="width:120px;text-align:right;" value="0" 
		tabindex="6" onkeyup="total_f1112a_c();" onblur="info_hasil_A();" class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0010</div>
	</td> 
</tr>
<tr>
	<td height="28" align="left" class="textdescrp1">&nbsp;&nbsp;&nbsp;1.3 JUMLAH HASIL</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
     </div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1112a_p" type="text" id="f1112a_p" 
		style="width:120px;border: 1.5px solid #a5a5a5;border-radius: 1px;text-align:right; background-color:#e1e4e2;height: 23px;" 
		value="7190" tabindex="7" class="auto" data-v-max="99999999999999999" data-v-min="-9999999999999" readonly/>
		F0011</div>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
     </div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1112a_c" type="text" id="f1112a_c" 
		style="width:120px;border: 1.5px solid #a5a5a5;border-radius:1px;text-align:right; background-color:#e1e4e2;height:23px;" 
		value="4520" tabindex="8" class="auto" data-v-max="99999999999999999" data-v-min="-9999999999999" readonly/>
		F0012</div>
	</td>
</tr>
<tr>
	<td colspan="4" height="53" align="left" class="textdescrp2">&nbsp;&nbsp;&nbsp;
	1.4 Jika jumlah hasil yang dilaporkan untuk suku tahun ini meningkat atau menurun 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	sekurang-kurangnya 30% berbanding suku tahun sebelumnya, sila nyatakan sebab 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;berlakunya perbezaan tersebut.
	</td>
	<td colspan="4" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.
	<textarea name="hasil_a" id="hasil_a" cols="50" rows="3" style="resize:none;" tabindex="9">KERETA SEDANG DI BAIK PULIH SEPANJANG BULAN MAC</textarea>
	</td>
</tr>
<tr>
	<td height="27" colspan="3" bgcolor="#FFFF99"><div align="center"><b>BAHAGIAN B: PERBELANJAAN (Tidak termasuk CBP)</b></div></td>
</tr>
<tr>
	<td width="516" height="39" align="left" bgcolor="#FFFF99" class="textdescrp1"><strong>2. PERBELANJAAN</strong></td>
	<td bgcolor="#FFFF99">Okt 2017</td><td bgcolor="#FFFF99">Nov 2017</td><td bgcolor="#FFFF99">Dis 2017</td>
	<!-- td width="202" bgcolor="#FFFF99"  ><div align="center">Suku Tahun (4S 2017)<br />1 Oktober - 31 Disember 2017</div></td -->
	<td width="202" bgcolor="#FFFF99"  ><div align="center">(4S 2017)</div></td>
	<td bgcolor="#FFFF99">Jan 2018</td><td bgcolor="#FFFF99">Feb 2018</td><td bgcolor="#FFFF99">Mac 2018</td>
	<!-- td width="196" bgcolor="#FFFF99"  ><div align="center">Suku Tahun (1S 2018)<br />1 Januari - 31 Mac 2018</div></td -->
	<td width="196" bgcolor="#FFFF99"  ><div align="center">(1S 2018)</div></td>
</tr>
<tr>
	<td align="left" class="textdescrp2">&nbsp;&nbsp;&nbsp;2.1 Perbelanjaan kendalian / Kos Jualan &nbsp;
		<a href="nota/nota-2-1.php?b=01" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<img src="graphics/I ICON.jpg" width="10" height="10"/></a>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1314b_p" type="text" id="f1314b_p" style="width:120px;text-align:right;" value="2490" 
		tabindex="10" onkeyup="total_f1920b_p()"  class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0013</div>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td>  
		<div align="left">RM 
		<input  name="f1314b_c" type="text" id="f1314b_c" style="width:120px;text-align:right;" value="1730" 
		tabindex="11" onkeyup="total_f1920b_c()"  class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0014</div>
	</td>
</tr>
<tr>
	<td align="left" class="textdescrp2">&nbsp;&nbsp;&nbsp;2.2 Perbelanjaan lain&nbsp;
		<a href="nota/nota-2-3.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<img src="graphics/I ICON.jpg" width="10" height="10"/></a>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1516b_p" type="text" id="f1516b_p" style="width:120px;text-align:right;" value="0" 
		tabindex="14" onkeyup="total_f1920b_p()"  class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0015</div>
	</td> 
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1516b_c" type="text" id="f1516b_c" style="width:120px;text-align:right;" value="2150" 
		tabindex="15" onkeyup="total_f1920b_c()"  class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0016</div>
	</td>
</tr>
<tr>
	<td align="left" class="textdescrp2">&nbsp;&nbsp;&nbsp;2.3 Jumlah Gaji & Upah &nbsp;
		<a href="nota/nota-2-4.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<img src="graphics/I ICON.jpg" width="10" height="10"/></a>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1718b_p" type="text" id="f1718b_p" style="width:120px;text-align:right;" value="0" 
		tabindex="16" onkeyup="total_f1920b_p()"  class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0017</div>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1718b_c" type="text" id="f1718b_c" style="width:120px;text-align:right;" value="0"
		tabindex="17" onkeyup="total_f1920b_c()"  onblur="info_belanja_A();" class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0018</div>
	</td>
</tr>
<tr>
	<td height="31" align="left" class="textdescrp1">&nbsp;&nbsp;&nbsp;<span class="textdescrp2">2.4 JUMLAH PERBELANJAAN</span></td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1920b_p" type="text" id="f1920b_p" 
		style="width:120px;border: 1.5px solid #a5a5a5;border-radius: 1px;text-align:right; background-color:#e1e4e2;height: 23px;" 
		value="2490" tabindex="18" data-v-max="99999999999999999" data-v-min="-9999999999999" class="auto" readonly/>
		F0019</div>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td><div align="left">RM 
		<input  name="f1920b_c" type="text" id="f1920b_c" 
		style="width:120px;border: 1.5px solid #a5a5a5;border-radius: 1px;text-align:right; background-color:#e1e4e2;height: 23px;" 
		value="3880" tabindex="19" class="auto" data-v-max="99999999999999999" data-v-min="-9999999999999" readonly/>
		F0020</div>
	</td>
</tr>
<tr>
	<td colspan="4" height="60" align="left" class="textdescrp2">&nbsp;&nbsp;&nbsp;
	2.5 Jika jumlah perbelanjaan yang dilaporkan untuk suku tahun ini meningkat atau 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	menurun sekurang-kurangnya 30% berbanding suku tahun sebelumnya, sila 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nyatakan sebab berlakunya perbezaan tersebut.</td>
	<td colspan="4" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<textarea name="perbelanjaan_b" id="perbelanjaan_b" cols="50" rows="3" 
	style="resize:none;" tabindex="20">KERETA SEDANG DI BAIK PULIH SEPANJANG BULAN MAC</textarea>
	</td>
</tr>
<tr>
	<td height="27" colspan="3" bgcolor="#FFFF99"><div align="center"><b>BAHAGIAN C: BILANGAN PEKERJA (Pada akhir suku tahun)</b></div></td>
</tr>
<tr>
	<td width="516" height="39" align="left" bgcolor="#FFFF99" class="textdescrp1">&nbsp;</td>
	<td bgcolor="#FFFF99">Okt 2017</td><td bgcolor="#FFFF99">Nov 2017</td><td bgcolor="#FFFF99">Dis 2017</td>
	<!-- td width="202" bgcolor="#FFFF99"  ><div align="center">Suku Tahun (4S 2017)<br />1 Oktober - 31 Disember 2017</div></td -->
	<td width="202" bgcolor="#FFFF99"  ><div align="center">(4S 2017)</div></td>
	<td bgcolor="#FFFF99">Jan 2018</td><td bgcolor="#FFFF99">Feb 2018</td><td bgcolor="#FFFF99">Mac 2018</td>
	<!-- td width="196" bgcolor="#FFFF99"  ><div align="center">Suku Tahun (1S 2018)<br />1 Januari - 31 Mac 2018</div></td -->
	<td width="196" bgcolor="#FFFF99"  ><div align="center">(1S 2018)</div></td>
</tr>
<tr>
	<td height="27" align="left" class="textdescrp1"><strong>3. JUMLAH PEKERJA</strong> &nbsp;
		<a href="nota/nota-3.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<img src="graphics/I ICON.jpg" width="10" height="10" class="textdescrp1"/></a>
	</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input  name="f2122c_p" type="text" id="f2122c_p" 
		style="width:120px;text-align:right;" value="1" 
		tabindex="21" class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		F0021</td>
<?php for ($i = 1; $i <=3; $i++):?>
	<td align="left" ><div align="left">RM
		<input type="text" style="width:120px;text-align:right;" value="" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endfor; ?>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input  name="f2122c_c" type="text" id="f2122c_c" 
		style="width:120px;text-align:right;" value="1" tabindex="22"
		onblur="this.value=addCommas(this.value);info_pekerja_A();" 
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	F0022</td>
</tr>
<tr>
	<td colspan="4" height="60" align="left" class="textdescrp2">&nbsp;&nbsp;&nbsp;
	3.1 Jika jumlah pekerja yang dilaporkan untuk suku tahun ini meningkat atau 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	menurun sekurang-kurangnya 30% berbanding suku tahun sebelumnya, sila 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nyatakan sebab berlakunya perbezaan tersebut.</td>
	<td colspan="4" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="pekerja_c" id="pekerja_c" cols="50" rows="3" tabindex="23" style="resize:none;"></textarea >
	</td>
</tr>
</table>

<table width="889" height="56" border="0" align="center">
<tr></tr>
<tr>
	<td height="19" colspan="4" align="center">
	<input type='button' name='saveD' value='Simpan' id='saveD' style='width: 250px; height:50px;' class='blue' tabindex='30'/>
	</td>
</tr>
<tr>
	<td height="14" colspan="4" >&nbsp;</td> 
</tr>
</table>

<div class='menu1' style='display: none'>
<button id="btnHide">X</button><br/>
Check number 0003 / 0005 <br/>
</div>
<div class='menu2' style='display: none'>
<button id="btnHide2">X</button><br/>
Check number 0010 / 0011 <br/>
</div>
<div class='menu3' style='display: none'>
<button id="btnHide3">X</button><br/>
Check number 0002 / 0004 <br/>
</div>
<div class='menu4' style='display: none'>
<button id="btnHide4">X</button><br/>
Check number 0012 / 0013 <br/>
</div>
<div class='menu5' style='display: none'>
Check number 0074 <br/>
</div>
<div class='error30percent' id="hasilkurang" style='display: none'>
Penurunan Jumlah Hasil kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="hasilmelebihi" style='display: none'>
Kenaikan Jumlah Hasil melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="belanjakurang" style='display: none'>
Penurunan Jumlah Perbelanjaan kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="belanjamelebihi" style='display: none'>
Kenaikan Jumlah Perbelanjaan melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="kerjakurang" style='display: none'>
Penurunan Jumlah Perbelanjaan kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="kerjamelebihi" style='display: none'>
Kenaikan Jumlah Pekerja melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<style>


.menu1 {
   
    position:fixed;
    border: 1px solid black;
    right:1%;
	padding:5px 5px;
	background-color:#bffcc0;
	color:black;
}
.menu2 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:60px;
    right:1%;
	padding:5px 5px;
	background-color:#bffcc0;
	color:black;
	
}
.menu3 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:120px;
    right:1%;
	padding:5px 5px;
	background-color:red;
	color:white;
	
}
.menu4 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:180px;
    right:1%;
	padding:5px 5px;
	background-color:#bffcc0;
	color:black;
	
}
.menu5 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:120px;
    right:1%;
	padding:5px 5px;
	background-color:red;
	color:white;
	
}
.error30percent
{
   
    position:relative;
    border: 1px solid black;
    background: #fff;
	margin-top:0px;
	text-align:center;
	padding:5px 5px;
	background-color:#7E0E0E;
	color:white;
	border-color:#F00;
	font-size:12px; font-weight:100;
	font-family: "Helvetica Neue", Arial, "Liberation Sans", FreeSans, sans-serif;
	
}

</style>
</form>