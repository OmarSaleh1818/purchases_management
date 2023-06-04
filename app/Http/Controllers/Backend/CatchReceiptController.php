<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentOrder;
use App\Models\ReceiptOrder;
use App\Models\ReceiptCommand;
use Illuminate\Support\Facades\DB;

class CatchReceiptController extends Controller
{

    public function ReceiptOrder() {

        $receipt = ReceiptOrder::orderBy('id', 'DESC')->get();
        $payments = Payment::orderBy('id', 'DESC')->get();
        return view('receipt.receipt_order', compact('payments', 'receipt'));
    }

    public function ReceiptAdd($id) {

        $payment = Payment::find($id);
        return view('receipt.add_receipt', compact('payment'));
    }

    public function ReceiptStore(Request $request) {

        $payments_id = $request->id;

        $request->validate([
            'date' => 'required',
            'number_receipt' => 'required',
            'benefit' => 'required',
            'currency_type' => 'required',
            'just' => 'required',
            'bank_name' => 'required',
            'check_number' => 'required',
            'iban_number' => 'required',

        ],[
            'date.required' => 'التاريخ مطلوب',
            'number_receipt.required' => 'الرقم  مطلوب',
            'benefit.required' => 'المستفيد مطلوب',
            'currency_type.required' => 'نوع العملة مطلوب',
            'just.required' => 'فقط مطلوب',
            'bank_name.required' => 'البنك المسحوب عليه مطلوب',
            'check_number.required' => 'رقم الشيك مطلوب',
            'iban_number.required' => 'رقم الايبان مطلوب',
        ]);

        ReceiptOrder::insert([
            'date' => $request->date,
            'payment_id' => $request->payment_id,
            'number_receipt' => $request->number_receipt,
            'benefit' => $request->benefit,
            'currency_type' => $request->currency_type,
            'just' => $request->just,
            'bank_name' => $request->bank_name,
            'check_number' => $request->check_number,
            'iban_number' => $request->iban_number,
            'price' => $request->price,
            'project_name' => $request->project_name,
            'project_number' => $request->project_number,
            'purchase_name' => $request->purchase_name,
            'financial_provision' => $request->financial_provision,
            'number' => $request->number,
            'created_at' => Carbon::now(),
        ]);
        DB::table('payments')
            ->where('id', $payments_id)
            ->update(['status_id' => 3]);

        $request->session()->flash('status', 'تم اضافة سند صرف بنجاح');
        return redirect('/receipt/order');
    }

    public function ReceiptCommand() {

        $command = ReceiptCommand::orderBy('id', 'DESC')->get();
        $commands = PaymentOrder::orderBy('id', 'DESC')->get();
        return view('receipt.receipt_command', compact('commands', 'command'));
    }

    public function AddReceiptCommand($id) {

        $payments = PaymentOrder::find($id);
        return view('receipt.add_receipt_command', compact('payments'));
    }

    public function CatchReceipt() {

        return view('receipt.catch_receipt');

    }

    public function ReceiptCommandStore(Request $request) {

        $payments_id = $request->id;

        ReceiptCommand::insert([
            'paymentorder_id' => $request->paymentorder_id,
            'date' => $request->date,
            'payment_number' => $request->payment_number,
            'benefit_name' => $request->benefit_name,
            'price' => $request->price,
            'currency_type' => $request->currency_type,
            'just' => $request->just,
            'bank_name' => $request->bank_name,
            'check_number' => $request->check_number,
            'iban_number' => $request->iban_number,
            'purchase_name' => $request->purchase_name,
            'project_name' => $request->project_name,
            'project_number' => $request->project_number,
            'financial_provision' => $request->financial_provision,
            'number_financial' => $request->number_financial,
            'created_at' => Carbon::now(),
        ]);

        DB::table('payment_orders')
            ->where('id', $payments_id)
            ->update(['status_id' => 3]);

        $request->session()->flash('status', 'تم ارسال سند صرف بنجاح');
        return redirect('/receipt/command');

    }


}
