<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mod_reporte extends CI_Model{
	function __construct()
	{
		 parent::__construct();
        $this->load->database();
	}
	// public function reportesGenera($FInicial, $FFinal){
	// 	$sql="
	// 	select f.codi_fac as 'numero_factura',
	// 	f.fech_fac as 'Fecha',
	// 	p.dni_pac as 'DNI',
 //        p.nomb_pac as 'Nombre',
 //        p.apel_pac as 'Apellido',
 //        pr.desc_pro as 'Procedimiento',
 //        f.tota_fac as 'Total'    
	// 	from sis_clinicadental.factura f,
	// 	sis_clinicadental.paciente p,
	// 	sis_clinicadental.procedimiento pr,
	// 	 sis_clinicadental.detalle_fac dt

	// 	 where
	// 	 f.codi_fac=dt.codi_fac and
	// 	 dt.codi_dpr=p.codi_pac and
	// 	 dt.codi_dpr=pr.codi_pro and
	// 	 f.fech_fac between '".$FInicial."' and '".$FFinal."';
	// 	";
	// 	//echo $sql;
	// 	$query=$this->db->query($sql);
	// 	return $query->result();
	// }


	public function reportesGenera($FInicial, $FFinal){
		$sql="
		SELECT DISTINCT B.codi_fac as numero_factura, 
		E.dni_pac as DNI, E.nomb_pac Nombre, E.apel_pac Apellido,
		B.fech_fac as 'Fecha',
		B.tota_fac as 'Total'
		FROM detalle_fac A
		INNER JOIN factura B ON B.codi_fac = A.codi_fac
		INNER JOIN historial_proc C ON C.codi_dpr = A.codi_dpr
		INNER JOIN cita_medica D ON D.codi_cit = C.codi_cit
		INNER JOIN paciente E ON E.codi_pac = D.codi_pac
		INNER JOIN detalle_proc F ON F.codi_dpr = A.codi_dpr
		INNER JOIN tarifa_proc G ON G.codi_tar = F.codi_tar
        INNER JOIN horario_medico H ON H.codi_homed = D.codi_homed
		WHERE date_format(B.fech_fac,'%Y%m%d') between date_format('$FInicial','%Y%m%d') and date_format('$FFinal','%Y%m%d')
		GROUP BY B.codi_fac, E.dni_pac, E.nomb_pac, E.apel_pac, H.fech_homed";
		//echo $sql;
		$query=$this->db->query($sql);
		return $query->result();
	}
}

// $sql="
// 		SELECT B.codi_fac as numero_factura, 
// 		E.dni_pac as DNI, E.nomb_pac Nombre, E.apel_pac Apellido,
// D.fech_cit as 'Fecha',
//   B.tota_fac as 'Total'
// FROM detalle_fac A
// INNER JOIN factura B ON B.codi_fac = A.codi_fac
// INNER JOIN historial_proc C ON C.codi_dpr = A.codi_dpr
// INNER JOIN cita_medica D ON D.codi_cit = C.codi_cit
// INNER JOIN paciente E ON E.codi_pac = D.codi_pac
// INNER JOIN detalle_proc F ON F.codi_dpr = A.codi_dpr
// INNER JOIN tarifa_proc G ON G.codi_tar = F.codi_tar
// WHERE D.fech_cit BETWEEN '".$FInicial."' and '".$FFinal."'
// GROUP BY B.codi_fac, E.dni_pac, E.nomb_pac, E.apel_pac, D.fech_cit";
// 		//echo $sql;
// 		$query=$this->db->query($sql);
// 		return $query->result();


// select DISTINCT `f`.`codi_fac` AS `codi_fac`,`f`.`fech_fac` AS `fech_fac`,`f`.`tota_fac` AS `tota_fac`,`p`.`desc_pro` AS `desc_pro`,`p`.`grup_pro` AS `grup_pro`,`pa`.`nomb_pac` AS `nomb_pac`,`pa`.`apel_pac` AS `apel_pac` from ((((((((`sis_clinicadental`.`factura` `f` join `sis_clinicadental`.`detalle_fac` `df`)  join `sis_clinicadental`.`tarifa_proc` `tp`) join `sis_clinicadental`.`diente` `d`) join `sis_clinicadental`.`categoria` `c`) join `sis_clinicadental`.`procedimiento` `p`) join `sis_clinicadental`.`paciente` `pa`)  join `sis_clinicadental`.`historial_proc` `hp`) left join `sis_clinicadental`.`cita_medica` `cm` on(((`hp`.`codi_cit` = `cm`.`codi_cit`) and (`d`.`codi_cit` = `cm`.`codi_cit`)))) where ((`f`.`codi_fac` = `df`.`codi_fac`)   and (`tp`.`codi_pro` = `p`.`codi_pro`) and (`tp`.`codi_cat` = `c`.`codi_cat`) and (`pa`.`codi_pac` = `d`.`codi_pac`))