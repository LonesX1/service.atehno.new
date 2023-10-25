<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;

class OrderController extends Controller {
    
    public function index(Request $request) {

        // проверка данных
        $order_name = $request->name ?: '';
        $order_mail = $request->mail ?: '';
        $order_phone = $request->phone ?: '';
        $order_product = $request->product ?: '';
        $order_about = $request->about ?: '';

        // проверка фотографий
        if (isset($request->images)) {

            // подготовка картинок
            $this->validate($request, [
                'images.*' => 'mimes:jpeg,png,jpg,svg,mp4,qt|max:20000'
            ]);

            $count = 0;
            $images_links = [];

            // перенос и генерация ссылок
            foreach ($request->images as $image) {

                $count += 1;
                $image_name = time() . $count . '.' . $image->extension();
                $image->move(public_path('images/uploads/test'), $image_name);

                $images_links[] = $image_name;
            };

            $images = '';

            foreach ($images_links as $image) {
                $images = $images . '<tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Картинка:</td><td style="padding: 10px 20px; border-top: 1px solid #dedede"><a href="http://service.atehno.md/images/uploads/test/' . $image . '">' . $image . '</a></td></tr>';
            }
        } else {
            $images = '';
        }

        // подготовка данных
        $task_name = 'Клиент ' . $order_name . ' оформил заявку на сервис';

        $date = Carbon::now()->setTimezone('Europe/Kiev')->format('H:i, d-m-Y');

        $api_server = 'https://api.planfix.ru/xml/';
        $api_key = '899693dec81ded283dda868c1375ed71';
        $api_token = '6c36868f66115f4cd8cb77e8beff8d80';
        
        $requestXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><request method="task.add"><account>basm</account><sid></sid><task><title>' .  $task_name . '</title><description><![CDATA[<table style="width: 100%; padding: 20px; border: 1px solid #DEDEDE"><tr><td style="padding: 10px 20px;">Имя:</td><td style="padding: 10px 20px;">' . $order_name . '</td></tr><tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Почта:</td><td style="padding: 10px 20px; border-top: 1px solid #dedede">' . $order_mail . '</td></tr><tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Телефон:</td><td style="padding: 10px 20px; border-top: 1px solid #dedede">' . $order_phone . '</td></tr><tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Устройство:</td><td style="padding: 10px 20px; border-top: 1px solid #dedede">' . $order_product . '</td></tr><tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Описание проблемы:</td><td style="padding: 10px 20px; border-top: 1px solid #dedede">' . $order_about . '</td></tr>' . $images . '<tr><td style="padding: 10px 20px; border-top: 1px solid #dedede">Дата и время</td><td style="padding: 10px 20px; border-top: 1px solid #dedede">' . $date . '</td></tr></table>]]></description><owner><id>94314</id></owner><importance>AVERAGE</importance><status>ACTIVE</status><project><id>75031</id></project><workers><users><id>53995</id></users></workers></task></request>');

        $ch = curl_init($api_server);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $api_token);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXml->asXML());
        echo $requestXml->asXML();

        $response = curl_exec($ch);
        $error = curl_error($ch);
        var_dump($error);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $responseBody = substr($response, $header_size);

        curl_close($ch);

        header('Location: https://service.atehno.md/');
         return redirect()->back()->with('message', 'Ваше сообщение отправлено!');
        /* return $request->input(); */
         
    }
}
