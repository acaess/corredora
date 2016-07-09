<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('corredora_model');
		$this->load->library('encrypt');
		$this->load->helper(array('form', 'url'));
		

	}
	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$usr = $this->input->post('usr');
		$pass = $this->input->post('pass');
		$res = $this->corredora_model->login($usr,$pass);
		if ($res) {
			$this->session->set_userdata($res);
			$session_id = $this->session->userdata();
			redirect('/sistema/administrar_propiedades','refresh');
		}else{
			redirect('/sistema','refresh');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('/sistema','refresh');
	}
	public function administrar_propiedades()
	{
		$data['propiedad']=$this->corredora_model->get_propiedades();
		$data['not'] = $this->corredora_model->count_not();
		foreach ($data['propiedad'] as $key => $value) {
			$data['propiedad'][$key]['fotos'] = $data['foto'] = $this->corredora_model->get_foto($value['idPropiedad']);
		}
		$this->load->view('head_sistema',$data);
		$this->load->view('lista_usuario');
		
	}
	public function admin_propiedad($id="")
	{
		$data['tipos'] = $this->corredora_model->get_tipo();
		$data['transaccion'] = $this->corredora_model->get_transaccion();
		$data['comuna'] = $this->corredora_model->get_comunas();
		$data['not'] = $this->corredora_model->count_not();
		$this->load->helper('form');
		$this->load->view('head_sistema',$data);
		$this->load->view('propiedad_wizzard');
	}
	public function probarencript()
	{
		$var= $this->encrypt->encode("");
		echo $this->encrypt->decode($var);
	}
	public function edicion_propiedad()
	{	
		$id = $this->input->post('id');
		$pro = $this->corredora_model->get_propiedad($id);
		$pro[0]['tipos'] = $this->corredora_model->get_tipo();
		$pro[0]['transaccion'] = $this->corredora_model->get_transaccion();
		$pro[0]['comuna'] = $this->corredora_model->get_comunas();
		$pro[0]['not'] = $this->corredora_model->count_not();
		$this->load->view('head_sistema',$pro[0]);
		$this->load->view('editar_propiedad');
	}
	public function subirPropiedad()
	{
		$tipo = $this->input->post('tipo');
		$comuna = $this->input->post('com');
		$direccion = $this->input->post('direccion');
		$metrosc = $this->input->post('metrosc');
		$metrosTerreno = $this->input->post('metrost');
		$dormitorios = $this->input->post('dormitorios');
		$baño = $this->input->post('banios');
		$valor = $this->input->post('valor');
		$valor_publicado = $this->input->post('valor_publicado');
		$estacionamiento = $this->input->post('estac');
		$Transaccion = $this->input->post('tras');
		$titulo = $this->input->post('titulo');
		$descripcion = $this->input->post('descripcion');
		$sector = $this->input->post('sector');
		$session = $this->session->userdata();

		$propiedad = [
		'Tipo_idTipo'=> $tipo,
		'Comuna_idComuna'=> $comuna,
		'direccion'=> $direccion,
		'metrosConstruidos'=> $metrosc,
		'metrosTerreno'=> $metrosTerreno,
		'dormitorios'=> $dormitorios,
		'baño'=> $baño,
		'valor'=> $valor,
		'valor_publicado'=> $valor_publicado,
		'estacionamiento'=> $estacionamiento,
		'usuario'=> $session['idUsuario'],
		'Transaccion'=> $Transaccion,
		'titulo'=> $titulo,
		'descripcion'=> $descripcion,
		'sector'=> $sector
		];
		$this->corredora_model->insert_propiedad($propiedad);
		$data['pro'] = $this->corredora_model->lastProp();
		$data['not'] = $this->corredora_model->count_not();
		$this->load->view('head_sistema',$data);
		$this->load->view('upPhoto');
		//redirect('/sistema/administrar_propiedades','refresh');
	}

	public function editarPropiedad()
	{
		$id = $this->input->post('id');
		$tipo = $this->input->post('tipo');
		$comuna = $this->input->post('com');
		$direccion = $this->input->post('direccion');
		$metrosc = $this->input->post('metrosc');
		$metrosTerreno = $this->input->post('metrost');
		$dormitorios = $this->input->post('dormitorios');
		$baño = $this->input->post('banios');
		$valor = $this->input->post('valor');
		$valor_publicado = $this->input->post('valor_publicado');
		$estacionamiento = $this->input->post('estac');
		$Transaccion = $this->input->post('tras');
		$titulo = $this->input->post('titulo');
		$descripcion = $this->input->post('descripcion');
		$sector = $this->input->post('sector');
		$session = $this->session->userdata();

		$propiedad = [
		'idPropiedad'=>$id,
		'Tipo_idTipo'=> $tipo,
		'Comuna_idComuna'=> $comuna,
		'direccion'=> $direccion,
		'metrosConstruidos'=> $metrosc,
		'metrosTerreno'=> $metrosTerreno,
		'dormitorios'=> $dormitorios,
		'baño'=> $baño,
		'valor'=> $valor,
		'valor_publicado'=> $valor_publicado,
		'estacionamiento'=> $estacionamiento,
		'usuario'=> $session['idUsuario'],
		'Transaccion'=> $Transaccion,
		'titulo'=> $titulo,
		'descripcion'=> $descripcion,
		'sector'=> $sector
		];
		$this->corredora_model->update_propiedad($propiedad,$id);
		redirect('/sistema/administrar_propiedades','refresh');
	}
	public function borrarPropiedad()
	{
		$id = $this->input->post('id');
		$this->corredora_model->delete_propiedad($id);
		redirect('/sistema/administrar_propiedades','refresh');
	}

	public function eliminar_tipo()
	{

		$id = $this->input->post('id');
		$this->corredora_model->delete_tipo($id);
		redirect('/sistema/listar_tipo','refresh');
	}

	public function crear_tipo()
	{
		$id = $this->input->post('des');
		$arr = ['descripcion'=>$id];
		$this->corredora_model->insert_tipo($arr);
		redirect('/sistema/listar_tipo','refresh');
	}
	public function editar_tipo()
	{
		$id = $this->input->post('id');
		$data['not'] = $this->corredora_model->count_not();
		$nombre = $this->input->post('nombre');
		$tipo = ['descripcion'=>$nombre];
		$this->corredora_model->update_tipo($tipo,$id);
		redirect('/sistema/listar_tipo','refresh');
	}
	public function listar_tipo()
	{
		$data['not'] = $this->corredora_model->count_not();
		$data['tipos'] = $this->corredora_model->get_tipo();
		$this->load->view('head_sistema',$data);
		$this->load->view('lista_tipo');
	}
	public function create_user()
	{
		$data['not'] = $this->corredora_model->count_not();
		$this->load->view('head_sistema',$data	);
		$this->load->view('crear_usuario');
	}
	public function listar_usuario()
	{
		$data['not'] = $this->corredora_model->count_not();
		$data['usuarios'] = $this->corredora_model->get_usuarios();
		$this->load->view('head_sistema',$data);
		$this->load->view('lista_usr');

	}
	public function crear_usuario()
	{
		$rut = $this->input->post('run');
		$nombre =$this->input->post('nombre');
		$apellido =$this->input->post('apellido');
		$clave =$this->input->post('pass');
		$correo =$this->input->post('correo');
		$telefono = $this->input->post('telefono');
		$usr = [
		'rut' => $rut,
		'nombre' =>$nombre,
		'apellido' =>$apellido,
		'clave' =>md5($clave),
		'correo' =>$correo,
		'telefono' => $telefono
		];
		$this->corredora_model->insert_usuario($usr);
		$this->listar_usuario();
	}
	public function update_usuario()
	{
		$id = $this->input->post('id');
		$rut = $this->input->post('rut');
		$nombre =$this->input->post('nombre');
		$apellido =$this->input->post('apellido');
		$clave =$this->input->post('clave');
		$correo =$this->input->post('correo');
		$telefono = $this->input->post('telefono');

		$usr = [
		'rut' => $rut,
		'nombre' =>$nombre,
		'apellido' =>$apellido,
		'clave' =>md5($clave),
		'correo' =>$correo,
		'telefono' => $telefono
		];
		$this->corredora_model->insert_usuario($usr);
	}
	public function borrar_usuario()
	{
		$id = $this->input->post('id');
		$this->corredora_model->delete_usuario($id);
		$this->listar_usuario();

	}
	public function listar_transaccion()
	{
		$data['not'] = $this->corredora_model->count_not();
		$data['lista'] = $this->corredora_model->get_transaccion();
		$this->load->view('head_sistema',$data);
		$this->load->view('lista_transaccion');

	}
	public function crear_transaccion()
	{
		$transaccion = $this->input->post('nombre');
	}

	public function php()
	{
		phpinfo();
	}
	public function editar_usuario()
	{
		$id = $this->input->post('id');
		$data['usr'] = $this->corredora_model->get_usuario($id);
		$data['not'] = $this->corredora_model->count_not();
		$this->load->view('head_sistema',$data);
		$this->load->view('edit_usr');
	}

	public function ingresar_solicitud()
	{
		$nombre = $this->input->post('nombre');
		$id = $this->input->post('id_propiedad');
		$telefono = $this->input->post('tel');
		$mail = $this->input->post('mail');
		$mensaje = $this->input->post('msj');
		$info = [
		'nombre'=>$nombre,
		'idPropiedad'=>$id,
		'telefono'=>$telefono,
		'mail'=>$mail,
		'mensaje'=>$mensaje,
		'estado' =>0		];
		$this->corredora_model->ingresar_consulta($info);
		redirect('/inicio/propiedad/'.$id,'refresh');
	}
	public function desplegar_solicitud()
	{
		$data['notificacion'] = $this->corredora_model->get_notificaciones();
		$data['not'] = $this->corredora_model->count_not();
		$this->load->view('head_sistema',$data);
		$this->load->view('lista_noti');

	}
	public function getionar()
	{
		$id = $this->input->post('id');
		$this->corredora_model->gestionar_notificacion($id); 
		$this->desplegar_solicitud();
	}
	public function e_usr()
	{
		$id = $this->input->post('id');
		$cl1 = $this->input->post('cl');
		$rut = $this->input->post('run');
		$nombre =$this->input->post('nombre');
		$apellido =$this->input->post('apellido');
		$clave =$this->input->post('pass');
		$correo =$this->input->post('correo');
		$telefono = $this->input->post('telefono');
		if ($cl1 !=$clave) {
			$clave = md5($clave);
		}
		$usr = [
		'rut' => $rut,
		'nombre' =>$nombre,
		'apellido' =>$apellido,
		'clave' =>$clave,
		'correo' =>$correo,
		'telefono' => $telefono
		];
		$this->corredora_model->udpate_usuario($usr,$id);
		$this->listar_usuario();
	}
	public function create_transaccion()
	{
		$nombre = $this->input->post('nombre');
		$arr = ['descripcion'=>$nombre];
		$this->corredora_model->insert_transaccion($arr);
		$this->listar_transaccion();
	}
	public function delete_transaccion()
	{
		$id = $this->input->post('id');
		$this->corredora_model->delete_transaccion($id);
		$this->listar_transaccion();
	}
	public function view_editar_tipo()
	{
		$id = $this->input->post('id');
		$data['not'] = $this->corredora_model->count_not();
		$data['tipo'] = $this->corredora_model->get_tipo_one($id)[0];
		$this->load->view('head_sistema',$data);
		$this->load->view('editar_tipo');
	}
	public function subir_foto(){
		$id = $this->input->post('id');
		$config = array(
			'upload_path' => "././imagenes/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "7680",
			'max_width' => "10240"
			);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			 $upload_data = $this->upload->data(); 
 			 $file_name =   $upload_data['file_name'];
 			 $url = 'imagenes/'.$file_name;
 			 $arra = ['url'=>$url,'Propiedad_idPropiedad'=>$id];
			 $this->corredora_model->insert_foto($arra);
			 redirect('/sistema/administrar_propiedades','refresh');
		}
		else
			$error = array('error' => $this->upload->display_errors());
		var_dump($error);
	}
}

