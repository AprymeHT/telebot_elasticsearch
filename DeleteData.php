<?php


class DeleteData{
    /**
     * @param $index
     * @param $type
     * @param $id
     * @return string
     */
    public function delData($index, $type, $id){

        $params = [
            'index' => $index,
            'type' => $type,
            'id' => $id
        ];

        $client = Elasticsearch\ClientBuilder::create()->build();

        $client->delete($params);

        $delData = "Документ успешно удалён.";

        return $delData;
    }
}