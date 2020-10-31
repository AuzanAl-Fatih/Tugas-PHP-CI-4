<?php
namespace App\Controllers;

class Home extends BaseController {
	private $modelUser;

	public function __construct() {
		$this->modelUser = model('ModelUser');
	}

	public function index() {
		helper(['form', 'url']);

		$users = $this->modelUser->find();
		
		$check = $this->validate([
			'name' => ['label' => 'Nama', 'rules' => 'required|min_length[3]'],
			'gender' => ['label' => 'Jenis Kelamin', 'rules' => 'required|in_list[Laki - laki, Perempuan]'],
			'phone' => ['label' => 'No. HP', 'rules' => 'required|min_length[8]|max_length[16]'],
			'address' => ['label' => 'Alamat', 'rules' => 'required'],
			'photo' => ['label' => 'Foto', 'rules' => 'uploaded[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]|max_size[photo,10240]'],
		]);
		
		$name = $this->request->getPost('name');
		$gender = $this->request->getPost('gender');
		$phone = $this->request->getPost('phone');
		$address = $this->request->getPost('address');

		$userdata = [
			'user_name' => $name,
			'user_gender' => $gender,
			'user_phone' => $phone,
			'user_address' => $address,
		];

		$data = [
			'validation' => $this->validator,
			'userdata' => $userdata,
			'users' => $users
		];

		if (!$check) {
			return view('welcome_message', $data);
		} else {
			$photo = $this->request->getFile('photo');
			$userdata['user_photo'] = $photo->getRandomName();
			$photo->move(ROOTPATH . 'public/img/users', $userdata['user_photo']);

			$this->modelUser->insert($userdata);
			
			return redirect()->to('/');
		}
	}

	//--------------------------------------------------------------------

}
