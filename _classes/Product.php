 <?php

class ProductCRUD {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addProduct($productName, $productDescription) {
        $query = "INSERT INTO product (productName, productDescription) VALUES ('$productName', '$productDescription')";
        return $this->db->query($query);
    }
    

    public function getAllProducts() {
        $query = "SELECT * FROM product";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($productId) {
        $query = "SELECT * FROM product WHERE productID = $productId";
        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }


}

?>



    