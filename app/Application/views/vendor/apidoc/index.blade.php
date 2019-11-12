<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>LaralFlat</title>

    <link rel="stylesheet" href="{{ url('/') }}/docs/css/style.css" />
    <script src="{{ url('/') }}/docs/js/all.js"></script>
</head>


<body class="">
<a href="#" id="nav-button">
      <span>
        NAV
           <img src="{{ url('/') }}/admin/images/logo.png"  width="100"/>
      </span>
</a>
<div class="tocify-wrapper" >
<div style="text-align: center;margin-top: 20px">
    <img src="{{ url('/') }}/admin/images/logo.png"  width="100"/>
</div>
    
    <div class="search" >
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>
    <div id="toc">
    </div>
    <ul class="toc-footer">
        <li><a href='http://github.com/mpociot/documentarian'>LaralFalt made by love with  By 5damt-web</a></li>
    </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <!-- install -->
        <h1>Download The Files</h1>
        <p>download all files</p>
        <h1>Requirements</h1>
        <p>PHP &gt;= 5.6.4 ,
            PHP Curl extension </p>
        <h1>Install  The Dependencies</h1>
        <p>now type this line on your console</p>
        <pre><code>composer install</code></pre>
        <pre><code>php artisan key:generate</code></pre>
        <h1>Migrate</h1>
        <pre><code>  php artisan migrate</code></pre>
        <h1>Seed Database</h1>
        <pre><code>  php artisan db:seed</code></pre>
        <h1>Start Server</h1>
        <pre><code>  php artisan serve</code></pre>
        <h1>Login</h1>
<pre><code>  email : admin@gmail.com
        pass : admin</code></pre>
        <h1>Go To Admin Path</h1>
        <pre><code>  http://127.0.0.1:8000/admin/home</code></pre>
        <!-- install -->
        <!-- generate new module -->
        <h1>Generate New Admin Module</h1>
        <pre><code>  php artisan make:admin_model Nameofmodel</code></pre>
        <p>this command will genrate the following files</p>
        <ol>
            <li>app/Application/Model/Nameofmodel.php</li>
            <li>app/Application/Datatables/NameofmodelDatatable.php</li>
            <li>app/Application/Controllers/NameofmodelControllers.php</li>
            <li>app/Application/views/admin/nameofmodel</li>
            <li>app/Application/routes/admin/admin.php</li>
            <li>Insert item in admin menu</li>
            <li>database/migrations/Nameofmodel</li>
            <li>recources/lang/ar/nameofmodel</li>
        </ol>
        <!-- generate new module -->
        <!-- model -->
        <h1>Model</h1>
        <p><code>app/Application/Model/Nameofmodel.php</code></p>
        <p>this will be the model of the module
            it will contain the following</p>
        <h2>Table name make sure this is the table name</h2>
        <pre><code>  public $table = "Nameofmodel";</code></pre>
        <h2>Fillable column make sure you add all column on your table</h2>
<pre><code>    protected $fillable = [
        'name'
        ]; </code></pre>
        <h2>Validation method on store action make sure to add your only validation store action here</h2>
<pre><code>    public function validation($id){
        return [
        'name.*' =&gt; 'required|max:90'
        ];
        }</code></pre>
        <h2>Validation method on update action make sure to add only your update  validation here in this method</h2>
<pre><code>   public function updateValidation($id){
        return [
        'name.*' =&gt; 'required|max:90'
        ];
        }</code></pre>
        <!-- model -->
        <!-- Datatable -->
        <h1>Datatable</h1>
        <p><code>app/Application/Datatables/NameofmodelDatatable.php</code></p>
        <h2>this is class to handel datatable .... every table in laraflat have his own class on this path so you must <br></h2>
        <p>configure this class to show your data <br></p>
<pre><code>this method will handel the add,view,update action
        ```php
        public function ajax()
        {
        return $this-&gt;datatables
        -&gt;eloquent($this-&gt;query())
        -&gt;addColumn('edit', 'admin.nameofmodel.buttons.edit')
        -&gt;addColumn('delete', 'admin.nameofmodel.buttons.delete')
        -&gt;addColumn('view', 'admin.nameofmodel.buttons.view')
        -&gt;addColumn('name', 'admin.nameofmodel.buttons.langcol')
        -&gt;make(true);
        }
        ```</code></pre>
        <p>you can add or delete or  customize any of this feilds <br></p>
        <h2>this method you can show or delete the tds from the table</h2>
<pre><code> ```php
        protected function getColumns()
        {
        return [
        [
        'name' =&gt; "id",
        'data' =&gt; 'id',
        'title' =&gt; adminTrans('curd' , 'id'),
        ],
        [
        'name' =&gt; "name",
        'data' =&gt; 'name',
        ],
        [
        'name' =&gt; "view",
        'data' =&gt; 'view',
        'title' =&gt; adminTrans('curd' , 'view'),
        'exportable' =&gt; false,
        'printable' =&gt; false,
        'searchable' =&gt; false,
        'orderable' =&gt; false,
        ],
        [
        'name' =&gt; 'edit',
        'data' =&gt; 'edit',
        'title' =&gt; adminTrans('curd' , 'edit'),
        'exportable' =&gt; false,
        'printable' =&gt; false,
        'searchable' =&gt; false,
        'orderable' =&gt; false,
        ],
        [
        'name' =&gt; 'delete',
        'data' =&gt; 'delete',
        'title' =&gt; adminTrans('curd' , 'delete'),
        'exportable' =&gt; false,
        'printable' =&gt; false,
        'searchable' =&gt; false,
        'orderable' =&gt; false,
        ],

        ];
        }
        ```</code></pre>
        <p>you can see more about this from datatable <a href="https://yajrabox.com/docs/laravel-datatables/master">documentation</a> </p>
        <!-- Datatable -->
        <!-- controller -->
        <h1>Controller</h1>
        <p><code>app/Application/Controllers/NameofmodelControllers.php</code></p>
        <p>all controller extends this class AbstractController this where the magic happen <br>
            this class have all logic to get store update add methods on Laraflat <br></p>
        <h2>constructor function</h2>
<pre><code>  public function __construct(Nameofmodel $model)
        {
        parent::__construct($model);
        }</code></pre>
        <p>here we add the model that we add ,  edit , update , store , delete Don not worry laralflat  write this to you <br>
            to make ot easy to make this action</p>
        <h2>index Method</h2>
        <p>here we  build the datatable and render it do not worry about this all this work don by laraflat</p>
<pre><code> public function index(NameofmodelDataTable $dataTable){
        return $dataTable-&gt;render('admin.nameofmodel.index');
        }</code></pre>
        <h2>show Method</h2>
        <p>this function call when you show add , edit</p>
<pre><code>         public function show($id = null){
        return $this-&gt;createOrEdit('admin.nameofmodel.edit' , $id);
        }</code></pre>
        <p>you can pass any data to view as array as third arg in <code>createOrEdit</code></p>
        <h2>Store Method</h2>
        <p>this method will call on store , update action</p>
<pre><code>  public function store($id = null , \Illuminate\Http\Request $request){
        return $this-&gt;storeOrUpdate($request , $id , 'admin/nameofmodel');
        }</code></pre>
        <p>you can here customize your request and can check if request store by  <code>if($id == null)</code></p>
        <h2>GetById Method</h2>
        <p>this method control the view action in datatable </p>
<pre><code>   public function getById($id){
        $fields = $this-&gt;model-&gt;getConnection()-&gt;getSchemaBuilder()-&gt;getColumnListing($this-&gt;model-&gt;getTable());
        return $this-&gt;createOrEdit('admin.nameofmodel.show' , $id , ['fields' =&gt;  $fields]);
        }</code></pre>
        <p>this Method get all table column and send it with the item to the view to show details</p>
        <h2>Destroy Method</h2>
        <p>this methods call when you try to delete the item </p>
<pre><code> public function destroy($id){
        return $this-&gt;deleteItem($id , 'admin/categorie')-&gt;with('sucess' , 'Done Delete categorie From system');
        }</code></pre>
        <!-- controller -->
        <!-- views -->
        <h1>Views</h1>
        <p><code>app/Application/views/admin/nameofmodel</code></p>
        <p>we generate by default 7 view 3 the index , edit , show this is the common fiels <br>
            the other 4 controll the btns in datatable </p>
        <!-- views -->
        <!-- routes -->
        <h1>Routes</h1>
        <p><code>app/Application/routes/admin/admin.php</code></p>
        <p>laraflat append all routes for you when you excute the command <code>php artisan make:admin_model</code> <br>
            laraflat append all reoutes that make this actions  <code>add , edit , delete , store , update , view</code><br>
            int this Path <code>app/Application/routes/admin/admin.php</code>
            this path the admin group only will have access on it</p>
        <!-- routes -->
        <!-- menue -->
        <h1>Menu</h1>
        <p><code>Insert item in admin menu</code>
            laraflat insert item  for you when you excute the command <code>php artisan make:admin_model</code> <br>
            so it will appear in admin menu </p>
        <!-- menue -->
        <!-- migration -->
        <h1>Migration</h1>
        <p><code>database/migrations/Nameofmodel</code>
            laraflat cearet migration file for you when excute the command <code>php artisan make:admin_model</code> <br></p>
        <!-- migration -->
        <!-- Lang Files -->
        <h1>Lang Files</h1>
        <p><code>recources/lang/ar/nameofmodel</code>
            laraflat cearet language files for you when excute the command <code>php artisan make:admin_model</code> <br>
            it will check available language in <code>config\laravellocalization.php</code>  and will generate language files for you</p>
        <!-- Lang Files -->
        <!-- tinymce -->
        <h1>Tinymce</h1>
        <p><code>how to use tinymce on any texteara</code></p>
        <p>just put this id on any texteara <code>tinymce</code><br>
            then at the end of the page put this code</p>
<pre><code> section('script')
                include(layoutPath('layout.helpers.tynic'))
            endsection</code></pre>
        <!-- tinymce -->
        <!-- translate filed -->
        <h1>Translade Fileds</h1>
        <p><code>add filed accept mluti language</code></p>
        <p>laraflat loko to this file <code>config\laravellocalization.php</code> <br>
            to check the  available language to use then you can un commnet any language form this file <br>
            now use this function to create your fileds laraflat will generate fields for each language</p>
        <pre><code>  extractFiled('name' , isset($item-&gt;name) ? $item-&gt;name : null , 'text' , 'categorie') </code></pre>
        <ul>
            <li>name => feild name</li>
            <li>isset($item->name) ? $item->name : null => check if this is store action or edit action </li>
            <li>text => type of feild</li>
            <li>categorie => translate file must have key name of feild</li>
        </ul>
        <!-- translate filed -->
        <!-- get value from multi language col -->
        <h1>Show By Lang</h1>
        <p><code>get value deppend on user language</code></p>
        <p>you can use this two function  <code>getDefaultValueKey($filed)</code><br>
            this function will decet the user lang and show him value depend on this lang or use this <br>
            <code>getLangValue($filed , 'ar')</code> this function you must pass the language you want to show <br></p>
        <!-- get value from multi language col -->
        <!-- save arrays-->
        <h1>save arrays</h1>
        <p>if you want to save arrays in database just make the filed name as array like the example</p>
        <pre><code>  &lt;input type="text" name="title[]" /&gt;</code></pre>
        <p>laralflat will decet the array filed and contvert it as json </p>
        <!-- save arrays-->
        <!-- upload image-->
        <h1>upload image</h1>
        <p>laralflat fo this file <code>app\Application\Helpers\uploadFiles.php</code><br>
            check this <code>getFileFieldsName()</code> if the file name in this array laralflat will upload this image<br></p>
        <pre><code>  &lt;input type="file" name="image" /&gt;</code></pre>
        <p>if you want to upload multi image just add array to name and laraflat will take care about this</p>
        <pre><code>  &lt;input type="file" name="image[]" /&gt;</code></pre>
        <!-- save arrays-->
        <!-- trans words -->
        <h1>Trans Words</h1>
        <p><code>adminTrans('filename' , 'word')</code></p>
        <!-- trans words -->
        <!-- add lang to url-->
        <h1>Append lang to url</h1>
        <p><code>concatenateLangToUrl('admin/cat/item/1')</code></p>
        <!-- trans words -->
        <!-- get Av lan-->
        <h1>Get Languge</h1>
        <p>get all available language
            <code>getAvLang()</code></p>
        <!-- get Av lan -->
        <!-- transform select -->
        <h1>transform array</h1>
        <p>some times you will have array with multi language value so you want to get just the current language<br>
            in this case use this function <code>transformSelect()</code> <br>
            it will return with array this value will be from the current user language</p>
        <!-- transform select -->
        <!-- Get Setting  -->
        <h1>Get Setting</h1>
        <p>laraflat have setting table so if you want to get setting just call this function <code>getSetting('siteTitle')</code></p>
        <!-- Get Setting  -->
        <!-- menus -->
        <h1>Menu</h1>
        <p>laraflat support menu system so if you want to show your menu use this function
            <code>menu('menuName')</code>
            this will build ul with li with menu itmes </p>
        <!-- menus  -->
    </div>
    <div class="dark-box">
    </div>
</div>
</body>
</html>