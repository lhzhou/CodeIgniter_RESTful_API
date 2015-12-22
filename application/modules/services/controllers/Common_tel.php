<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 20/12/15
 * Time: 上午10:33
 */

class Common_tel extends Base_Controller  {

    function __construct()
    {
        parent::__construct();
        $this->load->model('common_tel_model' , "ctm");
    }

    public function get_category()
    {

        $params['id'] = $this->input->post('id');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->ctm->get_category($params);
        $total = $this->ctm->get_category($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_SERVICES_COMMON_TEL_CATEGORY_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_SERVICES_COMMON_TEL_CATEGORY_FAILURE
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
            	'name',
            )
        );
        $params['name'] = $input['name'];
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';
        
        $params['created_by'] = $this->get_user_id();

        $response = $this->ctm->create_category($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_COMMON_TEL_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_COMMON_TEL_CATEGORY_FAILURE
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
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';
        $params['updated_by'] = $this->get_user_id();
        $params['updated_at'] = $this->get_date();
//        echo json_encode($params);die;
        $response = $this->ctm->update_category($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_COMMON_TEL_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_COMMON_TEL_CATEGORY_FAILURE
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


        $response = $this->ctm->delete_category($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_COMMON_TEL_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_COMMON_TEL_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }

    public function get_tel()
    {

        $params['id'] = $this->input->post('id');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->ctm->get_tel($params);
        $total = $this->ctm->get_tel($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_SERVICES_COMMON_TEL_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_SERVICES_COMMON_TEL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }

    public function create_tel()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
            	'category_id',
            	'name',
            	'tel'
            )
        );
        $params['category_id'] = $input['category_id'];
        $params['name'] = $input['name'];
        $params['tel'] = $input['tel'];
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';
        
        $params['created_by'] = $this->get_user_id();

        $response = $this->ctm->create_tel($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_COMMON_TEL_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_COMMON_TEL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }
    public function update_tel()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'id',
                'category_id',
                'name',
                'tel'
            )
        );

        $id = $input['id'];
        $params['category_id'] = $input['category_id'];
        $params['name'] = $input['name'];
        $params['tel'] = $input['tel'];
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';
        $params['updated_by'] = $this->get_user_id();
        $params['updated_at'] = $this->get_date();
//        echo json_encode($params);die;
        $response = $this->ctm->update_tel($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_COMMON_TEL_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_COMMON_TEL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }


    }

    public function delete_tel()
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


        $response = $this->ctm->delete_tel($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_COMMON_TEL_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_COMMON_TEL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }



}