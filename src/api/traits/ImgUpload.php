<?php

namespace Api\Traits;

use Api\Models\Model;

trait ImgUpload
{
    /* Img methods Start */

    public function moveUpload($imgFullPath)
    {
        if ($_FILES["thumb"]["tmp_name"] != "") {
            return move_uploaded_file($_FILES['thumb']['tmp_name'], dirname(__DIR__, 2) . $imgFullPath);
        } else {
            return  "Envie uma imagem";
        }
    }

    public function imgCreateHandler()
    {
        if (!isset($_POST['id'])) {
            $tableIdAutoIncrement = $this->customQuery("SELECT AUTO_INCREMENT
         FROM information_schema.TABLES
         WHERE TABLE_SCHEMA = :schema
         AND TABLE_NAME = :table", [
                'schema' => $_ENV['DBNAME'],
                'table' => Model::$table
            ]);
            $id = strval($tableIdAutoIncrement[0]->AUTO_INCREMENT);
        } else {
            $id = $_POST['id'];
        }

        return $this->imgFullPath($id, $_FILES['thumb']['name']);
    }

    public function imgFullPath($id, $imgName)
    {
        // delete the folder
        $this->deleteFolder($id);

        // Cria a pasta da model caso não exista
        $this->createFolder(dirname(__DIR__, 2) . '/public/img/' . Model::$table);

        // Cria pasta do item da model
        $this->createFolder(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id");

        // if (!file_exists(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id")) {
        //     mkdir(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id");
        // }
        $upload_dir = "/public/img/" . Model::$table . "/id_$id/";

        $imgFullPath = $upload_dir . $imgName;

        return $imgFullPath;
    }

    public function createFolder($creationPath)
    {
        return !file_exists($creationPath) ? mkdir($creationPath) : $creationPath;
    }

    public function deleteFolder($id)
    {
        // Delete img with id named folder
        if (file_exists(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id")) {
            array_map('unlink', glob(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_{$id}/*.*"));
            rmdir(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id");
        }
    }

    public function updateImg()
    {
        $data = $this->getPostData();
        extract($data);

        $thumb = $this->imgCreateHandler();
        $this->moveUpload($thumb);

        $updateImg = $this->update([
            "thumb" => $thumb,
        ], ["id_Store" => $id_Store]);

        if ($updateImg) {
            http_response_code(200);
            echo json_encode(
                [
                    "status" => "Imagem do usuário atualizada com sucesso!",
                    "body" => $data
                ]
            );
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Não foi possível atualizar a imagem do usuário"
                ]
            );
        }
    }
}
