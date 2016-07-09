<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Corredora_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function Login($correo,$pass)
	{
		$this->db->where('correo',$correo);
		$this->db->where('clave',md5($pass));
		$usr = $this->db->get('Usuario')->result_array();
		if (count($usr)>0) {
			unset($user[0]['clave']);
			return $usr[0];
		}
		return false;
	}
	public function get_usuarios()
	{
		return $this->db->get('Usuario')->result_array();
	}
	public function get_usuario($id)
	{
		return $this->db->get('Usuario')->result_array()[0];
	}
	public function udpate_usuario($usuario,$id)
	{
		$this->db->where('idUsuario', $id);
		return $this->db->update('Usuario', $usuario); 
	}

	public function insert_usuario($usuario)
	{
		return $this->db->insert('Usuario', $usuario); 
	}


	public function delete_usuario($id)
	{
		$this->db->where('idUsuario', $id);
		$this->db->delete('Usuario');
	}

	public function get_tipo()
	{
		return $this->db->get('Tipo')->result_array();
	}
	public function get_tipo_one($id)
	{	$this->db->where('idTipo',$id);
		return $this->db->get('Tipo')->result_array();
	}
	public function insert_tipo($tipo)
	{
		return $this->db->insert('Tipo',$tipo); 
	}
	public function update_tipo($tipo,$id)
	{
		$this->db->where('idTipo', $id);
		return $this->db->update('Tipo', $tipo); 
	}
	public function delete_tipo($id)
	{
		$this->db->where('idTipo', $id);
		return $this->db->delete('Tipo');
	}

	public function get_foto($id_propiedad)
	{
		$this->db->where('Propiedad_idPropiedad', $id_propiedad);
		return $this->db->get('Foto')->result_array();
	}
	public function insert_foto($foto)
	{
		return $this->db->insert('Foto', $foto); 
	}
	public function delete_foto($id)
	{
		$this->db->where('Propiedad_idPropiedad', $id);
		return $this->db->delete('Foto');
	}

	public function delete_mensaje($id)
	{
		$this->db->where('idConsulta', $id);
		return $this->db->delete('consulta');
	}
	public function get_propiedades()
	{
		$this->db->select('*,Transaccion.descripcion as destran,Propiedad.descripcion as desprop');
		$this->db->join('Transaccion','Transaccion = idTransaccion');
		return $this->db->get('Propiedad')->result_array();
	}
	public function get_propiedades_home()
	{
		$this->db->limit(4);
		$this->db->select('*,Transaccion.descripcion as destran,Propiedad.descripcion as desprop');
		$this->db->join('Transaccion','Transaccion = idTransaccion');
		$this->db->join('comuna','propiedad.Comuna_idComuna = comuna.idComuna');
		$this->db->order_by("RAND()");
		return $this->db->get('Propiedad')->result_array();
	}
	public function get_propiedad($id)
	{	
		$this->db->select('*,Comuna.descripcion as comuna_nombre,Propiedad.descripcion as descripcion_propiedad,Tipo.descripcion as descripcion_tipo,Transaccion.descripcion as descripcion_transaccion');
		$this->db->join('Comuna','Comuna_idComuna = idComuna','left');
		$this->db->join('provincias','provincia_id=Region_idRegion','left');
		$this->db->join('Region','region_id = idRegion','left');
		$this->db->join('Tipo','Tipo_idTipo = idTipo','left');
		$this->db->join('Transaccion','Transaccion = idTransaccion','left');
		$this->db->where('idPropiedad', $id);
		$query = $this->db->get('Propiedad')->result_array();
 			return $query;
	}
	public function insert_propiedad($propiedad)
	{
		return $this->db->insert('Propiedad', $propiedad); 
	}
	public function update_propiedad($propiedad,$id)
	{
		$this->db->where('idPropiedad', $id);
		return $this->db->update('Propiedad',$propiedad); 
	}
	public function get_notificaciones()
	{
		return $this->db->get('consulta')->result_array();
	}

	public function delete_propiedad($id)
	{
		$this->delete_mensaje($id);
		$this->delete_foto($id);
		$this->db->where('idPropiedad', $id);
		return $this->db->delete('Propiedad');
	}
	public function count_not()
	{
		$this->db->where('estado',0);
		$query = $this->db->get('consulta')->result_array();
		return count($query);
	}
	public function get_comunas()
	{
		return $this->db->get('Comuna')->result_array();
	}

	public function get_transaccion()
	{
		return $this->db->get('Transaccion')->result_array();
	}
	public function insert_transaccion($transaccion)
	{
		return $this->db->insert('Transaccion', $transaccion); 
	}
	public function update_transaccion($transaccion,$id)
	{
		$this->db->where('idTransaccion', $id);
		return $this->db->update('Transaccion', $transaccion); 
	}
	public function delete_transaccion($id)
	{
		$this->db->where('idTransaccion', $id);
		return $this->db->delete('Transaccion');
	}
	public function ingresar_consulta($consulta)
	{
		return $this->db->insert('consulta', $consulta); 
	}
	public function gestionar_notificacion($id)
	{
		$this->db->where('idConsulta',$id);
		$numero = ['estado'=>1];
		return $this->db->update('consulta',$numero);
	}
	public function lastProp()
	{
		$this->db->limit(1);
		$this->db->select('*');
		$this->db->order_by("propiedad.idPropiedad","DESC");
		return $this->db->get('Propiedad')->result_array();
	}
}

/* End of file sistema_model.php */
/* Location: ./application/models/sistema_model.php */