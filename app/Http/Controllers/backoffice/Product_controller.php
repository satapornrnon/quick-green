<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product_controller extends Controller
{
    public function index()
    {
        return view('backoffice.product.index');
    }

    public function get_data()
    {
        $data = array();

        $columns = array( 
            0 => 'id',
            1 => 'id',
            2 => 'category_code',
            3 => 'product_code',
            4 => 'product_name_th',
            5 => 'product_name_en',
            6 => 'product_status',
            7 => 'product_image',
        );
        
        $where = "";
        if($this->input->post('search')['value'] != "") { 
            foreach ($columns as $key => $column) {
                $ci = ($key == 0) ? ' AND ( ' : 'OR ';
                $where .= $ci . $columns[$key] ." LIKE '%". $this->input->post('search')['value'] ."%' ";
            }
            $where .= ")";
        }
    
        $count_result = $this->product_model->get_product("SELECT count(*) AS num_rows FROM tbl_product WHERE deleted = 0 $where");

        $sql = "SELECT p.*,c.category_code FROM tbl_product p LEFT JOIN tbl_category c ON (p.category_id = c.id) WHERE p.deleted = 0 $where ORDER BY ". $columns[$this->input->post('order')[0]['column']] ." ". $this->input->post('order')[0]['dir'] ." LIMIT ". $this->input->post('start') .",". $this->input->post('length') ." ";
        $result = $this->product_model->get_product($sql);
        if($result){
            foreach ($result as $key => $value) {
                if($value['product_status'] == 'on'){
                    $product_status = "<span class='badge badge-success'>เปิด</span>";
                } else if($value['product_status'] == 'off'){
                    $product_status = "<span class='badge badge-danger'>ปิด</span>";
                }

                // if($value['product_image']){
                //     $value['product_image'] = '<img class="img-thumbnail" src="'. base_url(get_setting('product_path') . $value['product_image']) .'" alt="Preview image" width="75">';
                // } else {
                //     $value['product_image'] = '';
                // }

                // if($value['product_banner']){
                //     $value['product_banner'] = '<img class="img-thumbnail" src="'. base_url(get_setting('cover_path') . $value['product_banner']) .'" alt="Preview image" width="100">';
                // } else {
                //     $value['product_banner'] = '';
                // }

                // if($value['product_banner_mobile']){
                //     $value['product_banner_mobile'] = '<img class="img-thumbnail" src="'. base_url(get_setting('cover_path') . $value['product_banner_mobile']) .'" alt="Preview image" width="100">';
                // } else {
                //     $value['product_banner_mobile'] = '';
                // }

                $modal_edit = '';
                $modal_edit .= '<button type="button" class="btn btn-sm btn-outline-info mx-1 edit_modal" data-post-id="'. $value['id'] .'" title="แก้ไขผลิตภัณฑ์" data-title="แก้ไขผลิตภัณฑ์"><i class="far fa-edit"></i></button>';
                $modal_edit .= '<button type="button" class="btn btn-sm btn-outline-danger mx-1 cancel_modal" data-post-id="'. $value['id'] .'" title="ลบ"><i class="far fa-trash-alt"></i></button>';

                $data[] = array(
                    $modal_edit,
                    '',
                    $value['category_code'],
                    $value['product_code'],
                    $value['product_name_th'],
                    $value['product_name_en'],
                    $product_status,
                    $value['product_image'],
                    $value['product_banner'],
                    $value['product_banner_mobile'],
                );       
            }
        }
    
        $responseData = array(
            "draw"            => intval( $this->input->post('draw') ), 
            "recordsTotal"    => intval( $count_result[0]['num_rows'] ), 
            "recordsFiltered" => intval( $count_result[0]['num_rows'] ),
            "data"            => $data 
        );
    
        echo json_encode($responseData);
    }
}
