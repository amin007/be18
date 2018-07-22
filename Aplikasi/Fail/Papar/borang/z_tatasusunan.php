<?php

/*
4.1	Tanah	01
	Land	
		
4.2	Bangunan dan binaan lain:	
	Buildings and other construction	02
	a. Tempat kediaman	
	    Residential	
		
	b. Bukan tempat kediaman dan	03
	    binaan lain (cth: lot kedai, pejabat dsb.)	
	    Non-residential and other construction	
	   (e.g.: shoplots, offices etc.)	
		
4.3	Pembangunan tanah	04
	Land improvement	
		
4.4	Kenderaan bermotor dan	05
	jenis pengangkutan lain	
	Motor vehicles and other type of transport	
		
4.5	Perkakasan komputer	06
	Computer hardware	
		
4.6	Perisian komputer	07
	Computer software	
		
4.7	Peralatan telekomunikasi	08
	Telecommunications equipment	
		
4.8	Jentera dan kelengkapan 	09
	Machinery and equipment	
		
4.9	Perabot dan pemasangan	10
	Furniture and fittings	
		
4.10	Paten	11
	Patent	
		
4.11	Muhibah	12
	Goodwill	
		
4.12	Kerja dalam pelaksanaan	13
	Work in progress	
		
4.13	Lain-lain harta	14
	Other assets	
		
4.14	JUMLAH (4.1 hingga 4.13)	99
	TOTAL (4.1 to 4.13)	
		
		
4.15	Harta tetap  dibuat / dibina sendiri	
	Self produced / built fixed assets	
		
4.16	Pembaikan dan pengubahsuaian utama	
	Major repairs and renovation	
		
4.17	Susut nilai semasa	
	Current depreciation	
		
4.18	Nilai buku bersih pada 1.1.2017	
	Net book value as at 1.1.2017	
		
4.19	Jumlah harta tetap (nilai buku bersih bagi tahun kewangan berakhir 31 Disember 2017 atau tidak lewat daripada 30 Jun 2018	
	Total fixed assets (net book value for financial year ending 31 December 2017 or no later than 30 June 2018	
		

*/
$ulangTajuk = array('Harta','Pembelian(baru)','Pembelian(terpakai)','Pelupusan');
$soalan4kp205 = array(
	0 => array('4.0|hahaha|00'),
	1 => array('4.1|Tanah|01'),
	2 => array('4.2a|Tempat kediaman|02'),
	3 => array('4.2b|Bukan tempat kediaman|03'),
	4 => array('4.3|Pembangunan tanah|04'),
	5 => array('4.4|Kenderaan bermotor|05'),
	6 => array('4.5|Perkakasan komputer|06'),
	7 => array('4.6|Perisian komputer|07'),
	8 => array('4.7|Peralatan telekomunikasi|08'),
	9 => array('4.8|Jentera dan kelengkapan|09'),
	10 => array('4.9|Perabot dan pemasangan|10'),
	11 => array('4.10|Paten|11'),
	12 => array('4.11|Muhibah|12'),
	13 => array('4.12|Kerja dalam pelaksanaan|13'),
	14 => array('4.13|Lain-lain harta|14'),
	15 => array('4.14|JUMLAH (4.1 hingga 4.13)|99'),
	16 => array('4.15|Harta tetap  dibuat / dibina sendiri|0404-01'),
	17 => array('4.16|Pembaikan dan pengubahsuaian utama|0404-02'),
	18 => array('4.17|Susut nilai semasa|0404-03'),
	19 => array('4.18|Nilai buku bersih pada 1.1.2017|0404-04'),
	20 => array('4.19|Jumlah harta tetap|0404-05'),
	21 => array('4.19|Jumlah pembelanjaan modal|0405-01')
);