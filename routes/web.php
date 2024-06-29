<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\StepController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Tenagaahli\TenagaahliController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\Admin\CetakController;

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
            Route::get('register', [AuthController::class, 'registerView'])->name('register.index');
            Route::post('registerStore', [AuthController::class, 'registerStore'])->name('register.store');
            Route::get('/', [JurnalUmumController::class, 'index'])->name('index');
            Route::get('/jurnal', [JurnalController::class, 'indexjurnal'])->name('indexjurnal');

            Route::get('/surat', [AdminController::class, 'indexAntrian'])->name('indexAntrian');

            Route::get('/suratpm', [AdminController::class, 'indexAntrianpm'])->name('indexAntrianpm');
            Route::get('/edit-suratpm/{id}', [AdminController::class, 'editsuratpm'])->name('editsuratpm');
            Route::post('/updatesuratpm/{id}', [AdminController::class, 'updatepm'])->name('updatesuratpm');
            Route::get('/edit-suratpmdone/{id}', [AdminController::class, 'editsuratpmdone'])->name('editsuratpmdone');
            Route::post('/updatesuratpmdone/{id}', [AdminController::class, 'updatepmdone'])->name('updatepmdone');
            Route::get('/cetakpm', [CetakController::class, 'cetakpm'])->name('cetakpm');
            Route::post('/tolak-surat /{id}', [AdminController::class, 'tolakSurat'])->name('tolakSurat');


            Route::get('/suratpp', [AdminController::class, 'indexAntrianpp'])->name('indexAntrianpp');
            Route::get('/edit-suratpp/{id}', [AdminController::class, 'editsuratpp'])->name('editsuratpp');
            Route::post('/updatesuratpp/{id}', [AdminController::class, 'updatepp'])->name('updatesuratpp');
            Route::get('/edit-suratppdone/{id}', [AdminController::class, 'editsuratppdone'])->name('editsuratppdone');
            Route::post('/updatesuratppdone/{id}', [AdminController::class, 'updateppdone'])->name('updateppdone');
            Route::get('/cetakpp', [CetakController::class, 'cetakpp'])->name('cetakpp');
            

            Route::get('/suratps', [AdminController::class, 'indexAntrianps'])->name('indexAntrianps');
            Route::get('/edit-suratps/{id}', [AdminController::class, 'editsuratps'])->name('editsuratps');
            Route::post('/updatesuratps/{id}', [AdminController::class, 'updatesuratps'])->name('updatesuratps');
            Route::get('/edit-suratpsdone/{id}', [AdminController::class, 'editsuratpsdone'])->name('editsuratpsdone');
            Route::post('/updatesuratpsdone/{id}', [AdminController::class, 'updatepsdone'])->name('updatepsdone');
            Route::get('/cetakps', [CetakController::class, 'cetakps'])->name('cetakps');

            Route::get('/suratpr', [AdminController::class, 'indexAntrianpr'])->name('indexAntrianpr');
            Route::get('/edit-suratpr/{id}', [AdminController::class, 'editsuratpr'])->name('editsuratpr');
            Route::post('/updatesuratpr/{id}', [AdminController::class, 'updatesuratpr'])->name('updatesuratpr');
            Route::get('/edit-suratprdone/{id}', [AdminController::class, 'editsuratprdone'])->name('editsuratprdone');
            Route::post('/updatesuratprdone/{id}', [AdminController::class, 'updateprdone'])->name('updateprdone');
            Route::get('/cetakpr', [CetakController::class, 'cetakpr'])->name('cetakpr');

            Route::get('/suratot', [AdminController::class, 'indexAntrianot'])->name('indexAntrianot');
            Route::get('/edit-suratot/{id}', [AdminController::class, 'editsuratot'])->name('editsuratot');
            Route::post('/updatesuratot/{id}', [AdminController::class, 'updatesuratot'])->name('updatesuratot');
            Route::get('/edit-suratotdone/{id}', [AdminController::class, 'editsuratotdone'])->name('editsuratotdone');
            Route::post('/updatesuratotdone/{id}', [AdminController::class, 'updateotdone'])->name('updateotdone');
            Route::get('/cetakot', [CetakController::class, 'cetakot'])->name('cetakot');

            Route::get('/suratka', [AdminController::class, 'indexAntrianka'])->name('indexAntrianka');
            Route::get('/edit-suratka/{id}', [AdminController::class, 'editsuratka'])->name('editsuratka');
            Route::post('/updatesuratka/{id}', [AdminController::class, 'updatesuratka'])->name('updatesuratka');
            Route::get('/edit-suratkadone/{id}', [AdminController::class, 'editsuratkadone'])->name('editsuratkadone');
            Route::post('/updatesuratkadone/{id}', [AdminController::class, 'updatekadone'])->name('updatekadone');
            Route::get('/cetakka', [CetakController::class, 'cetakka'])->name('cetakka');

            Route::get('/suratku', [AdminController::class, 'indexAntrianku'])->name('indexAntrianku');
            Route::get('/edit-suratku/{id}', [AdminController::class, 'editsuratku'])->name('editsuratku');
            Route::post('/updatesuratku/{id}', [AdminController::class, 'updatesuratku'])->name('updatesuratku');
            Route::get('/edit-suratkudone/{id}', [AdminController::class, 'editsuratkudone'])->name('editsuratkudone');
            Route::post('/updatesuratkudone/{id}', [AdminController::class, 'updatekudone'])->name('updatekudone');
            Route::get('/cetakku', [CetakController::class, 'cetakku'])->name('cetakku');

            Route::get('/suratpl', [AdminController::class, 'indexAntrianpl'])->name('indexAntrianpl');
            Route::get('/edit-suratpl/{id}', [AdminController::class, 'editsuratpl'])->name('editsuratpl');
            Route::post('/updatesuratpl/{id}', [AdminController::class, 'updatesuratpl'])->name('updatesuratpl');
            Route::get('/edit-suratpldone/{id}', [AdminController::class, 'editsuratpldone'])->name('editsuratpldone');
            Route::post('/updatesuratpldone/{id}', [AdminController::class, 'updatepldone'])->name('updatepldone');
            Route::get('/cetakpl', [CetakController::class, 'cetakpl'])->name('cetakpl');

            Route::get('/surathk', [AdminController::class, 'indexAntrianhk'])->name('indexAntrianhk');
            Route::get('/edit-surathk/{id}', [AdminController::class, 'editsurathk'])->name('editsurathk');
            Route::post('/updatesurathk/{id}', [AdminController::class, 'updatesurathk'])->name('updatesurathk');
            Route::get('/edit-surathkdone/{id}', [AdminController::class, 'editsurathkdone'])->name('editsurathkdone');
            Route::post('/updatesurathkdone/{id}', [AdminController::class, 'updatehkdone'])->name('updatehkdone');
            Route::get('/cetakhk', [CetakController::class, 'cetakhk'])->name('cetakhk');

            Route::get('/surathm', [AdminController::class, 'indexAntrianhm'])->name('indexAntrianhm');
            Route::get('/edit-surathm/{id}', [AdminController::class, 'editsurathm'])->name('editsurathm');
            Route::post('/updatesurathm/{id}', [AdminController::class, 'updatesurathm'])->name('updatesurathm');
            Route::get('/edit-surathmdone/{id}', [AdminController::class, 'editsurathmdone'])->name('editsurathmdone');
            Route::post('/updatesurathmdone/{id}', [AdminController::class, 'updatehmdone'])->name('updatehmdone');
            Route::get('/cetakhm', [CetakController::class, 'cetakhm'])->name('cetakhm');

            Route::get('/suratkp', [AdminController::class, 'indexAntriankp'])->name('indexAntriankp');
            Route::get('/edit-suratkp/{id}', [AdminController::class, 'editsuratkp'])->name('editsuratkp');
            Route::post('/updatesuratkp/{id}', [AdminController::class, 'updatesuratkp'])->name('updatesuratkp');
            Route::get('/edit-suratkpdone/{id}', [AdminController::class, 'editsuratkpdone'])->name('editsuratkpdone');
            Route::post('/updatesuratkpdone/{id}', [AdminController::class, 'updatekpdone'])->name('updatekpdone');
            Route::get('/cetakkp', [CetakController::class, 'cetakka'])->name('cetakkp');

            Route::get('/suratrt', [AdminController::class, 'indexAntrianrt'])->name('indexAntrianrt');
            Route::get('/edit-suratrt/{id}', [AdminController::class, 'editsuratrt'])->name('editsuratrt');
            Route::post('/updatesuratrt/{id}', [AdminController::class, 'updatesuratrt'])->name('updatesuratrt');
            Route::get('/edit-suratrtdone/{id}', [AdminController::class, 'editsuratrtdone'])->name('editsuratrtdone');
            Route::post('/updatesurartpdone/{id}', [AdminController::class, 'updatertdone'])->name('updatertdone');
            Route::get('/cetakrt', [CetakController::class, 'cetakrt'])->name('cetakrt');

            Route::get('/suratpw', [AdminController::class, 'indexAntrianpw'])->name('indexAntrianpw');
            Route::get('/edit-suratpw/{id}', [AdminController::class, 'editsuratpw'])->name('editsuratpw');
            Route::post('/updatesuratpw/{id}', [AdminController::class, 'updatesuratpw'])->name('updatesuratpw');
            Route::get('/edit-suratpwdone/{id}', [AdminController::class, 'editsuratpwdone'])->name('editsuratpwdone');
            Route::post('/updatesuratpwdone/{id}', [AdminController::class, 'updatepwdone'])->name('updatepwdone');
            Route::get('/cetakpw', [CetakController::class, 'cetakpw'])->name('cetakpw');
    
            Route::get('/suratti', [AdminController::class, 'indexAntrianti'])->name('indexAntrianti');
            Route::get('/edit-suratti/{id}', [AdminController::class, 'editsuratti'])->name('editsuratti');
            Route::post('/updatesuratti/{id}', [AdminController::class, 'updatesuratti'])->name('updatesuratti');
            Route::get('/edit-surattidone/{id}', [AdminController::class, 'editsurattidone'])->name('editsurattidone');
            Route::post('/updatesurattidone/{id}', [AdminController::class, 'updatetidone'])->name('updatetidone');
            Route::get('/cetakti', [CetakController::class, 'cetakti'])->name('cetakti');
        });
        // ... tambahkan rute admin lainnya di sini
    });
    // Contoh: Rute pengguna biasa (tenaga ahli)
    Route::middleware('role:User')->group(function () {
       
        Route::get('/user', [TenagaahliController::class, 'index'])->name('tenagaahliDashboard');
        Route::get('/create-surat', [TenagaahliController::class, 'createsurat'])->name('createsurat');

        Route::get('/show-suratpm/{id}', [TenagaahliController::class, 'showsuratpmuser'])->name('showsuratpmuser');
        Route::get('/create-surat-pm', [TenagaahliController::class, 'createsuratpm'])->name('createsuratpm');
        Route::post('/store-surat-pm', [TenagaahliController::class, 'storesuratpm'])->name('storesuratpm');
       
        Route::get('/show-suratpp/{id}', [TenagaahliController::class, 'showsuratppuser'])->name('showsuratppuser');
        Route::get('/create-surat-pp', [TenagaahliController::class, 'createsuratpp'])->name('createsuratpp');
        Route::post('/store-surat-pp', [TenagaahliController::class, 'storesuratpp'])->name('storesuratpp');

        Route::get('/show-suratps/{id}', [TenagaahliController::class, 'showsuratpsuser'])->name('showsuratpsuser');
        Route::get('/create-surat-ps', [TenagaahliController::class, 'createsuratps'])->name('createsuratps');
        Route::post('/store-surat-ps', [TenagaahliController::class, 'storesuratps'])->name('storesuratps');

        Route::get('/show-suratpr/{id}', [TenagaahliController::class, 'showsuratpruser'])->name('showsuratpruser');
        Route::get('/create-surat-pr', [TenagaahliController::class, 'createsuratpr'])->name('createsuratpr');
        Route::post('/store-surat-pr', [TenagaahliController::class, 'storesuratpr'])->name('storesuratpr');

        Route::get('/show-suratot/{id}', [TenagaahliController::class, 'showsuratotuser'])->name('showsuratotuser');
        Route::get('/create-surat-ot', [TenagaahliController::class, 'createsuratot'])->name('createsuratot');
        Route::post('/store-surat-ot', [TenagaahliController::class, 'storesuratot'])->name('storesuratot');

        Route::get('/create-surat-ka', [TenagaahliController::class, 'createsuratka'])->name('createsuratka');
        Route::post('/store-surat-ka', [TenagaahliController::class, 'storesuratka'])->name('storesuratka');

        Route::get('/create-surat-ku', [TenagaahliController::class, 'createsuratku'])->name('createsuratku');
        Route::post('/store-surat-ku', [TenagaahliController::class, 'storesuratku'])->name('storesuratku');

        Route::get('/create-surat-pl', [TenagaahliController::class, 'createsuratpl'])->name('createsuratpl');
        Route::post('/store-surat-pl', [TenagaahliController::class, 'storesuratpl'])->name('storesuratpl');

        Route::get('/create-surat-hk', [TenagaahliController::class, 'createsurathk'])->name('createsurathk');
        Route::post('/store-surat-hk', [TenagaahliController::class, 'storesurathk'])->name('storesurathk');

        Route::get('/create-surat-hm', [TenagaahliController::class, 'createsurathm'])->name('createsurathm');
        Route::post('/store-surat-hm', [TenagaahliController::class, 'storesurathm'])->name('storesurathm');

        Route::get('/create-surat-kp', [TenagaahliController::class, 'createsuratkp'])->name('createsuratkp');
        Route::post('/store-surat-kp', [TenagaahliController::class, 'storesuratkp'])->name('storesuratkp');
        
        Route::get('/create-surat-rt', [TenagaahliController::class, 'createsuratrt'])->name('createsuratrt');
        Route::post('/store-surat-rt', [TenagaahliController::class, 'storesuratrt'])->name('storesuratrt');

        Route::get('/create-surat-pw', [TenagaahliController::class, 'createsuratpw'])->name('createsuratpw');
        Route::post('/store-surat-pw', [TenagaahliController::class, 'storesuratpw'])->name('storesuratpw');

        Route::get('/create-surat-ti', [TenagaahliController::class, 'createsuratti'])->name('createsuratti');
        Route::post('/store-surat-ti', [TenagaahliController::class, 'storesuratti'])->name('storesuratti');

        Route::get('/show/{id}/share-link', [TenagaahliController::class, 'shareLink'])->name('shareLink');
        Route::get('/show/{id}', [TenagaahliController::class, 'show'])->name('showProject');
        Route::get('/show/step/{id}', [TenagaahliController::class, 'showStep'])->name('stepProject');
        Route::get('/step/{step}', [StepController::class, 'show'])->name('showStep');
        Route::get('/add-expert/{step}', [StepController::class, 'addToStep'])->name('AddToStep');
        Route::post('/store-expert/{step}', [StepController::class, 'storeExpert'])->name('StoreExpert');
        Route::get('/show/step/add/{step}', [StepController::class, 'addToStep'])->name('isKetua');
      
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