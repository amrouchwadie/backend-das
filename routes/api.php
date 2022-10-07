<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::get('dashboard', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::get('users', [\App\Http\Controllers\AuthController::class, 'getUsers']);
Route::get('profiledetail/{id}', [\App\Http\Controllers\AuthController::class, 'getUserById']);
Route::put('updateUser/{id}', [\App\Http\Controllers\AuthController::class, 'updateUser']);
Route::delete('deleteUser/{id}',  [\App\Http\Controllers\AuthController::class, 'deleteUser']);

Route::get('IdbyUser/{id}', [\App\Http\Controllers\AuthController::class, 'getIdUs']);
Route::get('allusers',  [\App\Http\Controllers\AuthController::class, 'allusers']);
Route::get('onlytrashed', [\App\Http\Controllers\AuthController::class, 'onlyTrashed']);
Route::patch('restore/{id}',  [\App\Http\Controllers\AuthController::class, 'restore']);

// Route::get('groups', [\App\Http\Controllers\AuthController::class, 'allGroups']);
// Route::get('groups/{id}', [\App\Http\Controllers\AuthController::class, 'getGroupbyId']);

Route::get('groups', [\App\Http\Controllers\GcController::class, 'index']);

Route::get('/permissions', [\App\Http\Controllers\PermissionController::class, 'getPermission']);
Route::get('permissions/{id}', [\App\Http\Controllers\PermissionController::class, 'getPermissionById']);
Route::post('/addPermission', [\App\Http\Controllers\PermissionController::class, 'addPermission']);
Route::put('updatePermission/{id}', [\App\Http\Controllers\PermissionController::class, 'updatePermission']);
Route::delete('deletePermission/{id}', [\App\Http\Controllers\PermissionController::class, 'deletePermission']);

Route::get('partenirs', [\App\Http\Controllers\PartenirController::class, 'getPartenir']);
Route::get('partenirs/{id}', [\App\Http\Controllers\PartenirController::class, 'getPartenirById']);
Route::post('/addPartenir',  [\App\Http\Controllers\PartenirController::class, 'addPartenir']);
Route::put('updatePartenir/{id}',  [\App\Http\Controllers\PartenirController::class, 'updatePartenir']);
Route::delete('deletePartenir/{id}',  [\App\Http\Controllers\PartenirController::class, 'deletePartenir']);

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);



Route::get('suivis', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'allSuivis']);
Route::get('suivis/{id}', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'getSuivisbyId']);
Route::post('addSuivis', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'addSuivis']);
Route::put('updateSuivis/{id}', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'updateSuivis']);
Route::delete('deleteSuivis/{id}', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'deleteSuivis']);
Route::get('recherche/search_suivi', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'recherche']);
Route::get('recherche/search_ref', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'rechercheRef']);
Route::get('recherche/search_sec', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'rechercheSec']);
Route::get('recherche/search_inti', [\App\Http\Controllers\SaisirEnMiseEnOuvreController::class, 'rechercheInti']);



Route::get('/pdhs', [\App\Http\Controllers\PDHController::class, 'viewPdh']);
Route::get('pdhs/{id}', [\App\Http\Controllers\PDHController::class, 'getPdhById']);
Route::post('/addPdh', [\App\Http\Controllers\PDHController::class, 'addPdh']);
Route::put('updatePdh/{id}', [\App\Http\Controllers\PDHController::class, 'updatePDH']);
Route::get('recherche/search_annee', [\App\Http\Controllers\PDHController::class, 'recherche']);
Route::put('pdhupd/{annee}', [\App\Http\Controllers\PDHController::class, 'pdhUpd']);
Route::get('annefindit/{annee}', [\App\Http\Controllers\PDHController::class, 'annefindit']);

// Route::delete('deletePdh/{id}', [\App\Http\Controllers\PDHController::class, 'deleteannee']);

Route::get('/getlastannee', [\App\Http\Controllers\PDHController::class, 'getLastyear']);


Route::get('/getplanificationppdh', [\App\Http\Controllers\PlanificationppdhController::class, 'getPlanificationppdh']);
Route::get('getplanificationppdh/{id}', [\App\Http\Controllers\PlanificationppdhController::class, 'getPlanificationppdhById']);
Route::post('/addplanificationppdh', [\App\Http\Controllers\PlanificationppdhController::class, 'addPlanificationppdh']);
Route::put('updateplanificationppdh/{id}', [\App\Http\Controllers\PlanificationppdhController::class, 'updatePlanificationppdh']);
Route::delete('deleteplanificationppdh/{id}', [\App\Http\Controllers\PlanificationppdhController::class, 'deletePlanificationppdh']);
Route::get('recherche/search_ann', [\App\Http\Controllers\PlanificationppdhController::class, 'rechercheAnn']);
Route::get('recherche/search_prog', [\App\Http\Controllers\PlanificationppdhController::class, 'rechercheProg']);
Route::post('planimport', [\App\Http\Controllers\PlanificationppdhController::class, 'import']);
Route::post('planupload', [\App\Http\Controllers\PlanificationppdhController::class, 'upload']);


Route::get('communs', [\App\Http\Controllers\CommunController::class, 'getcommun']);
Route::get('communs/{id}', [\App\Http\Controllers\CommunController::class, 'getcommunById']);
Route::post('/addCommun',  [\App\Http\Controllers\CommunController::class, 'addcommun']);
Route::put('updateCommun/{id}',  [\App\Http\Controllers\CommunController::class, 'updatecommun']);
Route::delete('deleteCommun/{id}',  [\App\Http\Controllers\CommunController::class, 'deletecommun']);
Route::get('communs/douars/{id}', [\App\Http\Controllers\CommunController::class, 'ShowCommunDouarbyId']);

Route::get('douars', [\App\Http\Controllers\DouarController::class, 'getdouar']);
Route::get('douars/{id}', [\App\Http\Controllers\DouarController::class, 'getdouarById']);
Route::post('/addDouar',  [\App\Http\Controllers\DouarController::class, 'adddouar']);
Route::put('updateDouar/{id}',  [\App\Http\Controllers\DouarController::class, 'updatedouar']);
Route::delete('deleteDouar/{id}',  [\App\Http\Controllers\DouarController::class, 'deletecommun']);

Route::get('programmes1', [\App\Http\Controllers\Programme1Controller::class, 'getProgramme']);
Route::get('programmes1/{id}', [\App\Http\Controllers\Programme1Controller::class, 'getProgrammeById']);
Route::post('/addProgramme1',  [\App\Http\Controllers\Programme1Controller::class, 'addProgramme']);
Route::put('updateProgramme1/{id}',  [\App\Http\Controllers\Programme1Controller::class, 'updateProgramme']);
Route::delete('deleteProgramme1/{id}',  [\App\Http\Controllers\Programme1Controller::class, 'deleteProgramme']);
Route::get('recherche/search_progr', [\App\Http\Controllers\Programme1Controller::class, 'rechercheProg']);
Route::get('recherche/search_Enn', [\App\Http\Controllers\Programme1Controller::class, 'rechercheEnn']);

Route::get('recherche/search_progr', [\App\Http\Controllers\Programme1Controller::class, 'rechercheProg']);
Route::get('recherche/search_enn', [\App\Http\Controllers\Programme1Controller::class, 'rechercheEnn']);
Route::get('recherche/search_intutle', [\App\Http\Controllers\Programme1Controller::class, 'rechercheIntitu']);
Route::get('recherche/search_typeprojet', [\App\Http\Controllers\Programme1Controller::class, 'typeprojet']);

Route::get('programmes2', [\App\Http\Controllers\Programme2Controller::class, 'getProgramme']);
Route::get('programmes2/{id}', [\App\Http\Controllers\Programme2Controller::class, 'getProgrammeById']);
Route::post('/addProgramme2',  [\App\Http\Controllers\Programme2Controller::class, 'addProgramme']);
Route::put('updateProgramme2/{id}',  [\App\Http\Controllers\Programme2Controller::class, 'updateProgramme']);
Route::delete('deleteProgramme2/{id}',  [\App\Http\Controllers\Programme2Controller::class, 'deleteProgramme']);

Route::get('search/search_progr', [\App\Http\Controllers\Programme2Controller::class, 'rechercheProg']);
Route::get('search/search_enn', [\App\Http\Controllers\Programme2Controller::class, 'rechercheEnn']);
Route::get('search/search_intutle', [\App\Http\Controllers\Programme2Controller::class, 'rechercheIntitu']);
Route::get('search/search_typeprojet', [\App\Http\Controllers\Programme2Controller::class, 'typeprojet']);

Route::get('programmes3', [\App\Http\Controllers\Programme3Controller::class, 'getProgramme']);
Route::get('programmes3/{id}', [\App\Http\Controllers\Programme3Controller::class, 'getProgrammeById']);
Route::post('/addProgramme3',  [\App\Http\Controllers\Programme3Controller::class, 'addProgramme']);
Route::put('updateProgramme3/{id}',  [\App\Http\Controllers\Programme3Controller::class, 'updateProgramme']);
Route::delete('deleteProgramme3/{id}',  [\App\Http\Controllers\Programme3Controller::class, 'deleteProgramme']);

Route::get('baht/search_progr', [\App\Http\Controllers\Programme3Controller::class, 'rechercheProg']);
Route::get('baht/search_enn', [\App\Http\Controllers\Programme3Controller::class, 'rechercheEnn']);
Route::get('baht/search_intutle', [\App\Http\Controllers\Programme3Controller::class, 'rechercheIntitu']);
Route::get('baht/search_typeprojet', [\App\Http\Controllers\Programme3Controller::class, 'typeprojet']);

Route::get('programmes4', [\App\Http\Controllers\Programme4Controller::class, 'getProgramme']);
Route::get('programmes4/{id}', [\App\Http\Controllers\Programme4Controller::class, 'getProgrammeById']);
Route::post('/addProgramme4',  [\App\Http\Controllers\Programme4Controller::class, 'addProgramme']);
Route::put('updateProgramme4/{id}',  [\App\Http\Controllers\Programme4Controller::class, 'updateProgramme']);
Route::delete('deleteProgramme4/{id}',  [\App\Http\Controllers\Programme4Controller::class, 'deleteProgramme']);


Route::get('lookup/search_progr', [\App\Http\Controllers\Programme4Controller::class, 'rechercheProg']);
Route::get('lookup/search_enn', [\App\Http\Controllers\Programme4Controller::class, 'rechercheEnn']);
Route::get('lookup/search_intutle', [\App\Http\Controllers\Programme4Controller::class, 'rechercheIntitu']);
Route::get('lookup/search_typeprojet', [\App\Http\Controllers\Programme4Controller::class, 'typeprojet']);


Route::get('annees', [\App\Http\Controllers\AnneeController::class, 'getannee']);
Route::get('annees/{id}', [\App\Http\Controllers\AnneeController::class, 'getanneeById']);
Route::post('/addAnnee',  [\App\Http\Controllers\AnneeController::class, 'addannee']);
Route::put('updatAnnee/{id}',  [\App\Http\Controllers\AnneeController::class, 'updateannee']);
Route::delete('deleteAnnee/{id}',  [\App\Http\Controllers\AnneeController::class, 'deleteannee']);



Route::get('recherche/search_prog', [\App\Http\Controllers\Programme1Controller::class, 'rechercheInti']);
Route::get('recherche/search_annn', [\App\Http\Controllers\Programme1Controller::class, 'rechercheAnnee']);
Route::get('getP1', [\App\Http\Controllers\UsergcController::class, 'getP1']);
Route::get('getP2', [\App\Http\Controllers\UsergcController::class, 'getP2']);
Route::get('getP3', [\App\Http\Controllers\UsergcController::class, 'getP3']);
Route::get('getP4', [\App\Http\Controllers\UsergcController::class, 'getP4']);
Route::get('getcountP1', [\App\Http\Controllers\UsergcController::class, 'getcountP1']);
Route::get('getcountP2', [\App\Http\Controllers\UsergcController::class, 'getcountP2']);
Route::get('getcountP3', [\App\Http\Controllers\UsergcController::class, 'getcountP3']);
Route::get('getcountP4', [\App\Http\Controllers\UsergcController::class, 'getcountP4']);

Route::get('getlastids', [\App\Http\Controllers\Programme1Controller::class, 'getlastid']);
Route::get('getlastidss', [\App\Http\Controllers\Programme2Controller::class, 'getlastid']);
Route::get('getlastidsss', [\App\Http\Controllers\Programme3Controller::class, 'getlastid']);
Route::get('getlastidssss', [\App\Http\Controllers\Programme4Controller::class, 'getlastid']);

Route::get('recherche/search_program', [\App\Http\Controllers\Programme1Controller::class, 'rechercheProgrammes']);

Route::get('validates', [\App\Http\Controllers\ValidateController::class, 'getValidate']);
Route::get('validates/{id}', [\App\Http\Controllers\ValidateController::class, 'getValidateById']);
Route::post('/addValidate',  [\App\Http\Controllers\ValidateController::class, 'addValidate']);
Route::put('updateValidate/{id}',  [\App\Http\Controllers\ValidateController::class, 'updateValidate']);
Route::delete('deleteValidate/{id}',  [\App\Http\Controllers\ValidateController::class, 'deleteValidate']);

Route::get('countprogramme1', [\App\Http\Controllers\Programme1Controller::class, 'getcountProgramme1']);
Route::get('countprogramme2', [\App\Http\Controllers\Programme1Controller::class, 'getcountProgramme2']);
Route::get('countprogramme3', [\App\Http\Controllers\Programme1Controller::class, 'getcountProgramme3']);
Route::get('countprogramme4', [\App\Http\Controllers\Programme1Controller::class, 'getcountProgramme4']);
Route::get('countPdh', [\App\Http\Controllers\Programme1Controller::class, 'getcountPdh']);
Route::get('countsppdh', [\App\Http\Controllers\Programme1Controller::class, 'getcountsppdh']);



Route::get('files', [\App\Http\Controllers\FileController::class, 'getFiles']);
Route::get('files/{id}', [\App\Http\Controllers\FileController::class, 'getFilesbyId']);
Route::post('/addFiles',  [\App\Http\Controllers\FileController::class, 'addFiles']);
Route::put('updateFile/{id}',  [\App\Http\Controllers\FileController::class, 'updateFiles']);
Route::delete('deleteFile/{id}',  [\App\Http\Controllers\FileController::class, 'deleteFiles']);
Route::get('/files/filedocs/{id}', [App\Http\Controllers\FileController::class, 'showFileDocbyId']);


Route::get('filedocs', [\App\Http\Controllers\FileDocController::class, 'getFileDocs']);
Route::get('filedocs/{id}', [\App\Http\Controllers\FileDocController::class, 'getFileDocsbyId']);
Route::post('/addFiledocs',  [\App\Http\Controllers\FileDocController::class, 'addFileDocs']);

Route::get('activiteroyals', [\App\Http\Controllers\ActiviteroyalController::class, 'getActiviteroyal']);
Route::get('activiteroyals/{id}', [\App\Http\Controllers\ActiviteroyalController::class, 'getActiviteroyalById']);
Route::post('/addActivites',  [\App\Http\Controllers\ActiviteroyalController::class, 'addActiviteroyal']);
Route::put('updateActivites/{id}',  [\App\Http\Controllers\ActiviteroyalController::class, 'updateActiviteroyal']);
Route::delete('deleteActivites/{id}',  [\App\Http\Controllers\ActiviteroyalController::class, 'deleteActiviteroyal']);

Route::get('recherche/search_visite', [\App\Http\Controllers\ActiviteroyalController::class, 'searchvisite']);
Route::get('recherche/search_commun', [\App\Http\Controllers\ActiviteroyalController::class, 'recherchecommun']);
Route::get('recherche/search_sector', [\App\Http\Controllers\ActiviteroyalController::class, 'recherchecsector']);

Route::post('/upload-content-with-package', [\App\Http\Controllers\Programme1Controller::class, 'uploadContentWithPackage']);
Route::get('file-import-export', [\App\Http\Controllers\Programme1Controller::class, 'fileImportExport']);
Route::post('/addfileimport', [\App\Http\Controllers\Programme1Controller::class, 'fileImport']);

Route::post('/addfileimportprog2', [\App\Http\Controllers\Programme2Controller::class, 'fileImport']);
Route::post('/addfileimportprog3', [\App\Http\Controllers\Programme3Controller::class, 'fileImport']);
Route::post('/addfileimportprog4', [\App\Http\Controllers\Programme4Controller::class, 'fileImport']);

Route::post('/addimport', [\App\Http\Controllers\AuthController::class, 'fileImported']);


Route::get('/roles', [\App\Http\Controllers\RoleController::class, 'getRole']);
Route::get('role/{id}', [\App\Http\Controllers\RoleController::class, 'getRoleById']);
Route::post('/addRole', [\App\Http\Controllers\RoleController::class, 'addRole']);
Route::put('updateRole/{id}', [\App\Http\Controllers\RoleController::class, 'updateRole']);
Route::delete('deleteRole/{id}', [\App\Http\Controllers\RoleController::class, 'deleteRole']);
Route::get('/userRole/{id}', [\App\Http\Controllers\RoleController::class, 'showUserRolebyId']);
