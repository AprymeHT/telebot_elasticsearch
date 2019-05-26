<?php

class IndexData{
    /**
     * @param $index
     * @param $type
     * @param $id
     * @param $info
     * @return string
     */
    public function addData($index, $type, $id, $info){

        $client = Elasticsearch\ClientBuilder::create()->build();
        $params['index'] = $index;
        $params['type'] = $type;
        $params['id'] = $id;
        $params['body']['info'] = $info;


        $client->index($params);

        $inData = "Документ успешно добавлен.";
        return $inData;
    }

}