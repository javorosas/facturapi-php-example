<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Facturapi\Facturapi;
use Exception;


class HomeController extends Controller
{
  public function index()
  {
    $facturapi = new Facturapi("[INSERTA TU API KEY AQUÍ]");

    $invoiceData = [
      "customer" => [
        "legal_name" => "Florentino Fernandez",
        "tax_id" => "[INSERTA UN RFC AQUI]",
        "tax_system" => "621",
        "email" => "your@email.com",
        "address" => [
          "zip" => "83240"
        ]
      ],
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

    try {
      $invoice = $facturapi->Invoices->create($invoiceData);
      return view('invoice', ["invoice" => json_encode($invoice)]);
      $facturapi->Invoices->send_by_email($invoice->id);
    } catch (Exception $e) {
      return view('invoice', ["invoice" => json_encode($e)]);
    }
  }
}
