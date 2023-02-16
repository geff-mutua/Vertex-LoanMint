<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\pages\admin\AdminDashboard;
use App\Http\Livewire\Content\Admin\Clients\Borrowers;
use App\Http\Livewire\Content\Admin\Loans\ActiveLoans;
use App\Http\Livewire\Content\Admin\Loans\ArrearLoans;
use App\Http\Livewire\Content\Admin\Loans\LoanDetails;
use App\Http\Livewire\Content\Admin\Products\Products;
use App\Http\Livewire\Content\Admin\Loans\PendingLoans;
use App\Http\Livewire\Content\Admin\Clients\AddBorrower;
use App\Http\Livewire\Content\Admin\Loans\RejectedLoans;
use App\Http\Livewire\Content\Admin\Loans\IndividualLoan;
use App\Http\Livewire\Content\Admin\Branches\CompanyBranch;
use App\Http\Livewire\Content\Admin\Clients\BorrowerProfile;
use App\Http\Controllers\pages\admin\clients\ClientController;
use App\Http\Livewire\Content\Admin\Collections\MpesaUnmapped;
use App\Http\Livewire\Content\Admin\Collections\AllCollections;
use App\Http\Controllers\pages\admin\settings\theme\ThemeSetting;
use App\Http\Livewire\Content\Admin\Collections\MpesaCollections;
use App\Http\Controllers\pages\admin\settings\company\CompanySetting;
use App\Http\Livewire\Content\Admin\Collections\Sheets\DailyCollectionSheet;
use App\Http\Livewire\Content\Admin\Collections\Transactions\TransactionDetail;


$controller_path = 'App\Http\Controllers';

Route::middleware('guest')->group(function (){
	Route::get('/',[LandingPageController::class,'index']);
    Route::get('/about',[LandingPageController::class,'about']);
    Route::get('/features',[LandingPageController::class,'features']);
    Route::get('/pricing',[LandingPageController::class,'pricing']);
});

// Admin Routes
Route::domain('{domain}.'.env('SESSION_DOMAIN'))->group(function(){
    Route::middleware(['auth','company'])->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin');

            // Client Routes
            Route::get('/clients', Borrowers::class)->name('clients-list');
            Route::get('/clients/new', AddBorrower::class)->name('clients-new');
            Route::get('/clients/borrower-profile/{id}', BorrowerProfile::class)->name('borrower-profile');

            // Branches
            Route::get('/branches', CompanyBranch::class)->name('setting-branches');

            // Products
            Route::get('/products', Products::class)->name('setting-products');

            // Loans
            Route::get('/loans', IndividualLoan::class)->name('loans-list');
            Route::get('/loans/pending', PendingLoans::class)->name('loans-pending');
            Route::get('/loans/active', ActiveLoans::class)->name('loans-active');
            Route::get('/loans/rejected', RejectedLoans::class)->name('loans-rejected');
            Route::get('/loans/arrears', ArrearLoans::class)->name('loans-arrears');
            Route::get('loan-details/{id}',LoanDetails::class)->name('loan-details');

            //Collections
            Route::get('/collections',AllCollections::class)->name('collections-list');
            Route::get('/collections/mpesa',MpesaCollections::class)->name('collections-mpesa');
            Route::get('/collections/mpesa/unmapped',MpesaUnmapped::class)->name('collections-mpesa-unmapped');

            //Sheets
            Route::get('/collection/mpesa/daily',DailyCollectionSheet::class)->name('collection-sheet-daily');

            // Transactions
            Route::get('/transaction/details/{id}',TransactionDetail::class)->name('transaction-detail');

            //Reporting
            Route::get('borrower-statement/{id}',[ReportController::class,'borrowerStatement']);
            Route::get('borrower-loan/{id}',[ReportController::class,'loanStatement']);
            
        });
    });
});
// PROJECT INIT SETTINGS
Route::domain('{domain}.'.env('SESSION_DOMAIN'))->group(function(){
    Route::middleware(['auth'])->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/company-setting', [CompanySetting::class, 'index'])->name('setting-company');
            Route::post('/company-setting/update', [CompanySetting::class, 'store'])->name('company-update');
            Route::get('/theme-setting', [ThemeSetting::class, 'index'])->name('setting-theme');
            Route::post('/theme-setting/update', [ThemeSetting::class, 'store'])->name('theme-update');
        });
    });
});

// Main Page Route
//Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
//Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

// pages
//Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';