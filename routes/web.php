<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MajorpostController;
use App\Http\Controllers\NewsphotoController;
use App\Http\Controllers\NewsvideoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EmailController;


/*this is site controller*/
Route::get('/', [siteController::class, 'index'])->name('home'); 

/*single news route*/
Route::get('singlenews/{id}', [siteController::class, 'singlenews'])->name('singlenews');
Route::get('singlemajornews/{id}', [siteController::class, 'singlemajornews'])->name('singlemajornews');
Route::get('singlenewsphoto/{id}', [siteController::class, 'singlenewsphoto'])->name('singlenewsphoto');
Route::get('our_team', [siteController::class, 'team'])->name('team');
Route::get('single_team/{id}', [siteController::class, 'single_team'])->name('single_team');

/*news photo & video*/
Route::get('news_video', [siteController::class, 'news_video'])->name('news_video');
Route::get('news_photo', [siteController::class, 'news_photo'])->name('news_photo');

/*category*/
Route::get('news/{id}', [siteController::class, 'news'])->name('news');
Route::get('subnews/{id}', [siteController::class, 'subnews'])->name('subnews');

/*Admin search*/
Route::get('search', [siteController::class, 'search'])->name('search');

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Admin Route*/
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

/*Title*/
Route::get('title', [TitleController::class, 'index'])->name('admin.title')->middleware('auth');
Route::get('addtitle', [TitleController::class, 'create'])->name('admin.addtitle')->middleware('auth');
Route::post('addtitle', [TitleController::class, 'store'])->name('admin.protitle')->middleware('auth');
Route::get('edittitle/{id}', [TitleController::class, 'edit'])->name('admin.edittitle')->middleware('auth');
Route::put('edittitle/{id}', [TitleController::class, 'update'])->name('admin.updatettitle')->middleware('auth');
Route::get('deletetitle/{id}', [TitleController::class, 'destroy'])->name('admin.deletettitle')->middleware('auth');

/*our team*/
Route::get('team', [TeamController::class, 'index'])->name('admin.team')->middleware('auth');
Route::get('addteam', [TeamController::class, 'create'])->name('admin.addteam')->middleware('auth');
Route::post('addteam', [TeamController::class, 'store'])->name('admin.proteam')->middleware('auth');
Route::get('editteam/{id}', [TeamController::class, 'edit'])->name('admin.editteam')->middleware('auth');
Route::put('editteam/{id}', [TeamController::class, 'update'])->name('admin.updateteam')->middleware('auth');
Route::get('deleteteam/{id}', [TeamController::class, 'destroy'])->name('admin.deleteteam')->middleware('auth');

/*Category*/
Route::get('category', [CategoryController::class, 'index'])->name('admin.category')->middleware('auth');
Route::get('addcategory', [CategoryController::class, 'create'])->name('admin.addcategory')->middleware('auth');
Route::post('addcategory', [CategoryController::class, 'store'])->name('admin.procategory')->middleware('auth');
Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('admin.editcategory')->middleware('auth');
Route::put('editcategory/{id}', [CategoryController::class, 'update'])->name('admin.updatecategory')->middleware('auth');
Route::get('deletecategory/{id}', [CategoryController::class, 'destroy'])->name('admin.deletecategory')->middleware('auth');

/*SubCategories*/
Route::get('subcategory', [SubcategoryController::class, 'index'])->name('admin.subcategory')->middleware('auth');
Route::get('addsubcategory', [SubcategoryController::class, 'create'])->name('admin.addsubcategory')->middleware('auth');
Route::post('addsubcategory', [SubcategoryController::class, 'store'])->name('admin.prosubcategory')->middleware('auth');
Route::get('addsubcategory/{id}', [SubcategoryController::class, 'edit'])->name('admin.editsubcategory')->middleware('auth');
Route::put('addsubcategory/{id}', [SubcategoryController::class, 'update'])->name('admin.updatesubcategory')->middleware('auth');
Route::get('deletesubcategory/{id}', [SubcategoryController::class, 'destroy'])->name('admin.deletesubcategory')->middleware('auth');

/*Admin*/
Route::get('adminlist', [AdminController::class, 'admin'])->name('admin.adminlist')->middleware('auth');
Route::get('addadmin', [AdminController::class, 'addadmin'])->name('admin.addadmin')->middleware('auth');
Route::post('addadmin', [AdminController::class, 'proadmin'])->name('admin.proadmin')->middleware('auth');
Route::get('adminlist/{id}', [AdminController::class, 'destroy'])->name('admin.deleteadmin')->middleware('auth');

/*Post*/
Route::get('post', [PostController::class, 'index'])->name('admin.post')->middleware('auth');
Route::get('addpost', [PostController::class, 'create'])->name('admin.addpost')->middleware('auth');
Route::post('addpost', [PostController::class, 'store'])->name('admin.propost')->middleware('auth');
Route::get('editpost/{id}', [PostController::class, 'edit'])->name('admin.editpost')->middleware('auth');
Route::put('editpost/{id}', [PostController::class, 'update'])->name('admin.updatepost')->middleware('auth');
Route::get('deletepost/{id}', [PostController::class, 'destroy'])->name('admin.destroypost')->middleware('auth');

/*javascript*/
Route::get('/getsubcat/{id}',[PostController::class, 'getsubcat']);

/*Major news*/
Route::get('majornews', [MajorpostController::class, 'index'])->name('admin.major')->middleware('auth');
Route::get('addmajornews', [MajorpostController::class, 'create'])->name('admin.addnews')->middleware('auth');
Route::post('addmajornews', [MajorpostController::class, 'store'])->name('admin.pronews')->middleware('auth');
Route::get('editmajornews/{id}', [MajorpostController::class, 'edit'])->name('admin.editnews')->middleware('auth');
Route::put('editmajornews/{id}', [MajorpostController::class, 'update'])->name('admin.updatenews')->middleware('auth');
Route::get('deletemajornews/{id}', [MajorpostController::class, 'destroy'])->name('admin.deletenews')->middleware('auth');

/*Newsphoto*/
Route::get('newsphoto', [NewsphotoController::class, 'index'])->name('admin.newsphoto')->middleware('auth');
Route::get('addnewsphoto', [NewsphotoController::class, 'create'])->name('admin.addnewsphoto')->middleware('auth');
Route::post('addnewsphoto', [NewsphotoController::class, 'store'])->name('admin.pronewsphoto')->middleware('auth');
Route::get('editnewsphoto/{id}', [NewsphotoController::class, 'edit'])->name('admin.editnewsphoto')->middleware('auth');
Route::put('editnewsphoto/{id}', [NewsphotoController::class, 'update'])->name('admin.updatenewsphoto')->middleware('auth');
Route::get('deletenewsphoto/{id}', [NewsphotoController::class, 'destroy'])->name('admin.deletenewsphoto')->middleware('auth');

/*Newsvideo*/
Route::get('newsvideo', [NewsvideoController::class, 'index'])->name('admin.newsvideo')->middleware('auth');
Route::get('addnewsvideo', [NewsvideoController::class, 'create'])->name('admin.addnewsvideo')->middleware('auth');
Route::post('addnewsvideo', [NewsvideoController::class, 'store'])->name('admin.pronewsvideo')->middleware('auth');
Route::get('editnewsvideo/{id}', [NewsvideoController::class, 'edit'])->name('admin.editnewsvideo')->middleware('auth');
Route::put('editnewsvideo/{id}', [NewsvideoController::class, 'update'])->name('admin.updatenewsvideos')->middleware('auth');
Route::get('deletenewsvideo/{id}', [NewsvideoController::class, 'destroy'])->name('admin.destroynewsvideos')->middleware('auth');

/*gallery*/
Route::get('gallery', [GalleryController::class, 'index'])->name('admin.gallery')->middleware('auth');
Route::get('addgallery', [GalleryController::class, 'create'])->name('admin.addgallery')->middleware('auth');
Route::post('addgallery', [GalleryController::class, 'store'])->name('admin.progallery')->middleware('auth');
Route::get('editgallery/{id}', [GalleryController::class, 'edit'])->name('admin.editgallery')->middleware('auth');
Route::put('editgallery/{id}', [GalleryController::class, 'update'])->name('admin.updategallery')->middleware('auth');
Route::get('deletegallery/{id}', [GalleryController::class, 'destroy'])->name('admin.deletegallery')->middleware('auth');



/*Mail route*/
Route::post('mail', [EmailController::class, 'email'])->name('front.email');

/*Admin search*/
Route::get('admin/search', [AdminController::class, 'search'])->name('admin.search');