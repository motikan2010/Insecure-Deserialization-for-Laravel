<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function indexPage(Request $request) {
        $serializedInfo = $request->input('info');

        // GETパラメータをオブジェクトへでシリアライズ
        $info = unserialize($serializedInfo);

        // 名前・年齢のいずれかが取得できない場合はダミー値を設定
        if( !isset($info->name) || !isset($info->name) ) {
            $info = new \stdClass();
            $info->name = 'Dummy Name';
            $info->age = 999;
        }

        // 「名前 (年齢)」の形式で返す
        return "{$info->name} ({$info->age})";
    }
}
