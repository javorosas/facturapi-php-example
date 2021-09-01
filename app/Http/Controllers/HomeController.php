<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Facturapi\Facturapi;


class HomeController extends Controller
{
  public function index()
  {
    $facturapi = new Facturapi("[INSERTA TU API KEY AQUÍ]");

    $invoiceData = [
      "customer" => [
        "legal_name" => "Florentino Fernandez",
        "tax_id" => "[INSERTA UN RFC AQUI]",
        "email" => "your@email.com"
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

    $invoice = $facturapi->Invoices->create($invoiceData);
    $facturapi->Invoices->send_by_email($invoice->id);
    return view('invoice', ["invoice" => json_encode($invoice)]);
  }
}
