<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class UploadService 
{
    private $uri = "https://cdn.anvui.vn/";

    public function uploadToCDN($dataUpload) {
        $client = new Client();

        $upload = callApi(function() use ($client, $dataUpload){
            return $client->request('POST',
                    $this->uri . 'index.php?action=upload',
                    [ 'form_params' => $dataUpload]);
        });

        $statusCode = $upload->getStatusCode();
        $body = json_decode($upload->getBody()->getContents(), true);

        if($statusCode >= 200 && $statusCode < 300) {
            return $body;
        }

        return false;
    }

    public function uploadBase64($data) {
        $path = date("Y") . '/' . date('m') . '/' . date('d') . '/' . $data['name'].'.'. $data['ext'];
        if( Storage::disk('public_uploads')->put($path, file_get_contents( 'data:' . $data['type'] . ';base64,'.$data['img'] )) ) {
            return "upload/web/" . $path;
        } 
        return false;
    }


    public function uploadFromFile($data) {
        if( !isset($data['path']) ) {
            $path = date("Y") . '/' . date('m') . '/' . date('d') . '/' . time() . "_" . $data['name'];
        } else {
            $path = $data['path'] . "/"  . time() . "_" . $data['name'];
        }
        
        if( Storage::disk('public_uploads')->put($path, file_get_contents($data['realPath'])) ) {
            return "upload/web/" . $path;
        } 
        return false;
    }
}