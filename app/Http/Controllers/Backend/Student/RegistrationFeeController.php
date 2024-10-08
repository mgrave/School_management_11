<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\FeeCategoryAmount;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrationFeeController extends Controller
{
    public function RegistrationFeeView(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        return view('backend.student.registration_fee.registration_view',compact('student_year','student_class'));
    }//End Method

    public function RegistrationFeeClassWise(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
         if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
         }
         if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
         }
         $allStudent = AssignStudent::with(['discount'])->where($where)->get();
         // dd($allStudent);
         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>ID No</th>';
         $html['thsource'] .= '<th>Student Name</th>';
         $html['thsource'] .= '<th>Roll No</th>';
         $html['thsource'] .= '<th>Reg Fee</th>';
         $html['thsource'] .= '<th>Discount </th>';
         $html['thsource'] .= '<th>Student Fee </th>';
         $html['thsource'] .= '<th>Action</th>';


         foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.registration.fee.payslip").'?class_id='.$v->class_id.'&studetn_id='.$v->studetn_id.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);


    }//End Method

    public function RegistrationFeePayslip(Request $request){
        $student_id = $request->studetn_id;
        $class_id = $request->class_id;
        $item = AssignStudent::with(['student','discount'])->where('studetn_id',$student_id)->where('class_id',$class_id)->first();
        $data = [
            'title' => 'Student Details',
            'date' => date('m/d/y'),
            'item' => $item,
        ];


        $pdf = Pdf::loadView('backend.student.registration_fee.student_fee_slip', $data);
        
        return $pdf->stream('registration_fee.pdf');
    }//End Method





























}
