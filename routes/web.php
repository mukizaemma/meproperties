<?php

use App\Livewire\admin\Dashboard;
use App\Livewire\front\AboutUs;
use App\Livewire\front\Home;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/agent',Dashboard::class)->name('admin');
    Route::get('/logouts', [App\Http\Controllers\AdminController::class, 'logouts'])->name('logouts');
    Route::get('/Users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/Users/{id}', [App\Http\Controllers\AdminController::class, 'makeAdmin'])->name('makeAdmin');
    Route::get('/deleteUser/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser');

 
    Route::get('/Comments', [App\Http\Controllers\AdminController::class, 'blogsComment'])->name('blogsComment');
    Route::post('/Comment/approve/{comment}', [App\Http\Controllers\AdminController::class, 'commentApprove'])->name('commentApprove');
    Route::get('/CommentDelete/{id}', [App\Http\Controllers\AdminController::class, 'destroyBlogComment'])->name('destroyBlogComment');

    Route::get('/Subscribers', [App\Http\Controllers\AdminController::class, 'subscribers'])->name('subscribers');
    Route::get('/Subscribers/{id}', [App\Http\Controllers\AdminController::class, 'destroySub'])->name('destroySub');

    Route::get('/getMessages', [App\Http\Controllers\AdminController::class, 'getMessages'])->name('getMessages');
    Route::get('/deleteMessages/{id}', [App\Http\Controllers\AdminController::class, 'deleteMessages'])->name('deleteMessages');

    
    Route::get('/setting',[App\Http\Controllers\SettingsController::class,'setting'])->name('setting');
    Route::post('/saveSetting',[App\Http\Controllers\SettingsController::class,'saveSetting'])->name('saveSetting');
    
    Route::get('/homePage',[App\Http\Controllers\SettingsController::class,'homePage'])->name('homePage');
    Route::post('/saveHome',[App\Http\Controllers\SettingsController::class,'saveHome'])->name('saveHome');
    
    Route::get('/aboutPage',[App\Http\Controllers\SettingsController::class,'aboutPage'])->name('aboutPage');
    Route::post('/saveAbout',[App\Http\Controllers\SettingsController::class,'saveAbout'])->name('saveAbout');

    Route::get('/eventsPage',[App\Http\Controllers\PagesController::class,'eventsPage'])->name('eventsPage');
    Route::post('/saveEvent',[App\Http\Controllers\PagesController::class,'saveEvent'])->name('saveEvent');    
    Route::post('/addEventImage', [App\Http\Controllers\PagesController::class, 'addEventImage'])->name('addEventImage');
    Route::get('/deleteEventImage/{id}', [App\Http\Controllers\PagesController::class, 'deleteEventImage'])->name('deleteEventImage');

    Route::get('/restoPage',[App\Http\Controllers\PagesController::class,'resto'])->name('resto');
    Route::post('/updateRestaurant',[App\Http\Controllers\PagesController::class,'saveResto'])->name('saveResto');    
    Route::post('/addRestoImage', [App\Http\Controllers\PagesController::class, 'addRestoImage'])->name('addRestoImage');
    Route::get('/deleteRestoImage/{id}', [App\Http\Controllers\PagesController::class, 'deleteRestoImage'])->name('deleteRestoImage');
    

        
    // Categories
    Route::get('/get-categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('getCategories');
    Route::post('/post-category', [App\Http\Controllers\CategoriesController::class, 'store'])->name('postCategory');
    Route::get('/edit-category/{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('editCategory');
    Route::post('/update-category/{id}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('updateCategory');
    Route::get('/delete-category/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('deleteCategory');
        
    // Categories
    Route::get('/get-services', [App\Http\Controllers\ServicesController::class, 'index'])->name('getServices');
    Route::post('/post-service', [App\Http\Controllers\ServicesController::class, 'store'])->name('postService');
    Route::get('/edit-service/{id}', [App\Http\Controllers\ServicesController::class, 'edit'])->name('editService');
    Route::post('/update-service/{id}', [App\Http\Controllers\ServicesController::class, 'update'])->name('updateService');
    Route::get('/delete-service/{id}', [App\Http\Controllers\ServicesController::class, 'destroy'])->name('deleteService');
        
    // BLogs
    Route::get('/getBlogs', [App\Http\Controllers\BlogsController::class, 'index'])->name('getBlogs');
    Route::post('/saveBlog', [App\Http\Controllers\BlogsController::class, 'store'])->name('saveBlog');
    Route::get('/blog/{id}', [App\Http\Controllers\BlogsController::class, 'edit'])->name('editBlog');
    Route::get('/blogView/{id}', [App\Http\Controllers\BlogsController::class, 'view'])->name('viewBlog');
    Route::post('/updateBlog/{id}', [App\Http\Controllers\BlogsController::class, 'update'])->name('updateBlog');
    Route::get('/deleteBlog/{id}', [App\Http\Controllers\BlogsController::class, 'destroy'])->name('deleteBlog');
    Route::get('/Blog/{blog}/publish', [App\Http\Controllers\BlogsController::class, 'publish'])->name('publishBlog');


    // Services
    Route::get('/get-subscriptions', [App\Http\Controllers\SubscriptionsController::class, 'index'])->name('getSubscriptions');
    Route::post('/store-subscription', [App\Http\Controllers\SubscriptionsController::class, 'store'])->name('storeSubscription');
    Route::get('/Edit-subscription/{id}', [App\Http\Controllers\SubscriptionsController::class, 'edit'])->name('editSubscription');
    Route::post('/Update-subscription/{id}', [App\Http\Controllers\SubscriptionsController::class, 'update'])->name('updateSubscription');
    Route::get('/Delete-subscription/{id}', [App\Http\Controllers\SubscriptionsController::class, 'destroy'])->name('deleteSubscription');

    // Services
    Route::get('/get-cars', [App\Http\Controllers\CarsController::class, 'index'])->name('getCars');
    Route::post('/store-car', [App\Http\Controllers\CarsController::class, 'store'])->name('storeCar');
    Route::get('/edit-car/{id}', [App\Http\Controllers\CarsController::class, 'edit'])->name('editCar');
    Route::post('/Update-car/{id}', [App\Http\Controllers\CarsController::class, 'update'])->name('updateCar');
    Route::get('/Delete-car/{id}', [App\Http\Controllers\CarsController::class, 'destroy'])->name('deleteCar');
    Route::post('/addCarImage', [App\Http\Controllers\CarsController::class, 'addCarImage'])->name('addCarImage');
    Route::get('/deleteCarImage/{id}', [App\Http\Controllers\CarsController::class, 'deleteCarImage'])->name('deleteCarImage');
    
    // Rooms
    Route::get('/get-properties', [App\Http\Controllers\PropertiesController::class, 'index'])->name('getProperties');
    Route::post('/store-property', [App\Http\Controllers\PropertiesController::class, 'store'])->name('storeProperty');
    Route::get('/edit-property/{id}', [App\Http\Controllers\PropertiesController::class, 'edit'])->name('editProperty');
    Route::post('/update-property/{id}', [App\Http\Controllers\PropertiesController::class, 'update'])->name('updateProperty');
    Route::get('/delete-property/{id}', [App\Http\Controllers\PropertiesController::class, 'destroy'])->name('deleteProperty');

    Route::post('/add-property-image', [App\Http\Controllers\PropertiesController::class, 'addPropertyImage'])->name('addPropertyImage');
    Route::get('/delete-property-image/{id}', [App\Http\Controllers\PropertiesController::class, 'deletePropertyImage'])->name('deletePropertyImage');

    // Deals
    Route::get('/get-products', [App\Http\Controllers\DealsController::class, 'index'])->name('getDeals');
    Route::post('/store-product', [App\Http\Controllers\DealsController::class, 'store'])->name('storeDeal');
    Route::get('/edit-product/{id}', [App\Http\Controllers\DealsController::class, 'edit'])->name('editDeal');
    Route::post('/update-product/{id}', [App\Http\Controllers\DealsController::class, 'update'])->name('updateDeal');
    Route::get('/delete-product/{id}', [App\Http\Controllers\DealsController::class, 'destroy'])->name('deleteDeal');

    Route::post('/add-product-image', [App\Http\Controllers\DealsController::class, 'addDealImage'])->name('addDealImage');
    Route::get('/delete-product-image/{id}', [App\Http\Controllers\DealsController::class, 'deleteDealImage'])->name('deleteDealImage');


    // Promotions
    Route::get('/getPromotions', [App\Http\Controllers\PromotionsController::class, 'index'])->name('getPromotions');
    Route::post('/storePromotion', [App\Http\Controllers\PromotionsController::class, 'store'])->name('storePromotion');
    Route::get('/editPromotion/{id}', [App\Http\Controllers\PromotionsController::class, 'edit'])->name('editPromotion');
    Route::post('/updatePromotion/{id}', [App\Http\Controllers\PromotionsController::class, 'update'])->name('updatePromotion');
    Route::get('/deletePromotion/{id}', [App\Http\Controllers\PromotionsController::class, 'destroy'])->name('deletePromotion');
    // Projects
    Route::get('/getPosts', [App\Http\Controllers\OpportunitiesController::class, 'index'])->name('getPosts');
    Route::post('/storePost', [App\Http\Controllers\OpportunitiesController::class, 'store'])->name('storePost');
    Route::get('/EditPost/{id}', [App\Http\Controllers\OpportunitiesController::class, 'edit'])->name('editPost');
    Route::post('/UpdatePost/{id}', [App\Http\Controllers\OpportunitiesController::class, 'update'])->name('updatePost');
    Route::get('/DeletePost/{id}', [App\Http\Controllers\OpportunitiesController::class, 'destroy'])->name('deletePost');
    // Route::get('/DeleteallProjects', [App\Http\Controllers\OpportunitiesController::class, 'deleteAllProjects'])->name('deleteAllProjects');


    // Gallery
    Route::get('/slides', [App\Http\Controllers\SlidesController::class, 'index'])->name('slides');
    Route::post('/saveSlide', [App\Http\Controllers\SlidesController::class, 'store'])->name('saveSlide');
    Route::get('/editSlide/{id}', [App\Http\Controllers\SlidesController::class, 'edit'])->name('editSlide');
    Route::post('/updateSlide/{id}', [App\Http\Controllers\SlidesController::class, 'update'])->name('updateSlide');
    Route::get('/destroySlide/{id}', [App\Http\Controllers\SlidesController::class, 'destroy'])->name('destroySlide');

    // Images
    Route::get('/images', [App\Http\Controllers\ImagesController::class, 'index'])->name('images');
    Route::post('/saveImage', [App\Http\Controllers\ImagesController::class, 'store'])->name('saveImage');
    Route::get('/editImage/{id}', [App\Http\Controllers\ImagesController::class, 'edit'])->name('editImage');
    Route::post('/updateImage/{id}', [App\Http\Controllers\ImagesController::class, 'update'])->name('updateImage');
    Route::get('/destroyImage/{id}', [App\Http\Controllers\ImagesController::class, 'destroy'])->name('destroyImage');
    // Gallery
    Route::get('/getPartners', [App\Http\Controllers\PartnersController::class, 'index'])->name('getPartners');
    Route::post('/savePartner', [App\Http\Controllers\PartnersController::class, 'store'])->name('savePartner');
    Route::get('/editPartner/{id}', [App\Http\Controllers\PartnersController::class, 'edit'])->name('editPartner');
    Route::post('/updatePartner/{id}', [App\Http\Controllers\PartnersController::class, 'update'])->name('updatePartner');
    Route::get('/destroyPartner/{id}', [App\Http\Controllers\PartnersController::class, 'destroy'])->name('destroyPartner');

    // Gallery
    Route::get('/getImages', [App\Http\Controllers\SlidesController::class, 'getImages'])->name('getImages');
    Route::post('/saveGallery', [App\Http\Controllers\SlidesController::class, 'saveImage'])->name('saveGallery');
    Route::get('/editGallery/{id}', [App\Http\Controllers\SlidesController::class, 'editGallery'])->name('editGallery');
    Route::post('/updateGallery/{id}', [App\Http\Controllers\SlidesController::class, 'updateGallery'])->name('updateGallery');
    Route::get('/destroyImage/{id}', [App\Http\Controllers\SlidesController::class, 'destroyImage'])->name('destroyImage');
    

});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/', Home::class)->name('home');
Route::get('/aboutUs', AboutUs::class)->name('aboutUs');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/our-pricing', [App\Http\Controllers\HomeController::class, 'pricing'])->name('pricing');
Route::get('/our-rooms', [App\Http\Controllers\HomeController::class, 'rooms'])->name('rooms');
Route::get('/terms-and-conditions', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms');
Route::get('/properties-search', [App\Http\Controllers\HomeController::class, 'propertySearch'])->name('propertySearch');
Route::get('/featured-properties', [App\Http\Controllers\HomeController::class, 'properties'])->name('properties');
Route::get('/featured-properties/{slug}', [App\Http\Controllers\HomeController::class, 'property'])->name('property');
Route::get('/recent-projects', [App\Http\Controllers\HomeController::class, 'projects'])->name('projects');
Route::get('/recent-projects/{slug}', [App\Http\Controllers\HomeController::class, 'project'])->name('project');
Route::get('/featured-cars', [App\Http\Controllers\HomeController::class, 'cars'])->name('cars');
Route::get('/featured-cars/{slug}', [App\Http\Controllers\HomeController::class, 'car'])->name('car');
Route::get('/featured-products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/featured-products/{slug}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/our-services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/our-services/{slug}', [App\Http\Controllers\HomeController::class, 'service'])->name('service');
Route::get('/articles', [App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');
Route::get('/article/{slug}', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');

Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'adminLogin'])->name('adminLogin');
Route::get('/user/account', [App\Http\Controllers\HomeController::class, 'newAccount'])->name('newAccount');
Route::post('/createAccount', [App\Http\Controllers\HomeController::class, 'createAccount'])->name('createAccount');

Route::get('/connect', [App\Http\Controllers\HomeController::class, 'connect'])->name('connect');




// user sign up

Route::get('/getSignup', [App\Http\Controllers\HomeController::class, 'getSignup'])->name('getSignup');
Route::post('/Signup', [App\Http\Controllers\HomeController::class, 'signup'])->name('signup');
Route::get('/Signin', [App\Http\Controllers\HomeController::class, 'signin'])->name('signin');
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'adminLogin'])->name('adminLogin');
Route::get('/logouts', [App\Http\Controllers\HomeController::class, 'logouts'])->name('logouts');
Route::post('/subscribe', [App\Http\Controllers\HomeController::class, 'subscribe'])->name('subscribe');

Route::post('/sendMessage', [App\Http\Controllers\HomeController::class, 'sendMessage'])->name('sendMessage');
Route::post('/sendComment', [App\Http\Controllers\HomeController::class, 'sendComment'])->name('sendComment');
Route::post('/registerNow', [App\Http\Controllers\HomeController::class, 'registerNow'])->name('registerNow');
Route::post('/testimony', [App\Http\Controllers\HomeController::class, 'testimony'])->name('testimony');

