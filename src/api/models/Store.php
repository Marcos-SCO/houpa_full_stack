<?php

namespace Api\Models;

use Api\Traits\ImgUpload;

class Store extends Model
{

    use ImgUpload;

    public function __construct()
    {
        Self::$table = 'stores';
    }

    public function selectAllStores()
    {
        return $this->selectAll();
    }

    public function selectStore($id)
    {
        // extract($id);
        return $this->customQuery("SELECT id, name, img_path FROM stores WHERE id =:id", ['id' => $id]);
    }

    public function selectStoreProducts($storeId)
    {
        $query = "SELECT 
        p.description, p.id, p.name, p.photo, sp.price 
        FROM products as p
        JOIN store_products as sp ON p.id = sp.store_id
        JOIN stores as st ON sp.store_id = st.id  
        WHERE p.id = :id";

        return $this->customQuery($query, ['id' => $storeId]);
    }
}
