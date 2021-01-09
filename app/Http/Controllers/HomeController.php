<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Facturapi\Facturapi;


class HomeController extends Controller
{
  public function index()
  {
    $facturapi = new Facturapi("TU_API_KEY");

    $receiptData = [
      "folio_number" => 1234,
      "payment_form" => "03",
      "items" => [
        [
          "product" => [
            "description" => "Ukelele",
            "product_key" => "60131324",
            "price" => 345.60,
            "sku" => "ABC1234"
          ]
        ]
      ]
    ];

    $receipt = $facturapi->Receipts->create($receiptData);
    return view('receipt', ["receipt" => $receipt]);
  }
}
