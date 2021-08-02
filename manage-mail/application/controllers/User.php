<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Surat_model');
        $this->load->model('KodeUrut_model');
        $this->load->model('Member_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sk'] = $this->db->get('surat_keluar')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengaturan', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $bagian = $this->input->post('bagian');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('bagian_id', $bagian);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil <strong>berhasil</strong> diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
            redirect('user/pengaturan');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'kata sandi saat ini', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Kata sandi baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'konfirmasi kata sandi baru', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengaturan', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi saat ini salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
                redirect('user/pengaturan');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi saat ini!</div>');
                    redirect('user/pengaturan');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata Sandi <strong>berhasil</strong> diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div></div>');

                    redirect('user/pengaturan');
                }
            }
        }
    }

    public function addKode()
    {
        $this->KodeUrut_model->addKode();
        redirect('user/addsk');
    }

    public function deleteKode()
    {
        $this->load->model('KodeUrut_model', 'deletecode');
        $data['kode_urut'] = $this->deletecode->deleteKode('kode_urut', 'kode');

        redirect('user/sk');
    }

    public function sk()
    {
        $data['title'] = 'Data Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['suratkeluar'] = $this->Surat_model->getAllSuratKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function addsk()
    {
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim|is_unique[surat_keluar.nomor_surat]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Surat Keluar';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $kode =  $this->KodeUrut_model->getKode();

            $this->load->view('templates/customheader', $data);
            $this->load->view('user/addsuratkeluar', $kode);
            $this->load->view('templates/footer');
        } else {
            $no_urut = $this->input->post('nomor_urut');
            $no_surat = $this->input->post('nomor_surat');
            $perihal = $this->input->post('perihal');
            $tembusan = $this->input->post('tembusan');
            $tujuan = $this->input->post('tujuan');
            $ket = $this->input->post('ket_surat');

            $data2 = [
                'nomor_urut' => $no_urut,
                'nomor_surat' => $no_surat,
                'perihal' => $perihal,
                'tembusan' => $tembusan,
                'tujuan' => $tujuan,
                'keterangan' => $ket,
            ];
            $this->db->insert('surat_keluar', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat keluar <strong>berhasil</strong> ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
            redirect('user/sk');
        }
    }

    public function usk()
    {
        $data['title'] = 'Edit Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nomor_surat', 'Nomor surat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editSK', $data);
            $this->load->view('templates/footer');
        } else {
            $nomor_urut = $this->input->post('nomor_urut');
            $nomor_surat = $this->input->post('nomor_surat');
            $perihal = $this->input->post('perihal');
            $tembusan = $this->input->post('tembusan');
            $tujuan = $this->input->post('tujuan');
            $tgl_surat = $this->input->post('tgl_surat');
            $ket_surat = $this->input->post('ket_surat');

            $this->db->set('nomor_urut', $nomor_urut);
            $this->db->set('nomor_surat', $nomor_surat);
            $this->db->set('perihal', $perihal);
            $this->db->set('nomor_urut', $nomor_urut);
            $this->db->set('tembusan', $tembusan);
            $this->db->set('tujuan', $tujuan);
            $this->db->set('tgl_surat', $tgl_surat);
            $this->db->set('keterangan', $ket_surat);
            $this->db->where('nomor_urut', $nomor_urut);
            $this->db->update('surat_keluar');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data <strong>berhasil</strong> diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
            redirect('user/sk');
        }
    }
    public function esk($id)
    {
        $data['title'] = 'Edit Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['suratkeluar'] = $this->Surat_model->esk($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/editSK', $data);
        $this->load->view('templates/footer');
    }

    public function delsk($id)
    {
        $this->Surat_model->delsk($id);

        redirect('user/suratkeluar');
    }

    public function lapsk()
    {
        $data['title'] = 'Laporan Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lapSK', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['data_lap'])) {
            $tgl1     = date('d-m-Y', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
            $tgl2     = date('d-m-Y', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

            redirect("user/flapsk/$tgl1/$tgl2");
        }
    }
    public function flapsk()
    {
        $data['title'] = 'Data Laporan Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');

        $data['dateFilter'] = $this->Surat_model->getDateSK($startdate, $enddate);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/flapsk', $data);
        $this->load->view('templates/footer');
    }

    public function pengaturan()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bagian'] = $this->db->get('user_bagian')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pengaturan', $data);
        $this->load->view('templates/footer');
    }
}
