<?php

namespace Api\Traits\DbQuery;

use Api\Models\Model;

trait Create
{
    public function insert(array $data, $alternateModel = null)
    {
        $modelTable = $alternateModel ? $alternateModel : Model::$table;

        try {
            $fields = implode(',', array_keys($data));
            $places = ':' . implode(',:', array_keys($data));

            $query = "INSERT INTO " . $modelTable . " ({$fields}) VALUES ({$places})";

            $this->stmt = Model::$conn->prepare($query);
            foreach ($data as $name => $value) {
                $this->bind(":{$name}", $value);
            }
            $this->stmt->execute();
            $this->stmt->closeCursor();

            return Model::$conn->lastInsertId();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
