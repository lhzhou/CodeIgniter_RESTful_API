<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 19/12/15
 * Time: 下午9:07
 */
class News extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model' , 'nm');
    }

    public function get_category()
    {

        $params['id'] = $this->input->post('id');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->nm->get_category($params);
        $total = $this->nm->get_category($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_NEWS_CATEGORY_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_NEWS_CATEGORY_FAILURE
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

        $response = $this->nm->create_category($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_NEWS_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_NEWS_CATEGORY_FAILURE
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
        $response = $this->nm->update_category($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_CATEGORY_FAILURE
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


        $response = $this->nm->delete_category($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_NEWS_CATEGORY_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_NEWS_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }

    public function get_special()
    {

        $params['id'] = $this->input->post('id');
        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->nm->get_special($params);
        $total = $this->nm->get_special($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_NEWS_SPECIAL_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_NEWS_SPECIAL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }

    public function create_special()
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

        $response = $this->nm->create_special($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_NEWS_SPECIAL_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_NEWS_SPECIAL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }
    public function update_special()
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
        $response = $this->nm->update_special($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_SPECIAL_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_SPECIAL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }


    }

    public function delete_special()
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


        $response = $this->nm->delete_special($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_SPECIAL_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_SPECIAL_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }


    public function get_news()
    {

        $params['id'] = $this->input->post('id');
        $params['category_id'] = $this->input->post('category');
        $params['special_id'] = $this->input->post('special');

        $params['page'] = $this->get_page();
        $params['limit'] = $this->get_limit();

        $response = $this->nm->get_news($params);
        $total = $this->nm->get_news($params , true);

        if($response){
            $this->response(
                array(
                    RESULTS => $response,
                    PAGE => $this->get_page(),
                    LIMIT => $this->get_limit(),
                    TOTAL => $total,
                    MESSAGE => Status_Code::GET_NEWS_CATEGORY_SUCCESS,

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::GET_NEWS_CATEGORY_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }

    public function create_news()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'title',
                'content',
                'category'
            )
        );

        $params['title'] = $input['title'];
        $params['category_id'] = $input['category'];
        $params['content'] = htmlspecialchars($this->input->post('content' , false));
        $params['special_id'] = isset($input['special'])? $input['special'] : '';
        $params['icon'] = isset($input['icon'])? $input['icon'] : '';
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '';

        $params['created_by'] = $this->get_user_id();

        $response = $this->nm->create_news($params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_NEWS_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::CREATE_NEWS_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }

    }
    public function update_news()
    {
        $input = $this->input->post();
        $this->is_required(
            'POST' ,
            array(
                'id',
                'title',
                'content',
                'category'
            )
        );
        $id = $input['id'];
        $params['title'] = $input['title'];
        $params['category_id'] = $input['category'];
        $params['content'] = htmlspecialchars($this->input->post('content' , false));
        $params['special_id'] = isset($input['special'])? $input['special'] : '';
        $params['icon'] = isset($input['icon'])? $input['icon'] : '';
        $params['sort'] = isset($input['sort'])?  $input['sort'] : '';

        $params['updated_by'] = $this->get_user_id();
        $params['updated_at'] = $this->get_date();
        $response = $this->nm->update_news($id,$params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::UPDATE_NEWS_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }


    }

    public function delete_news()
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


        $response = $this->nm->delete_news($id , $params);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_NEWS_SUCCESS
                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::DELETE_NEWS_FAILURE
                ),
                HEADER_NOT_FOUND
            );
        }
    }


}