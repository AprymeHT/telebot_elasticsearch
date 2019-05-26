<?php

class SearchData{
    /**
     * @param $index
     * @param $type
     * @param $info
     * @return string|null
     */
    public function getData($index, $type, $info){

        $client = Elasticsearch\ClientBuilder::create()->build();

        $outData = null;

        if ($type != null && $info != null){
            $params = [
                'index' => $index,
                'type' => $type,
                'body' => [
                    'query' => [
                        'match' => [
                            'info' => $info
                        ]
                    ]
                ]
            ];
            $response = $client->search($params);
        }elseif ($type != null && $info == null){
            $params = [
                'index' => $index,
                'type' => $type
            ];
            $response = $client->search($params);
        }
        else{
            $params = [
                'index' => $index,
                'type' => $type
            ];
            $response = $client->search($params);
        }

        $count = count($response['hits']['hits']);
        for ($i = 0; $i < $count; $i++){
            $id = (string)$i;
            $out[$i] = 'Индекс: ' . $response['hits']['hits'][$id]['_index'] . "\nТип: " . $response['hits']['hits'][$id]['_type'] . "\nID: " . $response['hits']['hits'][$id]['_id'] . "\nИнформация: " . $response['hits']['hits'][$id]['_source']['info'];

            $outData .= $out[$i] . "\n ___________________ \n";
        };

        return $outData;
    }
}