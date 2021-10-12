<?php


namespace App\Http\Controllers\Admin;


use App\Models\Admin\Report;
use Illuminate\Http\Request;

class ReportController extends  SpecificationController
{
    protected $reportModel;
    public function __construct()
    {
        parent::__construct();
        $this->reportModel = new Report();
    }

    public function index(Request $request){
        //dd($request->all());
        $this->data["reports"] = $this->reportModel->getAllReports($request);
        return view("pages.admin.reports.report",$this->data);
    }
}
