<?php

namespace Anurag\Controllers;

use Config;
use Anurag\Models\Store;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopbaseController extends Controller
{

    protected $key;
    protected $secret;
    protected $redirect;
    protected $scopes;

    public function __construct()
    {
        $config = (object) Config::get('shopbase');
        $this->key = $config->key;
        $this->secret = $config->secret;
        $this->redirect = $config->redirect;
        $this->permission = $config->permission;
    }

    public function Index()
    {
        return view('Shopbase::Index');
    }

    public function Install(Request $request)
    {
        $nonce = base64_decode(rand(1,1000));
        $url = 'https://{storename}.myshopify.com/admin/oauth/authorize?client_id={key}&scope={permission}&redirect_uri={redirect}&state={nonce}';

        $search = ['{storename}','{key}','{permission}','{redirect}','{nonce}'];
        $replace = [$request->storename,$this->key,$this->permission,$this->redirect,$nonce];
        $installUrl = str_replace($search,$replace,$url);

        return redirect($installUrl);
    }

    public function Initialize(Request $request)
    {
        dd($request);
    }

    public function Dashboard()
    {

    }

}
