<?php

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

use App\Players;
use App\Faq;
use Illuminate\Http\Request;

Route::get('/', function () {
  $players = App\Players::all();
  $blogs = App\Blog::all();


  return view('index',[
    'players' => $players,
    'blogs' => $blogs
  ]);
})->name("homePage");

Route::post('/login',function(Request $req){

    $user = App\User::where('email',$req->get('email'))->where('password',$req->get('password'))->get()->first();

    if($user){
      Auth::login($user);
      return redirect(route('admin.profile'));
    }else{
      return redirect()->back();
    }


})->name('login');

Route::get('/faq', function(){
    $faqs = Faq::all();

		return view('faq', ["faqs" => $faqs]);
})->name('faq');

Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/categories', function () {
    return view('categories');
})->name('categories');

Route::get('/blogs', function () {
  $blogs = App\Blog::all();  
  return view('blogArchive',['blogs' => $blogs]);
})->name('blogArchive');

Route::get('/blogs/{slug}',function($slug){
    $blog = App\Blog::where('id',$slug)->first();
		return view('blogSingle',['blog' => $blog]);
})->name('blogSingle');

Route::get('/products', function () {
    $products = Product::all();
    return view('products',['products' => $products]);
})->name("AllProducts");

Route::get('/products/{slug}',function($slug){
    $product = App\Product::where('id',$slug)->first();
		return view('productsSingle',['product' => $product]);
})->name('productSingle');

Route::get('/players',function(){
		return view('playersArchive');
})->name('AllPlayers');

Route::get('/profile/cart',function(){
		return view('cart');
})->name('cart');

Route::get('/profile/account',function(){
    return view('account');
});



Route::get('/logout',function(){
  Auth::logout();
  return redirect('/');
})->name('logout');



















Route::group(['prefix' => 'admin'], function(){
  Route::get('profile', function () { 
    $arr = prepareNavigation('Profile');
    $arr += array('user' => Auth::user());

    return view('/admin/profile',$arr); 
  })->name('admin.profile')->middleware('auth');

  // Players
  
  
  Route::get('players', function () { 
    $arr = prepareNavigation('Players');

    $arr += array('players' => Players::all()->toArray());

    return view('/admin/players', $arr); 
  })->name('admin.players');


  // Blogs

  Route::get('blogs', function () {
    $arr = prepareNavigation('Blogs');

    $blogs = App\Blog::all();
    $arr += array('blogs' => $blogs);

    return view('/admin/blogs', $arr); 
  })->name('admin.blogs');





  // PAGES
  Route::get('pages', function () { 
    $arr = prepareNavigation('Pages');

    $arr += array('faqs' => Faq::all()->toArray());
    $arr += array('sliders' => App\HomeSlider::all()->toArray());

    return view('/admin/pages', $arr); 
  })->name('admin.pages');
  
  Route::post('pages/faq/add',function(Request $req){
    $input = $req->all();
    Faq::create($input);

    $req->session()->flash('status','Added New Item To FAQ Data List');

    return redirect()->route('admin.pages');
  })->name('pages.faq.add');

  Route::post('pages/faq/delete/{id}',function(Request $req,$id){
    Faq::destroy($id);

    $req->session()->flash('status','Deleted Item From FAQ Data List');

    return redirect()->route('admin.pages');
  })->name('pages.faq.delete');

  // Home Slider
  Route::post('pages/homeslider/submit/{id}',function(Request $req,$id){
    dd($req->image);
    App\HomeSlider::create($req->all());

    $req->session()->flash('status','Deleted Item From FAQ Data List');

    return redirect()->route('admin.pages');
  })->name('pages.homeslider.submit');






  Route::get('categories', function () { return view('/admin/categories', prepareNavigation('Category')); })->name('admin.categories');
  Route::get('products', function () { return view('/admin/products', prepareNavigation('Product')); })->name('admin.products');
  Route::get('chart', function () { return view('/admin/chart', prepareNavigation('Chart')); })->name('admin.chart');
  Route::get('compare', function () { return view('/admin/compare', prepareNavigation('Compare')); })->name('admin.compare');
});



Route::get('admin', function(){
  return redirect('/admin/profile');
});

Route::get('/doc',function(){ 
  return view('dashboard'); 
});










  Route::group(['prefix' => 'email'], function(){
      Route::get('inbox', function () { return view('pages.email.inbox'); });
      Route::get('read', function () { return view('pages.email.read'); });
      Route::get('compose', function () { return view('pages.email.compose'); });
  });

  Route::group(['prefix' => 'apps'], function(){
      Route::get('chat', function () { return view('pages.apps.chat'); });
      Route::get('calendar', function () { return view('pages.apps.calendar'); });
  });

  Route::group(['prefix' => 'ui-components'], function(){
      Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
      Route::get('badges', function () { return view('pages.ui-components.badges'); });
      Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
      Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
      Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
      Route::get('cards', function () { return view('pages.ui-components.cards'); });
      Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
      Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
      Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
      Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
      Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
      Route::get('modal', function () { return view('pages.ui-components.modal'); });
      Route::get('navs', function () { return view('pages.ui-components.navs'); });
      Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
      Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
      Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
      Route::get('progress', function () { return view('pages.ui-components.progress'); });
      Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
      Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
      Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
      Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
      Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
  });

  Route::group(['prefix' => 'advanced-ui'], function(){
      Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
      Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
      Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
  });

  Route::group(['prefix' => 'forms'], function(){
      Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
      Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
      Route::get('editors', function () { return view('pages.forms.editors'); });
      Route::get('wizard', function () { return view('pages.forms.wizard'); });
  });

  Route::group(['prefix' => 'charts'], function(){
      Route::get('apex', function () { return view('pages.charts.apex'); });
      Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
      Route::get('flot', function () { return view('pages.charts.flot'); });
      Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
      Route::get('peity', function () { return view('pages.charts.peity'); });
      Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
  });

  Route::group(['prefix' => 'tables'], function(){
      Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
      Route::get('data-table', function () { return view('pages.tables.data-table'); });
  });

  Route::group(['prefix' => 'icons'], function(){
      Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
      Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
      Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
  });

  Route::group(['prefix' => 'general'], function(){
      Route::get('blank-page', function () { return view('pages.general.blank-page'); });
      Route::get('faq', function () { return view('pages.general.faq'); });
      Route::get('invoice', function () { return view('pages.general.invoice'); });
      Route::get('profile', function () { return view('pages.general.profile'); });
      Route::get('pricing', function () { return view('pages.general.pricing'); });
      Route::get('timeline', function () { return view('pages.general.timeline'); });
  });

  Route::group(['prefix' => 'auth'], function(){
      Route::get('login', function () { return view('pages.auth.login'); });
      Route::get('register', function () { return view('pages.auth.register'); });
  });

  Route::group(['prefix' => 'error'], function(){
      Route::get('404', function () { return view('pages.error.404'); });
      Route::get('500', function () { return view('pages.error.500'); });
  });

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');


// UTILITY

function prepareNavigation($nav){
  $navPlayers = false;
  $navBlogs = false;
  $navPages = false;
  $navCategory = false;
  $navChart = false;
  $navCompare = false;
  $navProduct = false;
  $navProfile = false;

  switch($nav){
    case 'Players':
      $navPlayers = true;
      break;
    case 'Blogs':
      $navBlogs = true;
      break;
    case 'Profile':
      $navProfile = true;
      break;
    case 'Chart':
      $navChart = true;
      break;
    case 'Compare':
      $navCompare = true;
      break;
    case 'Category':
      $navCategory = true;
      break;
    case 'Product':
      $navProduct = true;
      break;
    case 'Pages':
      $navPages = true;
      break;
    default:
      $navProfile = true;
  }

  return compact("navPlayers","navBlogs","navPages","navCategory","navChart","navCompare","navProduct","navProfile");
  
}
