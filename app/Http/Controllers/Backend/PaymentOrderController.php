<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PaymentOrder;

class PaymentOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = PaymentOrder::orderBy('status_id', 'ASC')->orderBy('id', 'DESC')->get();
        return view('payment.payment_order', compact('payments'));
    }

    public function PaymentOrder() {

        return view('payment.add_command');
    }

    public function CommandStore(Request $request) {

        $request->validate([
            'date' => 'required',
            'payment_number' => 'required',
            'benefit_name' => 'required',
            'price' => 'required',
            'currency_type' => 'required',
            'just' => 'required',
            'bank_name' => 'required',
            'check_number' => 'required',
            'iban_number' => 'required',
            'purchase_name' => 'required',
            'project_name' => 'required',
            'project_number' => 'required',
            'financial_provision' => 'required',
            'number_financial' => 'required',
        ],[
            'date.required' => 'التاريخ مطلوب',
            'payment_number.required' => 'الرقم مطلوب',
            'benefit_name.required' => 'اسم المستفيد مطلوب',
            'price.required' => 'المبلغ مطلوب',
            'currency_type.required' => 'نوع العملة مطلوب',
            'just.required' => 'فقط مطلوب',
            'bank_name.required' => 'البنك المسحوب عليه مطلوب',
            'check_number.required' => 'رقم الشيك مطلوبة',
            'iban_number.required' => 'رقم الايبان مطلوب',
            'purchase_name.required' => 'البيان مطلوب',
            'project_name.required' => 'اسم المشروع مطلوب',
            'project_number.required' => 'رقم المشروع مطلوب',
            'financial_provision.required' => 'المخصص المالي مطلوب',
            'number_financial.required' => 'رقم المخصص المالي مطلوب',
        ]);

        PaymentOrder::insert([
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

        $request->session()->flash('status', 'تم ارسال امر الدفع بنجاح');
        return redirect('/command/pay');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
