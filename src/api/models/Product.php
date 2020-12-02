<?php

namespace Api\Models;

use Api\Traits\ImgUpload;

class Product extends Model
{

    use ImgUpload;

    public function __construct()
    {
        Self::$table = 'products';
    }

    public function selectProductGrid($productId)
    {
        $query = "SELECT 
        DISTINCT ps.quantity, ps.sizeId, (SELECT sizeName FROM sizes as s WHERE s.sizeId = ps.sizeId) as sizeName  
        FROM product_size as ps 
        WHERE ps.productId = :productId ORDER BY sizeName DESC";

        return $this->customQuery($query, ['productId' => $productId]);
    }


    public function selectAllProductsInfo()
    {
        // extract($id);
        $query = "SELECT 
        p.id, p.name,p.photo, p.description, sps.store_id, sts.name as store, sps.price 
        FROM store_products as sps 
        LEFT JOIN products as p ON p.id = sps.id_product
        LEFT JOIN stores as sts ON sts.id = sps.store_id
        ORDER BY sps.store_id";

        return $this->customQuery($query);
    }

    public function selectProductInfo($id)
    {
        // extract($id);
        $query = "SELECT 
        p.id, p.name,p.photo, p.description, sps.store_id, sts.name as store, sps.price 
        FROM store_products as sps 
        LEFT JOIN products as p ON p.id = sps.id_product
        LEFT JOIN stores as sts ON sts.id = sps.store_id
        WHERE p.id = :id
        ORDER BY sps.store_id";

        return $this->customQuery($query, ['id' => $id]);
    }

    // Verifica se loja tem um produto com o mesmo nome
    public function verifyIfProductExists($name, $store_id)
    {
        $verify = $this->customQuery("SELECT * FROM products WHERE name = :name AND store_id = :store_id", ["name" => $name, "store_id" => $store_id], null);

        if ($verify) {
            var_dump("ola");
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Erro: Produto já existe na tabela",
                ]
            );

            exit;
        }
    }

    public function haveRegister($table, array $id)
    {
        // Pega a key e value do id
        $key = array_keys($id)[0];
        $value = array_values($id)[0];

        // Busca o registro
        $haveRegister = $this->customQuery("SELECT * FROM $table WHERE {$key} = :{$key}", [$key => $value]);

        // Verifica registro, retorna erro caso contrário e para execução
        if (!$haveRegister) {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Erro: registro com {$key} {$value} da tabela {$table} não existe.",
                ]
            );
            exit;
        }


        return true;
    }
}
