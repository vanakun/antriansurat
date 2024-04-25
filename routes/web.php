<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\StepController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Tenagaahli\TenagaahliController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;

use App\Http\Controllers\Perusahaan\JurnalController;
use App\Http\Controllers\Perusahaan\JurnalUmumController;


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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'loginView'])->name('login.index');
    Route::post('login', [LoginController::class, 'login'])->name('login.check');
    Route::get('register', [AuthController::class, 'registerView'])->name('register.index');
    Route::post('registerStore', [AuthController::class, 'registerStore'])->name('register.store');
});
Route::middleware('auth')->group(function() {
    
    Route::get('/', [PageController::class, 'handleRole'])->name('dashboard');
    // Contoh: Rute admin
    Route::middleware('role:Admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('adminDashboard');

        Route::prefix('antrian')->group(function () {
            Route::get('/', [JurnalUmumController::class, 'index'])->name('index');
            Route::get('/jurnal', [JurnalController::class, 'indexjurnal'])->name('indexjurnal');

            Route::get('/surat', [AdminController::class, 'indexAntrian'])->name('indexAntrian');
            Route::get('/suratpm', [AdminController::class, 'indexAntrianpm'])->name('indexAntrianpm');
            Route::get('/suratpp', [AdminController::class, 'indexAntrianpp'])->name('indexAntrianpp');
            Route::get('/suratps', [AdminController::class, 'indexAntrianps'])->name('indexAntrianps');
            Route::get('/suratpr', [AdminController::class, 'indexAntrianpr'])->name('indexAntrianpr');
            Route::get('/suratot', [AdminController::class, 'indexAntrianot'])->name('indexAntrianot');
            Route::get('/suratka', [AdminController::class, 'indexAntrianka'])->name('indexAntrianka');
            Route::get('/suratku', [AdminController::class, 'indexAntrianku'])->name('indexAntrianku');
            Route::get('/suratpl', [AdminController::class, 'indexAntrianpl'])->name('indexAntrianpl');
            Route::get('/surathk', [AdminController::class, 'indexAntrianhk'])->name('indexAntrianhk');
            Route::get('/surathm', [AdminController::class, 'indexAntrianhm'])->name('indexAntrianhm');
            Route::get('/suratkp', [AdminController::class, 'indexAntriankp'])->name('indexAntriankp');
            Route::get('/suratrt', [AdminController::class, 'indexAntrianrt'])->name('indexAntrianrt');
            Route::get('/suratpw', [AdminController::class, 'indexAntrianpw'])->name('indexAntrianpw');
            Route::get('/suratti', [AdminController::class, 'indexAntrianti'])->name('indexAntrianti');
        });
        // ... tambahkan rute admin lainnya di sini
    });
    // Contoh: Rute pengguna biasa (tenaga ahli)
    Route::middleware('role:User')->group(function () {
        Route::get('/user', [TenagaahliController::class, 'index'])->name('tenagaahliDashboard');
        Route::get('/create-surat', [TenagaahliController::class, 'createsurat'])->name('createsurat');

        Route::get('/create-surat-pm', [TenagaahliController::class, 'createsuratpm'])->name('createsuratpm');
        Route::post('/store-surat-pm', [TenagaahliController::class, 'storesuratpm'])->name('storesuratpm');

        Route::get('/create-surat-pp', [TenagaahliController::class, 'createsuratpp'])->name('createsuratpp');
        Route::post('/store-surat-pp', [TenagaahliController::class, 'storesuratpp'])->name('storesuratpp');

        Route::get('/create-surat-ps', [TenagaahliController::class, 'createsuratps'])->name('createsuratps');
        Route::post('/store-surat-ps', [TenagaahliController::class, 'storesuratps'])->name('storesuratps');

        Route::get('/create-surat-pr', [TenagaahliController::class, 'createsuratpr'])->name('createsuratpr');
        Route::post('/store-surat-pr', [TenagaahliController::class, 'storesuratpr'])->name('storesuratpr');

        Route::get('/create-surat-ot', [TenagaahliController::class, 'createsuratot'])->name('createsuratot');
        Route::post('/store-surat-ot', [TenagaahliController::class, 'storesuratot'])->name('storesuratot');

        Route::get('/create-surat-ka', [TenagaahliController::class, 'createsuratka'])->name('createsuratka');
        Route::post('/store-surat-ka', [TenagaahliController::class, 'storesuratka'])->name('storesuratka');

        Route::get('/create-surat-ku', [TenagaahliController::class, 'createsuratku'])->name('createsuratku');
        Route::post('/store-surat-ku', [TenagaahliController::class, 'storesuratku'])->name('storesuratku');

        Route::get('/create-surat-pl', [TenagaahliController::class, 'createsuratpl'])->name('createsuratpl');
        Route::post('/store-surat-pl', [TenagaahliController::class, 'storesuratpl'])->name('storesuratpl');

        Route::get('/create-surat-hm', [TenagaahliController::class, 'createsurathm'])->name('createsurathm');
        Route::post('/store-surat-hm', [TenagaahliController::class, 'storesurathm'])->name('storesurathm');

        Route::get('/create-surat-kp', [TenagaahliController::class, 'createsuratkp'])->name('createsuratkp');
        Route::post('/store-surat-kp', [TenagaahliController::class, 'storesuratkp'])->name('storesuratkp');
        
        Route::get('/create-surat-rt', [TenagaahliController::class, 'createsuratrt'])->name('createsuratrt');
        Route::post('/store-surat-rt', [TenagaahliController::class, 'storesuratrt'])->name('storesuratrt');

        Route::get('/show/{id}/share-link', [TenagaahliController::class, 'shareLink'])->name('shareLink');
        Route::get('/show/{id}', [TenagaahliController::class, 'show'])->name('showProject');
        Route::get('/show/step/{id}', [TenagaahliController::class, 'showStep'])->name('stepProject');
        Route::get('/step/{step}', [StepController::class, 'show'])->name('showStep');
        Route::get('/add-expert/{step}', [StepController::class, 'addToStep'])->name('AddToStep');
        Route::post('/store-expert/{step}', [StepController::class, 'storeExpert'])->name('StoreExpert');
        Route::get('/show/step/add/{step}', [StepController::class, 'addToStep'])->name('isKetua');
        Route::get('/show/step/generate-pdf/{id}', [CetakController::class, 'generatePDF'])->name('pdf');
        Route::get('/show/step/cetak-pdf/{project_id}', [CetakController::class, 'cetakPDF'])->name('cetakPDF');
        Route::get('/setting/{user}', [ProfileController::class, 'index'])->name('setting');
        Route::get('/setting/account/{user}', [ProfileController::class, 'accountSet'])->name('accountSet');
        Route::put('/setting/update-acc/{id}', [ProfileController::class, 'updateAccount'])->name('update-account');
        Route::get('/setting/changepw/{user}', [ProfileController::class, 'changePw'])->name('changePw');
        Route::post('/setting/updatepw/{id}', [ProfileController::class, 'updatePassword'])->name('update-password');
        Route::post('/step-media/{step}', [TenagaahliController::class, 'create'])->name('step-media.create');
        // ... tambahkan rute tenaga ahli lainnya di sini
    });
});


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard-overview-2-page', [PageController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
    Route::get('dashboard-overview-3-page', [PageController::class, 'dashboardOverview3'])->name('dashboard-overview-3');
    Route::get('inbox-page', [PageController::class, 'inbox'])->name('inbox');
    Route::get('file-manager-page', [PageController::class, 'fileManager'])->name('file-manager');
    Route::get('point-of-sale-page', [PageController::class, 'pointOfSale'])->name('point-of-sale');
    Route::get('chat-page', [PageController::class, 'chat'])->name('chat');
    Route::get('post-page', [PageController::class, 'post'])->name('post');
    Route::get('calendar-page', [PageController::class, 'calendar'])->name('calendar');
    Route::get('crud-data-list-page', [PageController::class, 'crudDataList'])->name('crud-data-list');
    Route::get('crud-form-page', [PageController::class, 'crudForm'])->name('crud-form');
    Route::get('users-layout-1-page', [PageController::class, 'usersLayout1'])->name('users-layout-1');
    Route::get('/users-layout-2-page', [PageController::class, 'usersLayout2'])->name('users-layout-2');
    Route::get('users-layout-3-page', [PageController::class, 'usersLayout3'])->name('users-layout-3');
    Route::get('profile-overview-1-page', [PageController::class, 'profileOverview1'])->name('profile-overview-1');
    Route::get('profile-overview-2-page', [PageController::class, 'profileOverview2'])->name('profile-overview-2');
    Route::get('profile-overview-3-page', [PageController::class, 'profileOverview3'])->name('profile-overview-3');
    Route::get('wizard-layout-1-page', [PageController::class, 'wizardLayout1'])->name('wizard-layout-1');
    Route::get('wizard-layout-2-page', [PageController::class, 'wizardLayout2'])->name('wizard-layout-2');
    Route::get('wizard-layout-3-page', [PageController::class, 'wizardLayout3'])->name('wizard-layout-3');
    Route::get('blog-layout-1-page', [PageController::class, 'blogLayout1'])->name('blog-layout-1');
    Route::get('blog-layout-2-page', [PageController::class, 'blogLayout2'])->name('blog-layout-2');
    Route::get('blog-layout-3-page', [PageController::class, 'blogLayout3'])->name('blog-layout-3');
    Route::get('pricing-layout-1-page', [PageController::class, 'pricingLayout1'])->name('pricing-layout-1');
    Route::get('pricing-layout-2-page', [PageController::class, 'pricingLayout2'])->name('pricing-layout-2');
    Route::get('invoice-layout-1-page', [PageController::class, 'invoiceLayout1'])->name('invoice-layout-1');
    Route::get('invoice-layout-2-page', [PageController::class, 'invoiceLayout2'])->name('invoice-layout-2');
    Route::get('faq-layout-1-page', [PageController::class, 'faqLayout1'])->name('faq-layout-1');
    Route::get('faq-layout-2-page', [PageController::class, 'faqLayout2'])->name('faq-layout-2');
    Route::get('faq-layout-3-page', [PageController::class, 'faqLayout3'])->name('faq-layout-3');
    Route::get('login-page', [PageController::class, 'login'])->name('login');
    Route::get('register-page', [PageController::class, 'register'])->name('register');
    Route::get('error-page-page', [PageController::class, 'errorPage'])->name('error-page');
    Route::get('update-profile-page', [PageController::class, 'updateProfile'])->name('update-profile');
    Route::get('change-password-page', [PageController::class, 'changePassword'])->name('change-password');
    Route::get('regular-table-page', [PageController::class, 'regularTable'])->name('regular-table');
    Route::get('tabulator-page', [PageController::class, 'tabulator'])->name('tabulator');
    Route::get('modal-page', [PageController::class, 'modal'])->name('modal');
    Route::get('slide-over-page', [PageController::class, 'slideOver'])->name('slide-over');
    Route::get('notification-page', [PageController::class, 'notification'])->name('notification');
    Route::get('accordion-page', [PageController::class, 'accordion'])->name('accordion');
    Route::get('button-page', [PageController::class, 'button'])->name('button');
    Route::get('alert-page', [PageController::class, 'alert'])->name('alert');
    Route::get('progress-bar-page', [PageController::class, 'progressBar'])->name('progress-bar');
    Route::get('tooltip-page', [PageController::class, 'tooltip'])->name('tooltip');
    Route::get('dropdown-page', [PageController::class, 'dropdown'])->name('dropdown');
    Route::get('typography-page', [PageController::class, 'typography'])->name('typography');
    Route::get('icon-page', [PageController::class, 'icon'])->name('icon');
    Route::get('loading-icon-page', [PageController::class, 'loadingIcon'])->name('loading-icon');
    Route::get('regular-form-page', [PageController::class, 'regularForm'])->name('regular-form');
    Route::get('datepicker-page', [PageController::class, 'datepicker'])->name('datepicker');
    Route::get('tom-select-page', [PageController::class, 'tomSelect'])->name('tom-select');
    Route::get('file-upload-page', [PageController::class, 'fileUpload'])->name('file-upload');
    Route::get('wysiwyg-editor-classic', [PageController::class, 'wysiwygEditorClassic'])->name('wysiwyg-editor-classic');
    Route::get('wysiwyg-editor-inline', [PageController::class, 'wysiwygEditorInline'])->name('wysiwyg-editor-inline');
    Route::get('wysiwyg-editor-balloon', [PageController::class, 'wysiwygEditorBalloon'])->name('wysiwyg-editor-balloon');
    Route::get('wysiwyg-editor-balloon-block', [PageController::class, 'wysiwygEditorBalloonBlock'])->name('wysiwyg-editor-balloon-block');
    Route::get('wysiwyg-editor-document', [PageController::class, 'wysiwygEditorDocument'])->name('wysiwyg-editor-document');
    Route::get('validation-page', [PageController::class, 'validation'])->name('validation');
    Route::get('chart-page', [PageController::class, 'chart'])->name('chart');
    Route::get('slider-page', [PageController::class, 'slider'])->name('slider');
    Route::get('image-zoom-page', [PageController::class, 'imageZoom'])->name('image-zoom');