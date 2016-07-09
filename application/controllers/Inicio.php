<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('corredora_model');

	}
	public function index()
	{
		$propiedad['pro'] = $this->corredora_model->get_propiedades_home();
		foreach ($propiedad['pro'] as $key => $value) {
			$id = $propiedad['pro'][$key]['idPropiedad'];
			$propiedad['pro'][$key]['fotos'] = $this->corredora_model->get_foto($id);
		}
		$this->load->view('home',$propiedad);
		$this->load->view('footer');
	}

	
	public function propiedades()
	{
		$propiedad = $this->corredora_model->get_propiedades();
		foreach ($propiedad as $key => $value) {
			$id = $propiedad[$key]['idPropiedad'];
			$propiedad[$key]['fotos'] = $this->corredora_model->get_foto($id);
		}
		var_dump($propiedad);
	}
	public function propiedad($id="")
	{
		if ($id=="") {
			redirect('/inicio/404','refresh');
		}
		$data = $this->corredora_model->get_propiedad($id);
		if (count($data)==0) {
			redirect('/inicio/404','refresh');
		}
		$data[0]['fotos'] = $this->corredora_model->get_foto($data[0]['idPropiedad']);
		$var = 'http://mindicador.cl/api/uf';
		$uf= json_decode(file_get_contents($var),true);
		$data[0]['valor_pesos'] = $uf['serie'][0]['valor'] * $data[0]['valor_publicado'];
		$data[0]['usuario'] = $this->corredora_model->get_usuario($data[0]['usuario']);
		$dirtmp = str_replace(" ","+",$data[0]['direccion']);
		$comuna = str_replace(" ","+",$data[0]['comuna_nombre']);
		$var_ub = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$dirtmp.",+".$comuna;
			$ubi= json_decode(file_get_contents($var_ub),true);
		$data[0]['ubicacion']['latitud'] = $ubi['results'][0]['geometry']['location']['lat'];
		$data[0]['ubicacion']['longitud'] = $ubi['results'][0]['geometry']['location']['lng'];	
		$this->load->view('head',$data[0]);
		$this->load->view('propiedad');
		$this->load->view('footer');
	}

}
