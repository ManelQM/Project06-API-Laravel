    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\UsersController;
    use App\Http\Controllers\GamesController;
    use App\Http\Controllers\MessagesController;
    use App\Http\Controllers\PartiesController;
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

   
            // ONCE UPON THE CRUD

            //USER
         
    Route::post('users/register', [AuthController::class, 'register']); 

    Route::post('users/login',[AuthController::class, 'login']);
            // USER MIDDLEWARE
    Route::group(['middleware' => ['jwt.auth']], function () {

//     Route::post('users/login',[AuthController::class, 'login']);
    Route::post('users/logout',[AuthController::class,'logout']);
    Route::get('users/myProfile',[AuthController::class,'myProfile']);   
    Route::put('users/myProfile/update', [UserController::class,'updateMyProfile']);
       
            //USER PARTY ENDPOINTS
            
    Route::get('users/myparties', [UsersController::class, 'getAllMyParties']);

           //USER GAME ENDPOINTS

    Route::get('users/mygames', [UsersController::class,'getAllMyGames']);

           //PARTY ENDPOINTS
    
    Route::post('parties/createparty', [PartiesController::class, 'createParty']); 
    Route::post('parties/newuser/{id}',[PartiesController::class, 'newUserToParty']);
    Route::delete('parties/delete/{id}', [PartiesController::class, 'deleteUserParty']); 
    
           //GAME ENDPOINT 

    Route::get('games/parties/{id}', [GamesController::class, 'getPartiesGame']);

              });

