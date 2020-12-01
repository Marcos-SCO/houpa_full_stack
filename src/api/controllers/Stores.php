<?php

namespace Api\Controllers;

use Api\Models\Store;

class Stores extends Store
{
    public function index()
    {
        $stores = $this->selectAll();
        if ($stores) {
            http_response_code(200);
            foreach ($stores as $store) {
                extract((array)$store);

                $products = $this->selectStoreProducts($id);

                echo json_encode([
                    "id" => $id,
                    "name" => $name,
                    "products" => $products,
                    "thumb" => dirname($_ENV['BASE'], 1) . $img_path
                ], JSON_UNESCAPED_SLASHES);
            }
        }
    }

    public function createStore()
    {
        $data = $this->getPostData();
        extract($data);

        // Find email in db
        $findStore = $this->selectBy("name", $name);

        if (!$findStore) {
            if ($name != "" && $_FILES['img_path']['name'] != "") {
                $img_path = $this->imgCreateHandler();

                $this->moveUpload($img_path);

                $this->insert([
                    "name" => $name,
                    "img_path" => $img_path
                ]);

                http_response_code(201);
                echo json_encode(
                    [
                        "status" => "Loja criada com sucesso!",
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
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Erro: Loja já existe no DB",
                ]
            );
        }
    }

    public function updateStore()
    {
        $data = $this->getPostData();

        extract($data);

        $img_path = $this->imgCreateHandler();
        $this->moveUpload($img_path);

        $updateStore = $this->update([
            "name" => $name,
            "thumb" => $img_path,
        ], ["id" => $id]);

        if ($updateStore) {

            http_response_code(200);
            echo json_encode(
                [
                    "status" => "Atualizado com sucesso!",
                    "body" => $data
                ]
            );
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Não foi possível atualizar"
                ]
            );
        }
    }

    public function getStore($id)
    {
        extract($id);
        http_response_code(200);

        $store = $this->selectStore($id);

        if ($store) {
            extract((array)$store[0]);
            echo json_encode(
                [
                    "id" => $id,
                    "name" => $name,
                    "thumb" => dirname($_ENV['BASE'], 1) . $img_path
                ]
            );
        } else {
            http_response_code(404);

            echo json_encode(
                [
                    "status" => "Loja não encontrada"
                ]
            );
        }
    }

    public function deleteStore()
    {
        $data = $this->getContents();
        extract($data);

        $id = $this->customQuery("SELECT id FROM stores WHERE id = :id", ["id" => $id]);

        if (isset($id[0]) && $this->delete(["id" => $id[0]->id])) {

            $this->deleteFolder($id[0]->id);

            http_response_code(200);

            echo json_encode(
                [
                    "status" => "Loja deletada com sucesso!",
                    "response" => $data
                ]
            );
        } else {
            http_response_code(404);
            echo json_encode(
                [
                    "status" => "Erro: loja não foi deletada"
                ]
            );
        }
    }
}
