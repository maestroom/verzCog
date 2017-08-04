<?php
Auth::routes();

        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');


        $this->get('user/login', 'Auth\LoginController@showLoginForm')->name('Userlogin');
        $this->post('user/login', 'Auth\LoginController@login');


        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/welcome', 'EmailFrontController@index')->name('Email');

//Route::get('/quiz','QuizFrontController@index')->name('quizFront');
Route::get('/','QuizFrontController@index')->name('quizFront');
Route::post('/store/','QuizFrontController@store')->name('quizFrontStore');


Route::get('/','QuizFrontController@index')->name('quizFront');
Route::post('/store/','QuizFrontController@store')->name('quizFrontStore');


Route::get('/users/edit', 'UsersFrontController@edit')->name('usersFrontEdit');
Route::get('/users/bookmarked', 'UsersFrontController@userBookmarked')->name('userBookmarked');

Route::get('/users/givingprofile', 'UsersFrontController@givingProfile')->name('givingProfile');
Route::post('/users/givingprofile/','UsersFrontController@GetgivingProfile')->name('GetgivingProfile');





Route::get('/getinvolved','GetinvolvedFrontController@index')->name('getinvolvedfront');
Route::get('/getinvolved/create/', 'GetinvolvedFrontController@create')->name('getinvolvedCreatefront');
Route::post('/getinvolved/store', 'GetinvolvedFrontController@store')->name('getinvolvedStorefront');







Route::post('/users/update', 'UsersFrontController@update')->name('usersFrontUpdate');
Route::get('/users/destroy', 'UsersFrontController@destroy')->name('usersFrontDestroy');





//Route::get('/', 'FrontendHomeController@HomePage')->name('Home');


Route::group(array('prefix' => 'admin'), function() {

    Route::get('/403', function () {
        return view('errors.403');
    })->name('NoPermission');


    Route::get('/404', function () {
        return view('errors.404');
    })->name('NotFound');


    Route::get('/', 'HomeController@index')->name('adminHome');

    Route::get('/emailtemplates','EmailTemplatesController@index')->name('emailtemplates');
    Route::get('/emailtemplates/create/', 'EmailTemplatesController@create')->name('emailtemplatesCreate');
    Route::post('/emailtemplates/store', 'EmailTemplatesController@store')->name('emailtemplatesStore');
    Route::get('/emailtemplates/{id}/edit', 'EmailTemplatesController@edit')->name('emailtemplatesEdit');
    Route::post('/emailtemplates/{id}/update', 'EmailTemplatesController@update')->name('emailtemplatesUpdate');
    Route::get('/emailtemplates/destroy/{id}', 'EmailTemplatesController@destroy')->name('emailtemplatesDestroy');


    Route::get('/events','EventsController@index')->name('events');
    Route::get('/events/create/', 'EventsController@create')->name('eventsCreate');
    Route::post('/events/store', 'EventsController@store')->name('eventsStore');
    Route::get('/events/{id}/edit', 'EventsController@edit')->name('eventsEdit');
    Route::post('/events/{id}/update', 'EventsController@update')->name('eventsUpdate');
    Route::get('/events/destroy/{id}', 'EventsController@destroy')->name('eventsDestroy');
    Route::get('/events/topic/create/', 'EventsController@createTopic')->name('eventsCreateTopic');
    Route::get('/events/topic/all/', 'EventsController@AllTopic')->name('eventsAllTopic');
    Route::post('/events/topic/store', 'EventsController@storeTopic')->name('eventsStoreTopic');
    Route::get('/events/topic/{id}/edit', 'EventsController@editTopic')->name('eventsEditTopic');
    Route::post('/events/topic/{id}/update', 'EventsController@updateTopic')->name('eventsUpdateTopic');
    Route::get('/events/topic/destroy/{id}', 'EventsController@destroyTopic')->name('eventsDestroyTopic');


    Route::get('/fellowship','FellowshipController@index')->name('fellowship');
    Route::get('/fellowship/create/', 'FellowshipController@create')->name('fellowshipCreate');
    Route::post('/fellowship/store', 'FellowshipController@store')->name('fellowshipStore');
    Route::get('/fellowship/{id}/edit', 'FellowshipController@edit')->name('fellowshipEdit');
    Route::post('/fellowship/{id}/update', 'FellowshipController@update')->name('fellowshipUpdate');
    Route::get('/fellowship/destroy/{id}', 'FellowshipController@destroy')->name('fellowshipDestroy');
    
    Route::get('/championship','ChampionshipController@index')->name('championship');
    Route::get('/championship/create/', 'ChampionshipController@create')->name('championshipCreate');
    Route::post('/championship/store', 'ChampionshipController@store')->name('championshipStore');
    Route::get('/championship/{id}/edit', 'ChampionshipController@edit')->name('championshipEdit');
    Route::post('/championship/{id}/update', 'ChampionshipController@update')->name('championshipUpdate');
    Route::get('/championship/destroy/{id}', 'ChampionshipController@destroy')->name('championshipDestroy');


    Route::get('/tags','TagsController@index')->name('tags');
    Route::get('/tags/create/', 'TagsController@create')->name('tagsCreate');
    Route::post('/tags/store', 'TagsController@store')->name('tagsStore');
    Route::get('/tags/{id}/edit', 'TagsController@edit')->name('tagsEdit');
    Route::post('/tags/{id}/update', 'TagsController@update')->name('tagsUpdate');
    Route::get('/tags/destroy/{id}', 'TagsController@destroy')->name('tagsDestroy');



    Route::get('/company','CompanyController@index')->name('company');
    Route::get('/company/create/', 'CompanyController@create')->name('companyCreate');
    Route::post('/company/store', 'CompanyController@store')->name('companyStore');
    Route::get('/company/{id}/edit', 'CompanyController@edit')->name('companyEdit');
    Route::post('/company/{id}/update', 'CompanyController@update')->name('companyUpdate');
    Route::get('/company/destroy/{id}', 'CompanyController@destroy')->name('companyDestroy');


    Route::get('/testimonial','TestimonialController@index')->name('testimonial');
    Route::get('/testimonial/create/','TestimonialController@create')->name('testimonialCreate');
    Route::post('/testimonial/store/','TestimonialController@store')->name('testimonialStore');
    Route::get('/testimonial/{id}/edit', 'TestimonialController@edit')->name('testimonialEdit');
    Route::post('/testimonial/{id}/update', 'TestimonialController@update')->name('testimonialUpdate');
    Route::get('/testimonial/destroy/{id}', 'TestimonialController@destroy')->name('testimonialDestroy');



    Route::get('/quiz','QuizController@index')->name('quiz');
    Route::get('/quiz/create/','QuizController@create')->name('quizCreate');
    Route::post('/quiz/store/','QuizController@store')->name('quizStore');
    Route::get('/quiz/{id}/edit', 'QuizController@edit')->name('quizEdit');
    Route::post('/quiz/{id}/update', 'QuizController@update')->name('quizUpdate');
    Route::get('/quiz/destroy/{id}', 'QuizController@destroy')->name('quizDestroy');
    Route::get('/quizQuestions/quiz/{id}','QuizController@quizQuestionsindex')->name('quizQuestions');
    Route::get('/quizQuestions/create/{id}','QuizController@quizQuestionscreate')->name('quizQuestionsCreate');
    Route::post('/quizQuestions/store/','QuizController@quizQuestionsstore')->name('quizQuestionsStore');
    Route::get('/quizQuestions/{id}/edit', 'QuizController@quizQuestionsedit')->name('quizQuestionsEdit');
    Route::post('/quizQuestions/{id}/update', 'QuizController@quizQuestionsupdate')->name('quizQuestionsUpdate');
    Route::get('/quizQuestions/destroy/{id}', 'QuizController@quizQuestionsdestroy')->name('quizQuestionsDestroy');
    Route::get('/quizAnswers/quizQuestion/{quiz_id}/{id}','QuizController@quizAnswersindex')->name('quizAnswers');
    Route::get('/quizAnswers/create/{quiz_id}/{id}','QuizController@quizAnswerscreate')->name('quizAnswersCreate');
    Route::post('/quizAnswers/store/','QuizController@quizAnswersstore')->name('quizAnswersStore');
    Route::get('/quizAnswers/{question_id}/edit/{id}', 'QuizController@quizAnswersedit')->name('quizAnswersEdit');
    Route::post('/quizAnswers/{id}/update', 'QuizController@quizAnswersupdate')->name('quizAnswersUpdate');
    Route::get('/quizAnswers/destroy/{id}', 'QuizController@quizAnswersdestroy')->name('quizAnswersDestroy');

    Route::get('/quizresults','QuizController@userQuizResults')->name('quizresults');
/*    Route::get('/quizresults/create/','QuizController@create')->name('quizCreate');
    Route::post('/quizresults/store/','QuizController@store')->name('quizStore');
    Route::get('/quizresults/{id}/edit', 'QuizController@edit')->name('quizEdit');
    Route::post('/quizresults/{id}/update', 'QuizController@update')->name('quizUpdate');*/
    Route::get('/quizresults/destroy/{id}', 'QuizController@userQuizResultsdestroy')->name('quizresultsDestroy');



    Route::get('/faq','FaqController@index')->name('faq');
    Route::get('/faq/create/','FaqController@create')->name('faqCreate');
    Route::post('/faq/store/','FaqController@store')->name('faqStore');
    Route::get('/faq/{id}/edit', 'FaqController@edit')->name('faqEdit');
    Route::post('/faq/{id}/update', 'FaqController@update')->name('faqUpdate');
    Route::get('/faq/destroy/{id}', 'FaqController@destroy')->name('faqDestroy');
    Route::get('/faqQuestions/faq/{id}','FaqController@faqQuestionsindex')->name('faqQuestions');
    Route::get('/faqQuestions/create/{id}','FaqController@faqQuestionscreate')->name('faqQuestionsCreate');
    Route::post('/faqQuestions/store/','FaqController@faqQuestionsstore')->name('faqQuestionsStore');
    Route::get('/faqQuestions/{id}/edit', 'FaqController@faqQuestionsedit')->name('faqQuestionsEdit');
    Route::post('/faqQuestions/{id}/update', 'FaqController@faqQuestionsupdate')->name('faqQuestionsUpdate');
    Route::get('/faqQuestions/destroy/{id}', 'FaqController@faqQuestionsdestroy')->name('faqQuestionsDestroy');
    Route::get('/faqAnswers/faqQuestion/{faq_id}/{id}','FaqController@faqAnswersindex')->name('faqAnswers');
    Route::get('/faqAnswers/create/{faq_id}/{id}','FaqController@faqAnswerscreate')->name('faqAnswersCreate');
    Route::post('/faqAnswers/store/','FaqController@faqAnswersstore')->name('faqAnswersStore');
    Route::get('/faqAnswers/{question_id}/edit/{id}', 'FaqController@faqAnswersedit')->name('faqAnswersEdit');
    Route::post('/faqAnswers/{id}/update', 'FaqController@faqAnswersupdate')->name('faqAnswersUpdate');
    Route::get('/faqAnswers/destroy/{id}', 'FaqController@faqAnswersdestroy')->name('faqAnswersDestroy');



    Route::get('/partners','PartnersController@index')->name('partners');
    Route::get('/partners/create/','PartnersController@create')->name('partnersCreate');
    Route::post('/partners/store/','PartnersController@store')->name('partnersStore');
    Route::get('/partners/{id}/edit', 'PartnersController@edit')->name('partnersEdit');
    Route::post('/partners/{id}/update', 'PartnersController@update')->name('partnersUpdate');
    Route::get('/partners/destroy/{id}', 'PartnersController@destroy')->name('partnersDestroy');



    Route::get('/banners','BannersController@index')->name('banners');
    Route::get('/banners/create/','BannersController@create')->name('bannersCreate');
    Route::post('/banners/store/','BannersController@store')->name('bannersStore');
    Route::get('/banners/{id}/edit', 'BannersController@edit')->name('bannersEdit');
    Route::post('/banners/{id}/update', 'BannersController@update')->name('bannersUpdate');
    Route::get('/banners/destroy/{id}', 'BannersController@destroy')->name('bannersDestroy');


    Route::get('/founders','FoundersController@index')->name('founders');
    Route::get('/founders/create/','FoundersController@create')->name('foundersCreate');
    Route::post('/founders/store/','FoundersController@store')->name('foundersStore');
    Route::get('/founders/{id}/edit', 'FoundersController@edit')->name('foundersEdit');
    Route::post('/founders/{id}/update', 'FoundersController@update')->name('foundersUpdate');
    Route::get('/founders/destroy/{id}', 'FoundersController@destroy')->name('foundersDestroy');

    Route::get('/resources','ResourcesController@index')->name('resources');
    Route::get('/resources/create/', 'ResourcesController@create')->name('resourcesCreate');
    Route::post('/resources/store', 'ResourcesController@store')->name('resourcesStore');
    Route::get('/resources/{id}/edit', 'ResourcesController@edit')->name('resourcesEdit');
    Route::post('/resources/{id}/update', 'ResourcesController@update')->name('resourcesUpdate');
    Route::get('/resources/destroy/{id}', 'ResourcesController@destroy')->name('resourcesDestroy');
    Route::get('/resources/topic/create/', 'ResourcesController@createTopic')->name('resourcesCreateTopic');
    Route::get('/resources/topic/all/', 'ResourcesController@AllTopic')->name('resourcesAllTopic');
    Route::post('/resources/topic/store', 'ResourcesController@storeTopic')->name('resourcesStoreTopic');
    Route::get('/resources/topic/{id}/edit', 'ResourcesController@editTopic')->name('resourcesEditTopic');
    Route::post('/resources/topic/{id}/update', 'ResourcesController@updateTopic')->name('resourcesUpdateTopic');
    Route::get('/resources/topic/destroy/{id}', 'ResourcesController@destroyTopic')->name('resourcesDestroyTopic');
    Route::get('/resources/download/{file_path}/{file_name}', 'ResourcesController@download')->name('resourcesDownload');




    Route::get('/stories','StoriesController@index')->name('stories');
    Route::get('/stories/users','StoriesController@users')->name('storiesUsers');
    Route::get('/stories/create/', 'StoriesController@create')->name('storiesCreate');
    Route::post('/stories/store', 'StoriesController@store')->name('storiesStore');
    Route::get('/stories/{id}/edit', 'StoriesController@edit')->name('storiesEdit');
    Route::post('/stories/{id}/update', 'StoriesController@update')->name('storiesUpdate');
    Route::get('/stories/destroy/{id}', 'StoriesController@destroy')->name('storiesDestroy');
    Route::get('/stories/topic/create/', 'StoriesController@createTopic')->name('storiesCreateTopic');
    Route::get('/stories/topic/all/', 'StoriesController@AllTopic')->name('storiesAllTopic');
    Route::post('/stories/topic/store', 'StoriesController@storeTopic')->name('storiesStoreTopic');
    Route::get('/stories/topic/{id}/edit', 'StoriesController@editTopic')->name('storiesEditTopic');
    Route::post('/stories/topic/{id}/update', 'StoriesController@updateTopic')->name('storiesUpdateTopic');
    Route::get('/stories/topic/destroy/{id}', 'StoriesController@destroyTopic')->name('storiesDestroyTopic');


    Route::get('/livefeed','LiveFeedController@index')->name('livefeed');
    Route::get('/analytics','AnalyticsController@tracking')->name('tracking');
    Route::post('/analytics/{stat}', 'AnalyticsController@filter')->name('analyticsFilter');
    Route::get('/analytics/{stat?}', 'AnalyticsController@index')->name('analytics');
    

    Route::get('/visitorssubscribed', 'UsersController@visitorsSubscribed')->name('visitorsSubscribed');

    // Users & Permissions
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/create/', 'UsersController@create')->name('usersCreate');
    Route::post('/users/store', 'UsersController@store')->name('usersStore');

    Route::post('/users/storecsr', 'UsersController@storeCsr')->name('usersStoreCsr');

    Route::get('/users/{id}/edit', 'UsersController@edit')->name('usersEdit');
    Route::post('/users/{id}/update', 'UsersController@update')->name('usersUpdate');
    Route::get('/users/destroy/{id}', 'UsersController@destroy')->name('usersDestroy');
    
    Route::post('/users/deleteall', 'UsersController@deleteAll')->name('deleteAll');

    Route::post('/users/updateAll', 'UsersController@updateAll')->name('usersUpdateAll');
    Route::get('/users/permissions/create/', 'UsersController@permissions_create')->name('permissionsCreate');
    Route::post('/users/permissions/store', 'UsersController@permissions_store')->name('permissionsStore');
    Route::get('/users/permissions/{id}/edit', 'UsersController@permissions_edit')->name('permissionsEdit');
    Route::post('/users/permissions/{id}/update', 'UsersController@permissions_update')->name('permissionsUpdate');
    Route::get('/users/permissions/destroy/{id}', 'UsersController@permissions_destroy')->name('permissionsDestroy');

});



