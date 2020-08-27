<?php

use App\Http\Controllers\ChequeLoanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/logout', function () {
    session()->forget('user');
    session()->forget('empid');
    session()->forget('emptype');

    return redirect('login');
});

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect('login');
    }

    return view('dashboard');
});
Route::get('/login', function () {
    $msg = '';
    return view('login')->with('error_msg', $msg);
});
Route::get('/usertypes', function () {
    return view('usertypes');
});
Route::get('/loginmanage', function () {
    return view('loginmanage');
});
Route::get('/staff', function () {
    return view('staff');
});
Route::get('/customers', function () {
    return view('customermanage');
});
Route::get('/addcustomer', function () {
    return view('customeradd');
});
Route::get('/guarantors', function () {
    if (session()->get('emptype') == 3) {
        return redirect('dashboard');
    } else {
        return view('guarantormanage');
    }
});
Route::get('/addguarantor', function () {
    return view('guarantoradd');
});
Route::get('/addstaffmember', function () {
    return view('newstaffmember');
});

Route::get('/cashcollector', function () {
    return view('cashcollector');
});
Route::get('/newcashcollector', function () {
    return view('newcashcollector');
});
Route::get('/dailyloan_create', function () {
    return view('dailyloan_create');
});
Route::get('/ArrearsRecorect', function () {
    return view('ArrearsRecorect');
});
Route::get('/currentloanincrees', function () {
    return view('currentloanincrees');
});
Route::get('/customerarrears', function () {
    return view('customerarrears');
});
Route::get('/chequemanage', function () {
    return view('chequemanage');
});

Route::get('/monthlyloancreate', function () {
    return view('monthlyloancreate');
});
Route::get('/propertyloancreate', function () {
    return view('propertyloancreate');
});

Route::get('/createroute', function () {
    return view('routecreate');
});
Route::get('/assingroute', function () {
    return view('routeassing');
});
Route::get('/dailyloanreports', function () {
    return view('dailyloanreport');
});
Route::get('/monthlyloanreports', function () {
    $data = '';
    return view('monthlyloanreport')->with('ldata', $data);
});
Route::get('/propertyloanreports', function () {
    return view('propertyloanreport');
});
Route::get('/addInterest', function () {
    return view('addInterest');
});
Route::get('/loanpay', function () {
    return view('loanpay');
});
Route::get('/cashcollect', function () {
    $data = '';
    return view('cashhandoveraccept')->with('cshsmry', $data);
});
Route::get('/cashcollecthistory', function () {
    return view('collectedcashhistory');
});
Route::get('/approveloans', function () {
    return view('loanapprove');
});
Route::get('/loanChequemanage', function () {
    return view('loanChequemanage');
});
Route::get('/loanpayinstallment', function () {
    $data = '';
    return view('loanpayinstallment')->with('installmentpy', $data);
});
Route::get('/summary', function () {
    return view('summary');
});
//Test
Route::get('/testdoc', function () {
    return view('test');
});
Route::get('/OldLoanPay', function () {
    return view('OldLoanPayment');
});
Route::post('/loadTestData', 'EmployeeController@TestMethodPagination');

//Route
Route::post('/newroute', 'RouteCreateController@newroute');
Route::post('/loadEmployeeData', 'RouteCreateController@loadEmployeeData');
Route::post('/CollectoreAssingRoute', 'RouteCreateController@newrouteAssigs');
Route::post(
    '/loadrouteassingload',
    'RouteCreateController@loadrouteassingload'
);
Route::post(
    '/CollectoreUpdateRoute',
    'RouteCreateController@CollectoreUpdateRoute'
);

//customer
Route::post('/newcutomer', 'CustomerController@newcutomer');
Route::post('/activeCustomer', 'CustomerController@activeCustomer');
Route::post('/deactiveCustomer', 'CustomerController@deactiveCustomer');
Route::post('/viewCustomerDetails', 'CustomerController@viewCustomerDetails');
Route::post('/updateCustomer', 'CustomerController@updateCustomer');
Route::post('/loadCustomerLoan', 'CustomerController@loadCustomerLoan');
Route::post('/loadCustomerdata', 'CustomerController@loadCustomerdata');
Route::post('/genaratefilenum', 'CustomerController@genaratefilenum');
//garantor
Route::post('/newguarantor', 'GuarantorController@newguarantor');
Route::post('/activeGuarantor', 'GuarantorController@activeGuarantor');
Route::post('/deactiveGuarantor', 'GuarantorController@deactiveGuarantor');
Route::post(
    '/viewGuarantorDetails',
    'GuarantorController@viewGuarantorDetails'
);
Route::post('/updateGuarantor', 'GuarantorController@updateGuarantor');
Route::post('/guarantorDetails', 'GuarantorController@guarantorDetails');

//usertype
Route::post('/Addusertype', 'UserTypeController@Addusertype');
Route::post('/activeUsertype', 'UserTypeController@activeUsertype');
Route::post('/deactiveutype', 'UserTypeController@deactiveutype');

//LoginManage
Route::post(
    'updatelgempstatdeactive',
    'LoginManageController@updateLoginEmpStatDeactive'
);
Route::post(
    'updatelgempstatactive',
    'LoginManageController@updateLoginEmpStatActive'
);
Route::post('updateempstatactive', 'LoginManageController@updateEmpStatActive');
Route::post(
    'updateempstatdeactive',
    'LoginManageController@updateEmpStatDeactive'
);

//employee
Route::post('/newStaffMember', 'EmployeeController@newStaffMember');
Route::post('/loadempdetails', 'EmployeeController@loadEmployeeDetails');
Route::post('/updateempdetails', 'EmployeeController@updateEmployeeDetails');
Route::post('/updateempcreadintials', 'EmployeeController@updateEMPCredintial');
Route::post('/CreateCashcollector', 'EmployeeController@newCashCollector');
Route::post('/loadccdetails', 'EmployeeController@loadCashCollectorDetails');
Route::post('/loadccnote', 'EmployeeController@loadCashCollectorNote');
Route::post(
    '/updateccdetails',
    'EmployeeController@updateCashCollectorDetails'
);
Route::post('/updateccnote', 'EmployeeController@updateCashCollectorNote');
Route::post('/updatecccreadintials', 'EmployeeController@updateCCCredintial');

// Darily loan
Route::post('/darilyviewplan', 'EmployeeController@darilyviewplan');

//Settings
Route::post('/newholidayAdd', 'SettingController@newholidayAdd');
Route::post('/newaccount', 'SettingController@newaccount');
Route::post('/newloantype', 'SettingController@newloantype');
Route::post('/deletAccount', 'SettingController@deletAccount');
Route::post('/loadholidays', 'SettingController@loadholidays');
Route::post('/deletholiday', 'SettingController@deletholiday');

//UserLogin
Route::post('/login', 'EmployeeController@userLogin');

//Daily Loan Create
Route::post('/createloan', 'DailyLoanController@createloan');
Route::post('/dailyLoanPlan', 'DailyLoanController@loanPlan');
Route::post('/customerdetails', 'DailyLoanController@customerdetails');
Route::post('/loanHistory', 'DailyLoanController@loanHistory');
Route::post('/genarateAutoId', 'DailyLoanController@genarateAutoId');
Route::post('/createloan', 'DailyLoanController@createloan');

//cheque Loan Create
Route::post('/Clonecreate', 'ChequeLoanController@chequeLoneCreate');

//loanpay
Route::post('/customerLoans', 'LoanPayController@customerLoansSearch');
Route::post('/paynow', 'LoanPayController@paynowloan');
Route::get('/loadCustomersLoans', 'LoanPayController@loadCustomersLoans');
Route::get('/loadLoan', 'LoanPayController@loadLoan');
Route::post('/loanCapitalPay', 'LoanPayController@loanCapitalPay');
Route::post(
    '/interestInterOrIstalPay',
    'LoanPayController@interestInterOrIstalPay'
);

Route::post('/searchloan', 'OldLoanPayController@searchloan');
// -------------------------------
// -------------------------------
Route::post(
    '/searchloaninstallment',
    'PayLoansController@searchLoanInstallment'
);
Route::post('/payloaninstallment', 'PayLoansController@payLoanInstallment');

// Check Diary

Route::post('/addnewcheck', 'ChequeController@addnewcheck');
Route::post('/load_cheque', 'ChequeController@load_cheque');
Route::post('/Advance_searchData', 'ChequeController@Advance_searchData');
Route::post('/checked_cheque_data', 'ChequeController@checked_cheque_data');
Route::post('/checked_dipositeData', 'ChequeController@checked_dipositeData');
Route::post('/return_cheque_data', 'ChequeController@return_cheque_data');
Route::post('/customer_cheque_paid', 'ChequeController@customer_cheque_paid');
Route::post(
    '/customer_cheque_return',
    'ChequeController@customer_cheque_return'
);
Route::post('/customer_cheque_clear', 'ChequeController@customer_cheque_clear');

//Advance Search
Route::post(
    '/darlyloanAdvanceSearch',
    'AdvanceSearchController@darlyloanAdvanceSearch'
);
Route::post(
    '/chequeLoanAdSearch',
    'AdvanceSearchController@chequeloanAdvanceSearch'
);
Route::post(
    '/propertyLoanAdSearch',
    'AdvanceSearchController@propertyloanAdvanceSearch'
);

// Monthly Loan (P Type)
Route::post('/monthlyLoanPCreate', 'MonthlyLoanController@monthlyLoanPCreate');
Route::post('/vehicalLoanPlan', 'MonthlyLoanController@vehicalLoanPlan');
Route::post(
    '/propertyAndvehicalLoan',
    'MonthlyLoanController@propertyAndvehicalLoan'
);

//Monthly Loan
Route::post('/monthlyLoanPlan', 'MonthlyController@monthlyloanPlan');
Route::post('/createMonthlyLoan', 'MonthlyController@createMonthlyLoan');

//Cash Handover
Route::get('/selectedhistorycashcollect/{id}', function () {
    return view('specificroutehistory');
});
Route::post('/checkCashHandover', 'CashHandOver@handoverCheck');
Route::post('/approvehandover', 'CashHandOver@approveCashHandover');
Route::post('/loadcshcollectentryhistory', 'CashHandOver@loadcchandoverEntry');

//Cash Collection Calculations
Route::post(
    '/valculateccollections',
    'CashCollectCalculationsController@cccCalculation'
);

//Arrears Darly Loan
Route::post('/showarrearsamount', 'ArrearsLoanController@showarrearsamount');
Route::post('/arresloanPlan', 'ArrearsLoanController@arresloanPlan');
Route::post('/viewOldLoan', 'ArrearsLoanController@viewOldLoan');
Route::post('/recreateloan', 'ArrearsLoanController@recreateloan');
Route::post('/recreateloanplan', 'ArrearsLoanController@recreateloanplan');
Route::post(
    '/newcreateloan_reassing',
    'ArrearsLoanController@newcreateloan_reassing'
);

// Dashbard Data
Route::post('/showloanData', 'DasshboardController@showloanData');
Route::post('/showchequeData', 'DasshboardController@showchequeData');
Route::post('/showcollectordata', 'DasshboardController@showcollectordata');
Route::post('/darilysummery', 'DasshboardController@darilysummery');
Route::post('/allsummry', 'DasshboardController@allsummry');
Route::post('/loadnotification', 'notificationController@loadnotification');

//Loan Approve
Route::post('/loadcustomerdetails', 'LoanApproveController@loadCustomerInfo');
Route::post(
    '/loadloaninfoapprove',
    'LoanApproveController@loadLoanInfoApprove'
);
Route::post('/approveLoanadmin', 'LoanApproveController@approveLoanAdmin');
Route::post(
    '/notapproveLoanadmin',
    'LoanApproveController@notApproveLoanAdmin'
);

// ------------------------------------API-----------------------

Route::get(
    '/loadcustomerlist',
    'DailyCustomerListController@loadCustomerListcc'
);
// Route::get('/loadcustomerlist','DailyCustomerListController@makepaymentforLoan');

//loan document
Route::get('document', 'DocumentController@imagesUpload');

Route::post('imageSubmit', 'DocumentController@imagesUploadPost')->name(
    'upload'
);

// ----------------------------------------------------pdf printing--------------------
Route::get('/customerprintpdf', 'AdvanceSearchController@printPDF');

// testing contraller
Route::post('/testing', 'TestController@testing');
