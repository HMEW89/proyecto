<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index()
	{

		if($this->session->userdata('nombreUsuario'))
		{
			redirect('usuario/panel','refresh');			 
		}
		else
		{
			$data['msg']=$this->uri->segment(3);
			$this->load->view('login', $data);
		}
	}

	public function validarusuario()
	{
		$nombreUsuario=$_POST['nombreUsuario'];
		$contrasenia=md5($_POST['contrasenia']);

		$consulta=$this->usuario_model->validar($nombreUsuario,$contrasenia);     //consulta a BD

		if($consulta->num_rows()>0)
		{
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('id', $row->id);
				$this->session->set_userdata('ci', $row->ci);
				$this->session->set_userdata('nombres', $row->nombres);
				$this->session->set_userdata('primerApellido', $row->primerApellido);
				$this->session->set_userdata('segundoApellido', $row->primerApellido);
				$this->session->set_userdata('email', $row->email);
				$this->session->set_userdata('telefono', $row->telefono);
				$this->session->set_userdata('rol', $row->rol);
				$this->session->set_userdata('nombreUsuario', $row->nombreUsuario);
				$this->session->set_userdata('contrasenia', $row->contrasenia);
				$this->session->set_userdata('estado', $row->estado);
				$this->session->set_userdata('fechaRegistro', $row->fechaRegistro);
				$this->session->set_userdata('fechaActualizacion', $row->fechaActualizacion);
				$this->session->set_userdata('idUsuario', $row->idUsuario);
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			redirect('usuario/index/1','refresh');
		}
	}

	public function panel()
	{
		if($this->session->userdata('nombreUsuario'))
		{
			$tipo=$this->session->userdata('rol');
			if($tipo =='Administrador')
			{
				redirect('/usuario/indexlte','refresh');
                
			}
			else{
				redirect('usuario/indexlte','refresh');
			}			 
		}
		else
		{
			redirect('usuario/index/2','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/3','refresh');
	}

    
	public function indexlte()
	{
        $lista=$this->usuario_model->listausuarios();
		        $data['usuario']=$lista;

		        $this->load->view('modulos/usuario/usuario_list',$data);
	}




    public function agregar()
	{
		$this->load->view('modulos/usuario/usuario_form');
	}
    public function agregarbd()
	{
        
        // Obtener datos del formulario
        $primerApellido = $_POST['primerApellido'];
        $ci = $_POST['ci'];
        $email = $_POST['email'];

        // Generar nombre de usuario a partir del apellido y CI
        $nombreUsuario = strtolower(substr($primerApellido, 0, 3) . $ci);

        // Generar contraseña segura
        $contraseñaGenerada = $this->usuario_model->generarContraseñaSegura();

        // Aquí debes guardar $nombreUsuario, $contraseñaGenerada y otros datos del usuario en tu base de datos.
        $data['ci']=$_POST['ci'];
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerApellido'];
        $data['segundoApellido']=$_POST['segundoApellido'];
        $data['email']=$_POST['email'];
        $data['telefono']=$_POST['telefono'];
        $data['rol']=$_POST['rol'];
        $data['nombreUsuario']=$nombreUsuario;
        $data['contrasenia']=md5($contraseñaGenerada);

        $this->usuario_model->agregarusuario($data);

        // Luego, envía el nombre de usuario y la contraseña al correo del usuario.
        $asunto = "Tu nuevo nombre de usuario y contraseña";
        $mensaje = "Nombre de usuario: $nombreUsuario\nContraseña: $contraseñaGenerada";
        ini_set('smtp_port', 587);
        mail($email, $asunto, $mensaje);

        // Redirige a la página de éxito o muestra un mensaje de éxito.
        redirect('usuario/index','refresh');
    }
    public function eliminarbd()
	{
        $id=$_POST['id'];

        $this->usuario_model->eliminarusuario($id);

        redirect('usuario/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infousuario']=$this->usuario_model->recuperarusuario($id);
        $this->load->view('modulos/usuario/usuario_modif',$data);
	}
    public function modificarbd()
	{
        $id=$_POST['id'];

        $data['ci']=$_POST['ci'];
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerApellido'];
        $data['segundoApellido']=$_POST['segundoApellido'];
        $data['email']=$_POST['email'];
        $data['telefono']=$_POST['telefono'];
        $data['rol']=$_POST['rol'];

        $this->usuario_model->modificarusuario($id, $data);

        redirect('usuario/index','refresh');
	}



}
