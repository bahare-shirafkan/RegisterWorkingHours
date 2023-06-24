<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Services\HourService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class HourController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        try {
            return HourService::index($request->all());
        } catch (Exception $e) {
            throw $e("Something went wrong while getting data from database");
        }
    }

    public function create(Request $request)
    {
        try {
            return HourService::create($request->all());
        } catch (Exception $e) {
            throw $e("Error while creating resource in the database");
        }
    }
   

    public function generate_refresh_token()
    {
        $post = [
            'code' => '1000.52eb4958aa8cfb9a76a64bc5536ac83d.a043a873ea0f458c6d797b4782f25a56',
            'redirect_uri' => 'https://aamer-online.com/',
            'client_id' => '1000.40FRPLUNI0E0N51OVSN65Y6XLM0RJP',
            'client_secret' => '8747a7084cd128955d8819f1a0a04a3cae9841ccbb',
            'grant_type' => 'authorization_code'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.zoho.com/oauth/v2/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/x-www-form-urlencoded'));
        $response = curl_exec($ch);
        // $response=json_encode($response);
        $response = json_decode($response);
        // dd($response->error,is_object($response));
        dd($response, is_object($response));
    }

    public function generate_access_token()
    {
        $post = [
            'refresh_token' => '1000.69ae6e5fad6bb5a5a1b57f1e238ae4cd.fde4922c7df72639502ff2e258c096b9',
            'client_id' => '1000.2CKAUCXKW28F0R9B077NUOVG7IL6VZ',
            'client_secret' => 'ce55aee2b9de1d98626dd523157ca5f3116596402e',
            'grant_type' => 'refresh_token'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.zoho.com/oauth/v2/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/x-www-form-urlencoded'));
        $response = curl_exec($ch);
        // $response=json_encode($response);
        $response = json_decode($response);
        // dd($response->error,is_object($response));
        dd($response->access_token, is_object($response));
    }

    public function insert()
    {
        $access_token = '1000.0b2b6f53ec6aaa23d0a029709fa8934f.a181bebe82333fad503115ba3666c4e4 ';
        $post_data = [
            "data" => [
                [
                    "Company" => "Zylker",
                    "Last_Name" => "Daly",
                    "First_Name" => "Paul",
                    "Email" => "p.daly@zylker.com",
                    "State" => "Texas"
                ],
                // [
                //     "Company" => "Villa Margarita",
                //     "Last_Name" => "Dolan",
                //     "First_Name" => "Brian",
                //     "Email" => "brian@villa.com",
                //     "State" => "Texas"
                // ]
            ],
            "trigger" => [
                "approval",
                "workflow",
                "blueprint"
            ]
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.zohoapis.com/crm/v2/Leads');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Zoho-oauthtoken ' . $access_token,
            'Content-Type:application/x-www-form-urlencoded'
        ));
        // dd($ch);
        $response = curl_exec($ch);
        $response = json_decode($response);
        dd($response, is_object($response));
    }



    public function insert_transaction()
    {
        $access_token = '1000.d48dabda69f7eb3693b4ff4036eb14fa.c052ea3bed9769b904210c68c727b7b0';

        $data = array("amount" => 300, "date" => "2013-11-01", "description" => "description bahare", "from_account_id" => "3818997000000077002", "reference_number" => "545887415", "to_account_id" => "3818997000000000361", "transaction_type" => "deposit");

        $data_string = "JSONString=" . urlencode(json_encode($data));

        $ch = curl_init('https://books.zoho.com/api/v3/banktransactions?organization_id=801958465');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Zoho-oauthtoken ' . $access_token,
            'Content-Type:application/x-www-form-urlencoded'
        ));
       
        $result = curl_exec($ch);        
        $response = json_decode($result);
        return response()->json($response);
    }

    public function get_check_token()
    {
        $post = [
            'token' => '1000.a857958be70655d3a66b2c5e53eef194.e774d568f4ec0f8cce52c1731c78653e',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.zoho.com/oauth/v2/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/x-www-form-urlencoded'));
        $response = curl_exec($ch);
        // $response=json_encode($response);
        $response = json_decode($response);
        // dd($response->error,is_object($response));
        dd($response->access_token, is_object($response));
    }
}
