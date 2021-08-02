<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Surat_model');
        $this->load->model('KodeUrut_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['totalSK'] = $this->Surat_model->countAllSuratKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Wewenang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/role', $data);
        $this->load->view('templates/footer');
    }

    public function addrole()
    {
        $data['title'] = 'Wewenang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $role = $this->input->post('role');

        $Role = ['role' => $role];

        $this->db->insert('user_role', $Role);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Akses Wewenang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function member()
    {
        $data['title'] = 'Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Member_model', 'member');

        $data['member'] = $this->member->getMember();

        $data['bagian'] = $this->db->get('user_bagian')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/member', $data);
        $this->load->view('templates/footer');
    }

    public function bagian()
    {
        $data['title'] = 'Data Bagian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Member_model', 'member');

        $data['member'] = $this->member->getMember();

        $data['bagian'] = $this->db->get('user_bagian')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/bagian', $data);
        $this->load->view('templates/footer');
    }
    public function addBagian()
    {
        $bagian = $this->input->post('bagian');

        $data = [
            'bagian' => $bagian
        ];

        $this->db->insert('user_bagian', $data);
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('operator/bagian');
    }


    public function addKode()
    {
        $this->KodeUrut_model->addKode();
        redirect('operator/addSK');
    }

    public function deleteKode()
    {
        $this->load->model('KodeUrut_model', 'deletecode');
        $data['kode_urut'] = $this->deletecode->deleteKode('kode_urut', 'kode');

        redirect('operator/dataSK');
    }

    public function dataSK()
    {
        $data['title'] = 'Data Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // //load library
        // $this->load->library('pagination');

        // //Pagination
        // $config['base_url'] = 'http://localhost/manage-mail/operator/dataSK';
        // $config['total_rows'] = $this->Surat_model->countAllSurat();
        // $config['per_page'] = 10;

        // //style
        // $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        // $config['full_tag_close'] = '</ul></nav>';

        // $config['first_link'] = 'First';
        // $config['first_tag_open'] = '<li class="page-item">';
        // $config['first_tag_close'] = '</li>';

        // $config['last_link'] = 'Last';
        // $config['last_tag_open'] = '<li class="page-item">';
        // $config['last_tag_close'] = '</li>';

        // $config['next_link'] = '&raquo';
        // $config['next_tag_open'] = '<li class="page-item">';
        // $config['next_tag_close'] = '</li>';

        // $config['prev_link'] = '&laquo';
        // $config['prev_tag_open'] = '<li class="page-item">';
        // $config['prev_tag_close'] = '</li>';

        // $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        // $config['cur_tag_close'] = '</a></li>';

        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';

        // $config['attributes'] = array('class' => 'page-link');

        // //iniltialize
        // $this->pagination->initialize($config);


        // $data['start'] = $this->uri->segment(3);
        // $data['suratkeluar'] = $this->Surat_model->getSuratKeluar($config['per_page'], $data['start']);

        $data['suratkeluar'] = $this->Surat_model->getAllSuratKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/dataSK', $data);
        $this->load->view('templates/footer');
    }

    public function pengaturan()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('operator/pengaturan', $data);
        $this->load->view('templates/footer');
    }

    public function delsk($id)
    {
        // $this->session->set_flashdata('flash', 'dihapus');
        $this->Surat_model->delsk($id);

        redirect('user/suratkeluar');
    }
}
