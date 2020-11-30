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
        return $this->customQuery("SELECT id, name, thumb FROM stores WHERE id =:id", ['id' => $id]);
    }
}
