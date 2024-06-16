<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use SoapClient;

use SimpleXMLElement;

class SoapAPIController extends Controller
{

  public function testAPI(Request $req)
  {
    try {
      $patternForLocationCode = '/\[(.*?)\]/';
      $origin = $req->input('leavingFrom');
      $Destination = $req->input('goingTo');

      preg_match($patternForLocationCode, $origin, $matches);
      $OriginCode = $matches[1];
      //dd($OriginCode);
      preg_match($patternForLocationCode, $Destination, $matches);
      $DestinationCode = $matches[1];

      $isReturn = $req->input('tripType');
      $FromDate = $req->input('depart');
      $ToDate = $req->input('return');
      $Class = $req->input('directFlights');
      $Airlines = $req->input('airlinesList') == null ? '' : $req->input('airlinesList');
      $Adults = $req->input('adult') == 0 ? 1 : $req->input('adult');
      $Youths = $req->input('youth');
      $Childs = $req->input('child');
      $Infants = $req->input('infant');

      $CompanyCode = 'BS8186';
      $hap = 'BS8186_HAP546_Live';
      $_hapType = 'Live';
      $UserID = 'BS8186L';
      $Password = 'FARES09';
      //$sessionId =  $_COOKIE["laravel_session"];
      $sessionId =  '';

      $client = new Client();
      $headers = [
        'Content-Type' => 'text/xml; charset=utf-8',
        'X-CSRF-TOKEN' => csrf_token()
      ];

      $body = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Body>
    <SearchFlight xmlns="http://tempuri.org/">
      <_hap>' . $hap . '</_hap>
      <_hapType>' . $_hapType . '</_hapType>
      <UserID>' . $UserID . '</UserID>
      <Password>' . $Password . '</Password>
      <Origin>' . $OriginCode . '</Origin>
      <Destination>' . $DestinationCode . '</Destination>
      <FromDate>' . $FromDate . '</FromDate>
      <ToDate>' . $ToDate . '</ToDate>
      <Class>' . $Class . '</Class>
      <Airlines>' . $Airlines . '</Airlines>
      <Adults>' . $Adults . '</Adults>
      <Childs>' . $Childs . '</Childs>
      <Infants>' . $Infants . '</Infants>
      <isReturn>' . $isReturn . '</isReturn>
      <CompanyCode>' . $CompanyCode . '</CompanyCode>
      <sessionId>' . $sessionId . '</sessionId>
    </SearchFlight>
  </soap12:Body>
</soap12:Envelope>';

      try {
        $response = $client->post('http://www.btres.com/WL/LiveWLSrv/FlightServices.asmx?wsdl', [
          'headers' => $headers,
          'body' => $body,
        ]);

        // You can handle the response here
        $result = $response->getBody()->getContents();
        $result = preg_replace('/<\?xml.*\?>/', '', $result);


        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $searchFlightResult = $dom->getElementsByTagName('SearchFlightResult')->item(0)->nodeValue;
        //dd($searchFlightResult);

        return view('Front.FlightResult', compact('searchFlightResult'));
      } catch (\Exception $e) {

        dd('error while fetching the data from api, and the error is : ' . $e);
      }
    } catch (Exception $ex) {
      return response()->json([' error calling API ' . $ex => []]);
    }
  }

  // Get Completion List
  public function getCompletionList(Request $req)
  {
    $htmlContent = "";

    try {
      $prefixText = $req->input('prefixText');

      $soapClient = new SoapClient('http://www.btres.com/WL/LiveWLSrv/FlightServices.asmx?wsdl');
      $param = array('prefixText' => $prefixText);

      $response = $soapClient->GetCompletionList($param);
      $arrayData = (array)$response->GetCompletionListResult->string;

      if (isset($arrayData)) {

        foreach ($arrayData as $value) {
          $htmlContent .= "<div>" .  htmlspecialchars($value) . "<input type='hidden' value='" .  htmlspecialchars($value) . "'></div>";
        }

        return ($htmlContent);
      }
    } catch (Exception $ex) {
      //echo $ex->getMessage();
      return ($htmlContent);
    }
  }

  public function getAirlinesList()
  {
    $optionsHtml = "";
    try {

      $soapClient = new SoapClient('http://www.btres.com/WL/LiveWLSrv/FlightServices.asmx?wsdl');
      $response = $soapClient->GetAllAirlines();

      $xmlString = $response->GetAllAirlinesResult->any;
      $xml = simplexml_load_string($xmlString);
      $airlines = [];

      if ($xml->NewDataSet->Table1) {
        foreach ($xml->NewDataSet->Table1 as $airline) {
          $airlineName = (string) $airline->AirlineName;
          $airlineCode = (string) $airline->AirlineCode;

          $airlines[] = [
            'name' => $airlineName,
            'code' => $airlineCode,
          ];
        }
      }

      // Return options as JSON response
      return response()->json(['airlines' => $airlines]);
    } catch (Exception $ex) {
      return response()->json(['airlines error' . $ex => []]);
    }
  }

  public function searchFlight(Request $req)
  {
    try {

      $validateData = $req->validate([
        'leavingFrom' => 'required|string',
        'goingTo' => 'required|string',
        'airlinesClass' => 'required|not_in:0'
      ]);


      if ($validateData) {
        $patternForLocationCode = '/\[(.*?)\]/';
        $origin = $req->input('leavingFrom');
        $Destination = $req->input('goingTo');

        preg_match($patternForLocationCode, $origin, $matches);
        $OriginCode = $matches[1];
        //dd($OriginCode);
        preg_match($patternForLocationCode, $Destination, $matches);
        $DestinationCode = $matches[1];

        $isReturn = $req->input('tripType');
        $FromDate = $req->input('depart');
        $ToDate = $req->input('return');
        $Class = $req->input('airlinesClass');
        $Airlines = $req->input('airlinesList') == null ? '' : $req->input('airlinesList');
        $Adults = $req->input('adult') == 0 ? 1 : $req->input('adult');
        $Youths = $req->input('youth');
        $Childs = $req->input('child');
        $Infants = $req->input('infant');

        $CompanyCode = 'BS8186';
        $hap = 'BS8186_HAP546_Live';
        $_hapType = 'Live';
        $UserID = 'BS8186L';
        $Password = 'FARES09';
        //$sessionId =  $_COOKIE["laravel_session"];
        $sessionId =  '';

        $client = new Client();
        $headers = [
          'Content-Type' => 'text/xml; charset=utf-8',
          'X-CSRF-TOKEN' => csrf_token()
        ];

        $body = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Body>
    <SearchFlight xmlns="http://tempuri.org/">
      <_hap>' . $hap . '</_hap>
      <_hapType>' . $_hapType . '</_hapType>
      <UserID>' . $UserID . '</UserID>
      <Password>' . $Password . '</Password>
      <Origin>' . $OriginCode . '</Origin>
      <Destination>' . $DestinationCode . '</Destination>
      <FromDate>' . $FromDate . '</FromDate>
      <ToDate>' . $ToDate . '</ToDate>
      <Class>' . $Class . '</Class>
      <Airlines>' . $Airlines . '</Airlines>
      <Adults>' . $Adults . '</Adults>
      <Childs>' . $Childs . '</Childs>
      <Infants>' . $Infants . '</Infants>
      <isReturn>' . $isReturn . '</isReturn>
      <CompanyCode>' . $CompanyCode . '</CompanyCode>
      <sessionId>' . $sessionId . '</sessionId>
    </SearchFlight>
  </soap12:Body>
</soap12:Envelope>';



        try {
          $response = $client->post('http://www.btres.com/WL/LiveWLSrv/FlightServices.asmx?wsdl', [
            'headers' => $headers,
            'body' => $body,
          ]);

          // You can handle the response here
          $result = $response->getBody()->getContents();
          $result = preg_replace('/<\?xml.*\?>/', '', $result);

          $dom = new \DOMDocument();
          $dom->loadXML($result);
          $searchFlightResult = $dom->getElementsByTagName('SearchFlightResult')->item(0)->nodeValue;

          return view('Front.FlightResult', compact('searchFlightResult'));

        } catch (\Exception $e) {

          //dd('error while fetching the data from api, and the error is : ' . $e);
          return redirect()->back()->withErrors(['error' => 'Error while fetching the data from api']);
        }
      }
    } catch (Exception $ex) {
    }

    return redirect()->back()->withErrors(['error' => 'Please fill all mandatory fields!']);
  }


}
