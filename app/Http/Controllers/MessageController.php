<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class MessageController extends Controller
{
    public function sendWorkerSalaryInfo($worker_id){
        $worker = Worker::find($worker_id);
        $currentDate = date('d.m.Y');
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
          CURLOPT_POSTFIELDS => array('email' => 'elde.info@mail.ru','password' => 'Xpf2ar2KjXudiGFHNQFANeGPnkAa6qJWBbPepGYm'),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($code != 200){
            return redirect()->back()->with('error', 'Eskiz.uz ga ulanishda xatolik mavjud!');
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
                'email' => 'elde.info@mail.ru',
                'password' => 'Xpf2ar2KjXudiGFHNQFANeGPnkAa6qJWBbPepGYm',
                'mobile_phone' => str_replace('+', '', $worker->phone),
                'message' => 'Elde uz hodimi ' . $worker->name . 'ning ' . $currentDate  . ' bo\'yicha oylik maoshi ' . number_format($worker->salary)  . 'so\'m hisoblandi.',
                'from' => '4546'
            ],
             CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $token . ''],
        ));
        curl_exec($ch);
        curl_close($ch);
        $code2 = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($code2 != 200){
            return redirect()->back()->with('error', 'Xabar yuborilmadi!');
        }

        return redirect()->back()->with('success', 'Xabar yuborildi!');
        return redirect()->back()->with('success', 'Xabar yuborildi!');
    }
}
