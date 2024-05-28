<?php
class Products extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('products/index', $data);
    }

    public function like($product_id) {
        $this->Product_model->like_product($product_id);
        redirect('products');
    }

    public function comment($product_id) {
        $comment = $this->input->post('comment');
        $this->Product_model->comment_product($product_id, $comment);
        redirect('products');
    }

    public function buy($product_id) {
        $quantity = $this->input->post('quantity');
        $this->Product_model->buy_product($product_id, $quantity);
        redirect('products');
    }
}
?>