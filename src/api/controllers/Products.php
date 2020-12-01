<?php

namespace Api\Controllers;

use Api\Models\Product;

class Products extends Product
{
    public function index()
    {
        $products = $this->selectAllProductsInfo();

        if ($products) {
            http_response_code(200);

            foreach ($products as $product) {
                extract((array)$product);

                // Seleciona grids
                $productSizes = $this->selectProductGrid($id);

                echo json_encode([
                    "description" => $description,
                    "grids" => $productSizes,
                    "id" => $id,
                    "name" => $name,
                    "photo" => dirname($_ENV['BASE'], 1) . $photo,
                    "price" => $price,
                    "store" => $store
                ], JSON_UNESCAPED_SLASHES);
            }
        }
    }

    public function getProduct($id)
    {
        extract($id);
        http_response_code(200);

        $product = $this->selectProductInfo($id);

        if ($product) {
            extract((array)$product[0]);
            // Seleciona grids
            $grids = $this->selectProductGrid($id);

            echo json_encode(
                [
                    "description" => $description,
                    "grids" => $grids,
                    "id" => $id,
                    "name" => $name,
                    "photo" => dirname($_ENV['BASE'], 1) . $photo,
                    "price" => $price,
                    "store" => $store
                ]
            );
        } else {
            http_response_code(404);

            echo json_encode(
                [
                    "status" => "Produto não encontrado"
                ]
            );
        }
    }

    public function createProduct()
    {
        $data = $this->getPostData();
        extract($data);

        if ($name != "" && $_FILES['img_path']['name'] != "") {

            $img_path = $this->imgCreateHandler();

            $this->moveUpload($img_path);

            // Verifica se loja existe
            $this->haveRegister("stores", ["id" => $store_id]);
            // Verifica se tamanho existe
            $this->haveRegister("sizes", ["sizeId" => $sizeId]);
            // Verifica se a loja já tem o produto
            $this->verifyIfProductExists($name, $store_id);

            // Insere o produto
            $lastProductId = $this->insert([
                "name" => $name,
                "description" => $description,
                "photo" => $img_path,
                "store_id" => $store_id
            ]);

            if ($lastProductId) {
                // Insere o preço, id e e loja em store_products
                $this->insert([
                    "id_product" => $lastProductId,
                    "price" => $price,
                    "store_id" => $store_id
                ], "store_products");

                // Insere id do produto, tamanho e quantidade
                $this->insert([
                    "productId" => $lastProductId,
                    "quantity" => $quantity,
                    "sizeId" => $sizeId
                ], "product_size");
            }

            http_response_code(201);
            echo json_encode(
                [
                    "status" => "Produto criado com sucesso!",
                    $data
                ]
            );
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Erro: Nome e imagem não podem ser vazios!",
                ]
            );
        }
    }

    public function updateProduct()
    {
        $data = $this->getPostData();

        extract($data);

        $img_path = $this->imgCreateHandler();
        $this->moveUpload($img_path);

        // Verifica se loja existe
        $this->haveRegister("stores", ["id" => $store_id]);
        // Verifica se tamanho existe
        $this->haveRegister("sizes", ["sizeId" => $sizeId]);
        // Verifica se a loja já tem o produto
        $this->verifyIfProductExists($name, $store_id);

        $updateProduct = $this->update([
            "name" => $name,
            "description" => $description,
            "photo" => $img_path,
            "store_id" => $store_id
        ], ["id" => $id]);

        // atualiza o preço, id e e loja em store_products
        $this->update([
            "price" => $price,
            "store_id" => $store_id
        ], ["id_product" => $id], "store_products");

        // atualiza id do produto, tamanho e quantidade
        $this->update([
            "quantity" => $quantity,
            "sizeId" => $sizeId
        ], ["productId" => $id], "product_size");


        http_response_code(200);
        echo json_encode(
            [
                "status" => "Atualizado com sucesso!",
                "body" => $data
            ]
        );
    }

    public function deleteProduct()
    {
        $data = $this->getContents();
        extract($data);

        $id = $this->customQuery("SELECT id FROM products WHERE id = :id", ["id" => $id]);

        if (isset($id[0]) && $this->delete(["id" => $id[0]->id])) {

            $this->deleteFolder($id[0]->id);

            http_response_code(200);

            echo json_encode(
                [
                    "status" => "Produto deletado com sucesso!",
                    "response" => $data
                ]
            );
        } else {
            http_response_code(404);
            echo json_encode(
                [
                    "status" => "Erro: loja não foi deletado"
                ]
            );
        }
    }
}
