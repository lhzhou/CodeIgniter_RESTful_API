<?php

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 20/12/15
 * Time: 下午2:04
 */
use GuzzleHttp\Client;
class Bus extends Base_Controller
{

    public function tt()
    {

        $client = new GuzzleHttp\Client();
        $params['city'] = '漯河';
        $params['station'] = '五一路';
        $headers['apikey'] = 'ce8c8279c68ec7df8848fc18a5824c18';
        $url = 'http://localhost/lhsmao_app/lhsmao_api/services/bus/error';

        try {
            $res = $client->request('GET', $url);
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            $message = strrchr($e->getMessage() , '{"status_code":' ) ;
            $this->output->set_header('Content-Type: '.$this->output_formats['json'].'; charset=utf-8');
            if(empty($message)){
                $this->output->set_output(
                    json_encode(
                        array(
                            MESSAGE => $e->getMessage()
                        )
                    )
                );
                return;
            }else{

                $this->output->set_output($message);
                return;
            }
            return;
        }
        return $res->getBody(true);
    }

    public function re($getCode, $getMessage)
    {
        var_dump($getCode,$getMessage);
    }

    public function error()
    {

        $out['input'] = $this->input->post('city');
        $out['header'] = $this->input->get_request_header('apikey');
        $this->response(
            array(
                MESSAGE => Status_Code::GET_SERVICES_BUS_FAILURE,
                RESULTS => $out
            ),
            400
        );
    }

    public function search()
    {
//        http://apis.baidu.com/apistore/bustransport/busstations?city=漯河&station=五一路
        $params['city'] ='漯河';
        $params['station'] ='五一路';
//        echo http_build_query($params);
//        die;

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://apis.baidu.com/apistore/bustransport/busstations?', [
            'headers'        => ['apikey' => 'ce8c8279c68ec7df8848fc18a5824c18'],
            'query'           => $params

        ]);
        if($res->getStatusCode() == 200){
            $output =  $res->getBody();
            $response =  json_decode($output);

//            var_dump($response);die;
            if($response->errNum == 0){
                $bus_data = $this->xml_to_array($response->retData->result);
;
                $this->response(
                    array(
                        MESSAGE => Status_Code::GET_SERVICES_BUS_SUCCESS,
                        RESULTS => $bus_data->stats
                    )
                );
            }else{
                $this->response(
                    array(
                        MESSAGE => Status_Code::GET_SERVICES_BUS_FAILURE
                    ),
                    HEADER_NOT_FOUND
                );
            }

        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::HEADER_INTERNAL_SERVER_ERROR
                ),
                HEADER_INTERNAL_SERVER_ERROR
            );
        }

    }
}