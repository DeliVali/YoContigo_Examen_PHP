<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\API\ResponseTrait;
class UsersController extends BaseController

{
    private $user = '' ;
    public function __construct(){
      
        $this->user = new Users();       
    }
    
    use ResponseTrait;
    // get all product
    public function users()
    {
        $model = new Users();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

        // get single product
        public function show($id )
        {
            $model = new Users();
            $data = $model->getWhere(['id' => $id])->getResult();
            if($data){
                return $this->respond($data);
            }else{
                return $this->failNotFound('No Data Found with id '.$id);
            }
        }

    // show users list
    public function index()
    {
        $session = session(); 
        $data['users'] = $this->user->orderBy('id', 'DESC')->findAll();       
        return view('users',$data);
    }
    
    // insert data
    public function store() {
       
        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'address'  => $this->request->getVar('address'),
        ];
        
        $this->user->insert($data);    
        $session = session(); 
        $session->setFlashdata('msg', 'User Successfully Added');   
        return $this->response->redirect(site_url('/list'));
    }

    // show users by id
    public function edit($id){
          
        $data['users'] = $this->user->where('id', $id)->first();
        echo json_encode($data['users']); 
    }


    // update users data
    public function update(){
        
         $id = $this->request->getVar('updateId');
         
         $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'address'  => $this->request->getVar('address'),  
        ];

        $this->user->where('id',$id)->update($id, $data);   
        echo($id);  
        return $this->response->redirect(site_url('/list'));
    }

     // delete users
     public function delete(){
      
        $id = $this->request->getvar('deleteId');
        $data['users'] = $this->user->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/list'));
    }   

}
