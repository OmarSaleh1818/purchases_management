<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Company;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{

    public function CompanyView() {

        $companies = Company::all();
        return view('company.company_view', compact('companies'));

    }

    public function CompanyStore(Request $request) {

        $request->validate([
            'company_name' => 'required',
            'company_image' => 'required',
        ],[
            'company_name.required' => 'اسم الشركة مطلوب',
            'company_image.required' => 'ادخال صورة مطلوب'
        ]);
        $image = $request->file('company_image');
        $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
        Image::make($image)->resize(300,300)->save('upload/'.$name_gen);
        $save_url = 'upload/'.$name_gen ;
        Company::insert([
            'company_name' => $request->company_name,
            'company_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $request->session()->flash('status', 'تم اضافة الشركة بنجاح');
        return redirect()->back();
    }

    public function CompanyEdit($id) {

        $company = Company::findOrFail($id);
        return view('company.company_edit', compact('company'));

    }

    public function CompanyUpdate(Request $request , $id) {

        $old_img = $request->old_image;
        @unlink($old_img);
        $image = $request->file('company_image');
        $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
        Image::make($image)->resize(300,300)->save('upload/'.$name_gen);
        $save_url = 'upload/'.$name_gen ;

        Company::findOrFail($id)->update([
            'company_name' => $request->company_name,
            'company_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $request->session()->flash('status', 'تم تعديل اسم الشركة بنجاح');
        return redirect('/company');

    }

    public function CompanyDelete($id) {

        Company::findOrFail($id)->delete();
        Session()->flash('status', 'تم حذف الشركة بنجاح');
        return redirect('/company');
    }


}
