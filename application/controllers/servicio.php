<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	public function index()
	{
		$lista=$this->servicio_model->listaservicios();
		$data['servicio']=$lista;

		$this->load->view('modulos/servicio/serv_lista',$data);
	}
    public function agregar()
	{
		$this->load->view('modulos/servicio/serv_form');
	}
    public function agregarbd()
	{
        $data['nombre']=$_POST['nombre'];
        $data['costo']=$_POST['costo'];

        $this->servicio_model->agregarservicio($data);

        redirect('servicio/index','refresh');
	}
    public function eliminarbd()
	{
        $id=$_POST['id'];

        $this->servicio_model->eliminarservicio($id);

        redirect('servicio/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infoservicio']=$this->servicio_model->recuperarservicio($id);
        $this->load->view('modulos/servicio/serv_modif',$data);
	}
    public function modificarbd()
	{
        $id=$_POST['id'];

        $data['nombre']=$_POST['nombre'];
        $data['costo']=$_POST['costo'];

        $this->servicio_model->modificarservicio($id, $data);

        redirect('servicio/index','refresh');
	}

}