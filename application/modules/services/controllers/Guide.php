<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 20/12/15
 * Time: 下午3:27
 * Name: 办事指南
 */
class Guide extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guide_model' , 'gm');
    }

    public function get_category()
    {

        $params['id'] = $this->input->post('id');
        $params['type_id'] = $this->input->post('type_id');
        $params['name'] = $this->input->post('name');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->gm->get_category($params);
        $total = $this->gm->get_category($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_SERVICES_GUIDE_CATEGORY_SUCCESS,
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_SERVICES_GUIDE_CATEGORY_FAILURE
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
                'type_id',
                'name',
            )
        );
        $params['type_id'] = $input['type_id'];
        $params['name'] = $input['name'];
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';

        $params['created_by'] = $this->get_user_id();

        $response = $this->gm->create_category($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_GUIDE_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_GUIDE_CATEGORY_FAILURE
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
                'type_id',
                'name'
            )
        );

        $id = $input['id'];
        $params['type_id'] = $input['type_id'];
        $params['name'] = $input['name'];
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';
        $params['updated_by'] = $this->get_user_id();
        $params['updated_at'] = $this->get_date();
//        echo json_encode($params);die;
        $response = $this->gm->update_category($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_GUIDE_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_GUIDE_CATEGORY_FAILURE
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

        $response = $this->gm->delete_category($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_GUIDE_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_GUIDE_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }

    public function get_guide()
    {

        $params['id'] = $this->input->post('id');
        $params['category_id'] = $this->input->post('category_id');
        $params['name'] = $this->input->post('name');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->gm->get_guide($params);
        $total = $this->gm->get_guide($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_SERVICES_GUIDE_CATEGORY_SUCCESS,
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_SERVICES_GUIDE_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }

    public function create_guide()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'category_id',
                'name',
                'org_name',
                'project_type',
                'service_object',
                'time_limit',
                'fees',
                'basis',
                'details',
                'requirement',
                'process',
                'location',
                'contact',
                'phone',
                'receptiontime',
                'complaints',
                'lat',
                'long'
            )
        );

        $params['category_id'] = $input['category_id']; //项目分类
        $params['name'] = $input['name'];               //项目名称
        $params['org_name'] = $input['org_name'];               //受理机构
        $params['project_type'] = $input['project_type'];       //项目类型
        $params['service_object'] = $input['service_object'];   //服务对象
        $params['time_limit'] = htmlspecialchars($this->input->post('time_limit' , false)); //办理时限
        $params['fees'] = htmlspecialchars($this->input->post('fees' , false));     //收费情况
        $params['basis'] = htmlspecialchars($this->input->post('basis' , false));   //设立依据
        $params['details'] = htmlspecialchars($this->input->post('details' , false)); //材料明细
        $params['requirement'] = htmlspecialchars($this->input->post('requirement' , false)); //受理条件
        $params['process'] = htmlspecialchars($this->input->post('process' , false)); //办理流程
        $params['location'] = $input['location'];   //受理地点
        $params['contact'] = $input['contact'];   //联系人
        $params['phone'] = $input['phone'];   //联系电话
        $params['receptiontime'] = $input['receptiontime'];   //接待时间
        $params['complaints'] = $input['complaints'];   //投诉电话
        $params['lat'] = $input['lat'];   //坐标
        $params['long'] = $input['long'];   //坐标
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';
        $params['created_by'] = $this->get_user_id();

        $response = $this->gm->create_guide($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_GUIDE_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_SERVICES_GUIDE_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }
    public function update_guide()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'category_id',
                'name',
                'org_name',
                'project_type',
                'service_object',
                'time_limit',
                'fees',
                'basis',
                'details',
                'requirement',
                'process',
                'location',
                'contact',
                'phone',
                'receptiontime',
                'complaints',
                'lat',
                'long'
            )
        );

        $id = $input['id'];
        $params['category_id'] = $input['category_id']; //项目分类
        $params['name'] = $input['name'];               //项目名称
        $params['org_name'] = $input['org_name'];               //受理机构
        $params['project_type'] = $input['project_type'];       //项目类型
        $params['service_object'] = $input['service_object'];   //服务对象
        $params['time_limit'] = htmlspecialchars($this->input->post('time_limit' , false)); //办理时限
        $params['fees'] = htmlspecialchars($this->input->post('fees' , false));     //收费情况
        $params['basis'] = htmlspecialchars($this->input->post('basis' , false));   //设立依据
        $params['details'] = htmlspecialchars($this->input->post('details' , false)); //材料明细
        $params['requirement'] = htmlspecialchars($this->input->post('requirement' , false)); //受理条件
        $params['process'] = htmlspecialchars($this->input->post('process' , false)); //办理流程
        $params['location'] = $input['location'];   //受理地点
        $params['contact'] = $input['contact'];   //联系人
        $params['phone'] = $input['phone'];   //联系电话
        $params['receptiontime'] = $input['receptiontime'];   //接待时间
        $params['complaints'] = $input['complaints'];   //投诉电话
        $params['lat'] = $input['lat'];   //坐标
        $params['long'] = $input['long'];   //坐标
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '0';

        $response = $this->gm->update_guide($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_GUIDE_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_SERVICES_GUIDE_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }

    public function delete_guide()
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

        $response = $this->gm->delete_guide($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_GUIDE_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_SERVICES_GUIDE_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }


}