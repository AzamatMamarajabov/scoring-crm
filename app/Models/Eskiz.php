<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskiz extends Model
{
    use HasFactory;

    public function send($message, $phone){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'notify.eskiz.uz/api/auth/login',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('email' => '','password' => ''),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($code != 200){
            return 'error';
        }

        $data = json_decode($response);
        $token = $data->data->token;

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'notify.eskiz.uz/api/message/sms/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'email' => '',
                'password' => '',
                'mobile_phone' => str_replace('+', '', $phone),
                'message' => $message,
                'from' => '4546'
            ],
             CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $token . ''],
        ));
        curl_exec($ch);
        curl_close($ch);
        $code2 = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($code2 != 200){
            return 'error';
        }
        return 'success';
    }
}
