<?php

namespace Anurag\Controllers;

use Config;
use Session;
use Anurag\Models\Store;
use Illuminate\Http\Request;
use Unirest\Request as Unirest;
use App\Http\Controllers\Controller;

class ShopbaseController extends Controller
{

    protected $key;
    protected $secret;
    protected $redirect;
    protected $scopes;

    public function __construct()
    {
        $this->middleware('web');

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
        $data = array(
            'client_id' => $this->key,
            'client_secret' => $this->secret,
            'code' => $request->code
            );

        $response = $this->APIRequest('post','admin/oauth/access_token',$data,'install');

        Session::put('storename',$request->shop);
        Session::put('accessToken',$response->body->access_token);

        $store = Store::where('storename',$request->shop)->count();
        if($store == 0){
            $store = new Store;
            $store->storename = $request->shop;
            $store->accessToken = $response->body->access_token;
            $store->save();
        }

        return redirect('/shopbase/dashboard');
    }

    public function FetchDetails(Request $request)
    {
        $store = Store::where('storename',$request->shop)->first();

        Session::put('storename',$store->storename);
        Session::put('accessToken',$store->accessToken);

        return redirect('/shopbase/dashboard');
    }

    public function Dashboard(Request $request)
    {

        $storename = Session::get('storename');
        $response = $this->APIRequest('get','admin/orders.json');
        dd($response);
    }

    public function APIRequest($requestType,$requestUrl,$requestData='',$requestHeader='')
    {
        $requestUrl = $this->GenerateUrl($requestUrl);
        $requestHeader = $header = $this->HeaderSelector($requestHeader);
        $requestOptions = Unirest::verifyPeer(false);

        if($requestType == 'get'){
            $response = Unirest::get($requestUrl,$requestHeader,$requestData);
        } elseif($requestType == 'post'){
            $response = Unirest::post($requestUrl,$requestHeader,$requestData);
        } elseif($requestType == 'put'){
            $response = Unirest::put($requestUrl,$requestHeader,$requestData);
        } elseif($requestType == 'delete'){
            $response = Unirest::delete($requestUrl,$requestHeader,$requestData);
        }

        return $response->body;
    }

    public function HeaderSelector($criteria)
    {
        if($criteria == 'install'){
            return array(
                'Accept' => 'application/json'
            );
        } else {
            return array(
                'Accept' => 'application/json',
                'X-Shopify-Access-Token' => Session::get('accessToken')
            );
        }
    }

    public function GenerateUrl($endpoint)
    {
        $url = 'https://'.Session::get('storename').'/'.$endpoint;
        return $url;
    }

}
