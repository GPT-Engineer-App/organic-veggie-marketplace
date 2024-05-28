<?php
class Product_model extends CI_Model {
    public function get_all_products() {
        $this->db->order_by('likes DESC, comments DESC, sales DESC');
        $query = $this->db->get('products');
        return $query->result();
    }

    public function like_product($product_id) {
        $this->db->set('likes', 'likes+1', FALSE);
        $this->db->where('id', $product_id);
        $this->db->update('products');
    }

    public function comment_product($product_id, $comment) {
        $this->db->set('comments', 'comments+1', FALSE);
        $this->db->where('id', $product_id);
        $this->db->update('products');

        $data = array(
            'product_id' => $product_id,
            'user_id' => 1, // Assuming a logged-in user with ID 1
            'comment' => $comment
        );
        $this->db->insert('comments', $data);
    }

    public function buy_product($product_id, $quantity) {
        $this->db->set('sales', 'sales+'.$quantity, FALSE);
        $this->db->where('id', $product_id);
        $this->db->update('products');

        $data = array(
            'product_id' => $product_id,
            'user_id' => 1, // Assuming a logged-in user with ID 1
            'quantity' => $quantity
        );
        $this->db->insert('sales', $data);
    }
}
?>