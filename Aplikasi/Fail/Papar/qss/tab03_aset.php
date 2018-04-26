<form id="form1" name="form1" method="post" action="pengguna_dalam/kemaskini/borang/borangD_proses.php" style="background-color: #F8F8FF;
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
			<td width="104" height="31"><input type="hidden" id="enable1" name="enable1" value="2" />
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
      <td width="151" rowspan="2" valign="top" bgcolor="#FFFF99"><div align="center"><strong>Harta yang dijual/ditamatkan</strong></div></td>
    </tr>
    <tr>
      <td width="163" height="22" bgcolor="#FFFF99"><div align="center"><b>Baru*</b></div>      </td>
      <td width="171" bgcolor="#FFFF99"><div align="center"><b>Terpakai</b></div>      </td>
      <td width="162" bgcolor="#FFFF99"><div align="center"><b>Membuat/Membina sendiri</b></div></td>
    </tr>
    <tr>
      <td width="20" class="textdescrp2">(a)</td>
      <td width="218" class="textdescrp2">Tanah</td>
      <td width="163"><div align="right">RM 
          <input  name="d1" type="text" size="10" id="d1" value="0"  onkeyup="total_d31();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
        F0101
      </div></td>
      <td width="171" bgcolor="#999999"><!--<div align="right">RM 
          <input  name="d2" type="text" size="10" id="d2" value="" onkeyup="total_d32();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0201</div>--></td>
      <td width="162" bgcolor="#999999"><div align="right"></div></td>
      <td width="151"><div align="right">RM 
          <input  name="d3" type="text" size="10" id="d3" value="0" onkeyup="total_d34();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0401</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">(b)</td>
      <td class="textdescrp2">Bangunan dan pembinaan lain</td>

      <td><div align="right">RM 
        
          <input  name="d4" type="text" size="10" id="d4" value="0" onkeyup="total_d31();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0102</div></td>
      <td><div align="right">RM 
          <input  name="d5" type="text" size="10" id="d5" value="0" onkeyup="total_d32();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0202</div></td>
      <td><div align="right">RM 
          <input  name="d6" type="text" size="10" id="d6" value="0" onkeyup="total_d33();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0302</div></td>
      <td><div align="right">RM 
          <input  name="d7" type="text" size="10" id="d7" value="0" onkeyup="total_d34();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0402</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">(c)</td>
      <td class="textdescrp2">Pembangunan tanah</td>
      <td><div align="right">RM 
          <input  name="d8" type="text" size="10" value="0" onkeyup="total_d31();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
        F0103
      </div></td>
      <td><div align="right">RM 
          <input  name="d9" type="text" size="10" value="0" onkeyup="total_d32();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0203</div></td>
      <td><div align="right">RM 
          <input  name="d10" type="text" size="10" value="0" onkeyup="total_d33();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0303</div></td>
      <td><div align="right">RM 
          <input  name="d11" type="text" size="10" value="0" onkeyup="total_d34();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0403</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">(d)</td>
      <td class="textdescrp2">Alat pengangkutan</td>
      <td><div align="right">RM 
          <input  name="d12" type="text" size="10" value="0" onkeyup="total_d31();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0104</div></td>
      <td><div align="right">RM 
          <input  name="d13" type="text" size="10" value="0" onkeyup="total_d32();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0204</div></td>
      <td bgcolor="#999999"><div align="right"></div></td>
      <td><div align="right">RM 
          <input  name="d14" type="text" size="10" value="0" onkeyup="total_d34();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0404</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">(e)</td>
      <td height="30" class="textdescrp2">Komputer (termasuk perkakasan & perisian)</td>
      <td><div align="right">RM 
          <input  name="d15" type="text" size="10" value="0" onkeyup="total_d31();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0105</div></td>
      <td><div align="right">RM 
          <input  name="d16" type="text" size="10" value="0" onkeyup="total_d32();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0205</div></td>
      <td><div align="right">RM 
          <input  name="d17" type="text" size="10" value="0" onkeyup="total_d33();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0305</div></td>
      <td><div align="right">RM 
          <input  name="d18" type="text" size="10" value="0" onkeyup="total_d34();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0405</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">(f)</td>
      <td class="textdescrp2">Jentera dan kelengkapan</td>
      <td><div align="right">RM 
          <input  name="d19" type="text" size="10" value="0" onkeyup="total_d31();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0106</div></td>
      <td><div align="right">RM 
          <input  name="d20" type="text" size="10" value="0" onkeyup="total_d32();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0206</div></td>
      <td><div align="right">RM 
          <input  name="d21" type="text" size="10" value="0" onkeyup="total_d33();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0306</div></td>
      <td><div align="right">RM 
          <input  name="d22" type="text" size="10" value="0" onkeyup="total_d34();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0406</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">(g)</td>
      <td class="textdescrp2">Perabot dan pemasangan</td>
      <td><div align="right">RM 
          <input  name="d23" type="text" size="10" value="0" onkeyup="total_d31();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
        F0107
      </div></td>
      <td><div align="right">RM 
          <input  name="d24" type="text" size="10" value="0" onkeyup="total_d32();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0207</div></td>
      <td><div align="right">RM 
          <input  name="d25" type="text" size="10" value="0" onkeyup="total_d33();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0307</div></td>
      <td><div align="right">RM 
          <input  name="d26" type="text" size="10" value="0" onkeyup="total_d34();" class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0407</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">(h)</td>
      <td class="textdescrp2">Harta-harta lain (cth: paten, muhibah, kerja dalam proses, dll)</td>
      <td><div align="right">RM 
          <input  name="d27" type="text" size="10" value="0" onkeyup="total_d31();" 
		  class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0108</div></td>
      <td><div align="right">RM 
          <input  name="d28" type="text" size="10" value="0" onkeyup="total_d32();" 
		  class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0208</div></td>
      <td><div align="right">RM 
          <input  name="d29" type="text" size="10" value="0" onkeyup="total_d33();" 
		  class="auto" data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0308</div></td>
      <td><div align="right">RM 
          <input  name="d30" type="text" size="10" value="0" onkeyup="total_d34();" class="auto" 
		  data-v-max="999999999999" data-v-min="-999999999" style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;"/>
      F0408</div></td>
    </tr>
    <tr>
      <td class="textdescrp2">&nbsp;</td>
      <td class="textdescrp1"><div align="center">JUMLAH (a hingga h)</div></td>
      <td><div align="right">RM 
          <input style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;" 
		  name="d31" type="text" size="10" value="0" class="ta6" readonly />
      F0199</div></td>
      <td><div align="right">RM 
          <input style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;" 
		  name="d32" type="text" size="10" value="0" class="ta6" readonly/>
      F0299</div></td>
      <td><div align="right">RM 
          <input style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;" 
		  name="d33" type="text" size="10" value="0" class="ta6" readonly/>
      F0399</div></td>
      <td><div align="right">RM 
          <input style="width:108px;text-align:right;	border: 1.5px solid #a5a5a5;border-radius: 1px;" 
		  name="d34" type="text" size="10" value="0" class="ta6" readonly/>
      F0499</div></td>
    </tr>
 </table>
    
 
<table width="937" border="0" align="center">
<tr>
	<td width="947" height="8" align="left">*Merujuk kepada perolehan aset baru termasuk harta tetap yang diimport sama ada baru atau terpakai.</td>
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