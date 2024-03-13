<?php
defined('BASEPATH') or exit('No direct script access allowed');

class autentifikasi extends CI_Controller{
    public function index(){
        //jika status login, mka tdk bisa akses halaman login atau dikembalikan ke tampilan user
        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!'
        ]);
        $this->form_validation->set_rules('password', 'Password','required|trim',[
            'required' => 'Password Harus diisi!!'
        ]);
        if ($this->form_validation->run() == false){
            $data['judul'] = 'Login';
            $data['user'] = '';
            //kata 'login' mrpkn nilai variabel dlm array $data dikirim ke view aute_header
            $this->load->view('templates/aute_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/aute_footer');
        } else {
            $this->_login();
        }
    }

    private function _login(){
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //jika usernya ada
        if($user){
            //jika user sdh aktif
            if($user['is_active'] == 1){
                //cek password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role']
                    ];

                    $this->session->set_userdata($data);

                    if($user['id_role'] == 1){
                        redirect('admin');
                    }else{
                        if($user['image'] == ''){
                            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                        }
                        redirect('user');
                    }
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Password salah!!</div>');
                    redirect('autentifikasi');
                }
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">User belum diaktifkan!!</div>');
                redirect('autentifikasi');
            }
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }
}