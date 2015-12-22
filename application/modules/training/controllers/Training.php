<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 19/12/15
 * Time: 下午11:59
 */
class Training extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('training_model' , 'tm');
    }

    public function get_category()
    {

        $params['id'] = $this->input->post('id');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->tm->get_category($params);
        $total = $this->tm->get_category($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_TRAINING_CATEGORY_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_TRAINING_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }

    public function create_category()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'name'
            )
        );

        $params['name'] = $input['name'];
        $params['desc'] = $input['desc'];
        $params['icon'] = isset($input['icon'])? $input['icon'] : '';
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '';

        $params['created_by'] = $this->get_user_id();

        $response = $this->tm->create_category($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_TRAINING_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_TRAINING_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }
    public function update_category()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'id',
                'name'
            )
        );

        $id = $input['id'];
        $params['name'] = $input['name'];
        $params['desc'] = $input['desc'];
        $params['icon'] = isset($input['icon'])? $input['icon'] : '';
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '';

        $params['updated_by'] = $this->get_user_id();
        $params['updated_at'] = $this->get_date();
//        echo json_encode($params);die;
        $response = $this->tm->update_category($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_TRAINING_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_TRAINING_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }


    }

    public function delete_category()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'id'
            )
        );

        $id = $input['id'];
        $params['deleted_by'] = $this->get_user_id();
        $params['deleted_at'] = $this->get_date();


        $response = $this->tm->delete_category($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_TRAINING_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_TRAINING_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }

    //培训机构
    public function get_org()
    {

        $params['id'] = $this->input->post('id');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->tm->get_category($params);
        $total = $this->tm->get_category($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_TRAINING_ORG_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_TRAINING_ORG_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }

    public function create_org()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'area_id',
                'category_id',
                'name',
                'desc',
                'phone',
                'address',
                'lat',
                'long',
                'logo'
            )
        );

        $params['area_id'] = $input['area_id'];
        $params['category_id'] = $input['category_id'];
        $params['name'] = $input['name'];
        $params['desc'] = $input['desc'];
        $params['phone'] = $input['phone'];
        $params['address'] = $input['address'];
        $params['lat'] = $input['lat'];
        $params['long'] = $input['long'];
        $params['logo'] = $input['logo'];

        $params['created_by'] = $this->get_user_id();

        $response = $this->tm->create_org($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_TRAINING_ORG_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_TRAINING_ORG_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }
    public function update_org()
    {
        $input = $this->input->post();

        $this->is_required(
            'POST' ,
            array(
                'area_id',
                'category_id',
                'name',
                'desc',
                'phone',
                'address',
                'lat',
                'long',
                'logo'
            )
        );

        $id = $input['id'];
        $params['area_id'] = $input['area_id'];
        $params['category_id'] = $input['category_id'];
        $params['name'] = $input['name'];
        $params['desc'] = $input['desc'];
        $params['phone'] = $input['phone'];
        $params['address'] = $input['address'];
        $params['lat'] = $input['lat'];
        $params['long'] = $input['long'];
        $params['logo'] = $input['logo'];

        $params['updated_by'] = $this->get_user_id();
        $params['updated_at'] = $this->get_date();
//        echo json_encode($params);die;
        $response = $this->tm->update_org($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_TRAINING_ORG_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_TRAINING_ORG_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }


    }

    public function delete_org()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'id'
            )
        );

        $id = $input['id'];
        $params['deleted_by'] = $this->get_user_id();
        $params['deleted_at'] = $this->get_date();


        $response = $this->tm->delete_org($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_TRAINING_ORG_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_TRAINING_ORG_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }

    // 培训机构 training_课程

    public function get_course()
    {
        $params['id'] = $this->input->post('id');
        $params['category_id'] = $this->input->post('category');
        $params['org_id'] = $this->input->post('org');
        $params['name'] = $this->input->post('name');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->tm->get_course($params);
        $total = $this->tm->get_course($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_TRAINING_COURSE_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_TRAINING_COURSE_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }

    public function create_course()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'org_id',
                'category_id',
                'name',
                'desc',
                'date',
                'price',
                'address',
                'lat',
                'long'
            )
        );

        $params['org_id'] = $input['org_id'];
        $params['category_id'] = $input['category_id'];
        $params['name'] = $input['name'];
        $params['desc'] = htmlspecialchars($this->input->post('desc' , false));
        $params['date'] = $input['date'];
        $params['address'] = $input['address'];
        $params['lat'] = $input['lat'];
        $params['long'] = $input['long'];
        $params['price'] = $input['price'];

        $params['created_by'] = $this->get_user_id();

        $response = $this->tm->create_course($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_TRAINING_COURSE_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_TRAINING_COURSE_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }
    public function update_course()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'org_id',
                'category_id',
                'name',
                'desc',
                'date',
                'price',
                'address',
                'lat',
                'long'
            )
        );
        $id = $input['id'];
        $params['org_id'] = $input['org_id'];
        $params['category_id'] = $input['category_id'];
        $params['name'] = $input['name'];
        $params['desc'] = htmlspecialchars($this->input->post('desc' , false));
        $params['date'] = $input['date'];
        $params['address'] = $input['address'];
        $params['lat'] = $input['lat'];
        $params['long'] = $input['long'];
        $params['price'] = $input['price'];

        $params['updated_by'] = $this->get_user_id();
        $params['updated_at'] = $this->get_date();
//        echo json_encode($params);die;
        $response = $this->tm->update_course($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_TRAINING_COURSE_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_TRAINING_COURSE_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }


    }

    public function delete_course()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'id'
            )
        );

        $id = $input['id'];
        $params['deleted_by'] = $this->get_user_id();
        $params['deleted_at'] = $this->get_date();


        $response = $this->tm->delete_course($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_TRAINING_COURSE_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_TRAINING_COURSE_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }



}