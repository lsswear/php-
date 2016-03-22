

#JQuery File Uploader

# JQuery文件上传

JQuery plugin to drag and drop files, including ajax upload and progress bar. The idea for this plugin is to keep it very simple; other options/plugins i found mess up a lot with the markup and provide some really 'hacky' ways to make it available for prehistoric browsers.

JQuery插件拖放文件,包括ajax上传和进度条。这个插件是保持的想法很简单,其他选项/插件我发现搞砸很多标记,并提供一些真正的出租汽车司机的方法使其可为史前浏览器。

The focus will be for **modern browsers**, but also providing a method to know when is the plugin is not supported; with an easy interface to use on **any design** you come up.

的重点将是现代浏览器* * * *,但也提供一个方法来知道什么时候是不支持插件;和一个容易使用的界面在任何设计* *你* *。

Basic Javascript/Jquery knowledge is necesary to use this plugin: how to set parameters, callbacks, etc.

基本的Javascript / Jquery知识是必要使用这个插件:如何设置参数,回调等。

As for new features im open to suggestions, but please before doing so read the TODO file to know what i've in mind :)

至于新功能我中肯的建议,但请在这样做之前读取TODO文件知道我记住:)

Dual licensed under the MIT and GPL licenses.

双重许可在麻省理工学院和GPL许可证。

Created by Daniel Morales. [Contact Me](mailto:daniminas@gmail.com) for more info or anything you want :)

由丹尼尔·莫拉莱斯。(联系我)(mailto:daniminas@gmail.com)更多信息或任何你想要的:)

[View Changelog](#changelog)

(视图的更新日志)(#变更)

##Demo

# #演示

Using Bootstrap: http://danielm.herokuapp.com/demos/dnd/

使用引导:http://danielm.herokuapp.com/demos/dnd/

Plain HTML: http://danielm.herokuapp.com/demos/dnd/simple.php

纯HTML:http://danielm.herokuapp.com/demos/dnd/simple.php

Image Upload w/Preview: http://danielm.herokuapp.com/demos/dnd/image-preview.php

图像上传w /预览:http://danielm.herokuapp.com/demos/dnd/image-preview.php

##API

# # API

````javascript

' ' ' ' javascript

$("#drop-area-div").dmUploader(options);

$(" # drop-area-div ").dmUploader(选项);

````

' ' ' '

This way you can initialize the plugin. As parameter you can set all variables you want and the same goes for callbacks;

这样你可以初始化插件。参数可以设置你想要的所有变量和回调也是一样;

down bellow you can see a list of what [options](#options) and [callbacks](#callbacks) are availabe.

波纹管你可以看到一列[选项](#选项)和(回调)(#回调)。

##Markup

# #标记

This is the simple html markup. The file input is optional but it provides an alternative way to select files for the user(check the online demo to se how to hide/style it)

这是一个简单的html标记。文件输入是可选的但是它提供了另一种方法来为用户选择文件(检查在线演示se如何隐藏/风格)

````html

' ' ' ' html

<div id="drop-area-div" style="width:400px;height:300px;">

< div id = " drop-area-div”风格= "宽度:400 px;高度:300 px;" >

Drag and Drop Files Here<br />

拖放文件在< br / >

or click to add files using the input<br />

或点击添加文件使用输入< br / >

<input type="file" name="files[]" multiple="multiple" title="Click to add Files">

< input type = " file " name = "文件[]”多个=“多个”title =“点击添加文件”>

</div>

< / div >

````

' ' ' '

Even if you test all this in different browsers I recommend to add some kind of link to a basic uploader, this is still a new feature on several platforms.

即使你在不同的浏览器中测试所有这些我建议添加一些链接到一个基本的上传,这仍是一个新功能在多个平台。

##Options

# #选项

###url

# # # url

Server URL to handle file uploads.

处理文件上传服务器URL。

###method

# # #的方法

Form method used by the upload request. Default is <code>POST</code>

形式方法上传使用的请求。默认是<代码> < /代码>后

###extraData

# # # extraData

Extra parameters to submit with each file. (Imagine these as 'hidden' inputs)

额外的参数与每个文件提交。(想象一下这些“隐藏”输入)

````javascript

' ' ' ' javascript

extraData: {

extraData:{

varName:1,

varName:1、

varName:'string'

varName:“字符串”

}

}

````

' ' ' '

###maxFileSize

# # # maxFileSize

Max size of each individual file for pre-submit validation. Default is <code>0</code> (no limit)

马克斯pre-submit验证每个文件的大小。默认是<代码> 0 < /代码>(没有限制)

###allowedTypes

# # # allowedTypes

Regular expression to match file types for pre-submit validation. Default is <code>'\*'</code>. Ej: <code>image/*</code>

正则表达式匹配pre-submit验证的文件类型。默认是<代码> < /代码> \ *。Ej:<代码>图像/ * < /代码>

###extFilter

# # # extFilter

Extension(s) comma separted for pre-submit validation. Default is <code>NULL</code>. Ej: <code>jpg;png;gif</code>

扩展(s)逗号separted pre-submit验证。默认是<代码>零> < /代码。Ej:<代码> jpg,png、gif > < /代码

###maxFiles

# # # maxFiles

Sets how many files can be uploaded by the user. Default is <code>0</code> (no limit)

集了多少文件可以由用户上传。默认是<代码> 0 < /代码>(没有限制)

###dataType

# # #数据类型

Data type corresponds to what the server is going to return after a successful upload.

数据类型对应的服务器会返回成功后上传。

Default is <code>null</code> which means Jquery will try to 'guess' depending of what the server returns.

默认是零< /代码> <代码>这意味着Jquery将试图“猜”根据服务器返回的东西。

Other values can be: <code>xml</code>, <code>json</code>, <code>script</code>, or <code>html</code>

其他值可以:<代码> xml > < /代码,<代码> json代码< / >,<代码> > < /代码,脚本或html <代码> < /代码>

Ref: http://api.jquery.com/jquery.ajax/

裁判:http://api.jquery.com/jquery.ajax/

###fileName

# # #文件名

Field name used to submit the files on each request. Default is <code>file</code>

字段名称用于提交针对每个请求的文件。默认是<代码>文件< /代码>

````php

php ' ' ' '

/* As example if you set this to 'file', on the server side code you will

/ *为例,如果你设置这个文件,您将在服务器端代码

be able to access to the file doing something like this(if you use PHP): */

能够访问到文件做一些像这样的(如果你使用PHP):* /

$_FILES[fileName];

带有_file美元(文件名);

````

' ' ' '

##Callbacks

# #回调

###onInit

# # # onInit

Called once plugin is loaded, browser checks passed and it's ready to use.

一旦加载插件,浏览器检查通过了,可以使用了。

````javascript

' ' ' ' javascript

onInit: function(){

onInit:函数(){

console. log('Plugin successfully initialized');

控制台。日志(插件成功初始化);

}

}

````

' ' ' '

###onFallbackMode

# # # onFallbackMode

This is called when the Ajax/File or Drag and Drop API isn't supported by the browser. It's

这叫做当Ajax /文件或拖拽API不支持的浏览器。这是

up to you to notify the user, change something on the UI, etc..

由你来通知用户,改变一些UI,等。

````javascript

' ' ' ' javascript

onFallbackMode: function(message){

onFallbackMode:函数(消息){

console. log('Upload plugin can't be initialized: ' + message);

控制台。日志(“上传插件不能初始化:”+消息);

}

}

````

' ' ' '

**Note**: Even when D&D isn't supported by the browser user may be able to upload via the

* *注意* *:即使D&D不支持的浏览器用户可以上传通过

file input (*if you included that on the HTML markup*).

文件输入(*如果你包含在HTML标记*)。

###onNewFile

# # # onNewFile

Called every time a file is added to the upload queue. <code>id</code> is a number to identify

每次调用一个文件添加到上传队列中。<代码> id > < /代码来识别

the upload.

上传。

**From now on other callbacks referring to this upload will use the same <code>id</code>**.

* *从现在起其他回调指的这个上传将使用相同的<代码> id > < /代码* *。

````javascript

' ' ' ' javascript

onNewFile: function(id, file){

onNewFile:函数(id、文件){

/* Fields availabe are:

/ *领域十分感激:

- file.name

——file.name

- file.type

——file.type

- file. size (in bytes)

——文件。大小(以字节为单位)

*/

* /

}

}

````

' ' ' '

**Note**: As example; if a user selects/drag two files this function will be called twice.

* *注意* *:为例,如果用户选择/拖两个文件这个函数会调用两次。

###onBeforeUpload

# # # onBeforeUpload

Called right before a upload request is sent.

叫之前上传发送请求。

````javascript

' ' ' ' javascript

onBeforeUpload: function(id){

onBeforeUpload:函数(id){

console. log('Starting to upload #' + id);

控制台。日志(“开始上传#”+身份证);

}

}

````

' ' ' '

###onComplete

# # # onComplete

Called after all pending upload been processed (this include error **and** successful uploads)

毕竟等待上传被处理(包括错误* *和* *成功上传)

````javascript

' ' ' ' javascript

onComplete: function(){

onComplete:函数(){

console. log('We reach the end of the upload Queue!');

控制台。日志(“我们到达的最后上传队列!”);

}

}

````

' ' ' '

###onUploadProgress

# # # onUploadProgress

If the browser supports upload progress this will be called when we have an update.

如果浏览器支持上传进度这将是当我们有一个更新。

````javascript

' ' ' ' javascript

onUploadProgress: function(id, percent){

onUploadProgress:函数(id、百分比){

console. log('Upload of #' + id ' is at %' + percent);

控制台。日志(“#上传”+ id '在% + %);

// do something cool here!

/ /做一些很酷的!

}

}

````

' ' ' '

###onUploadSuccess

# # # onUploadSuccess

Called after a file upload was completed without errors. <code>data</code> contains

文件上传完成后没有错误。<代码> < /代码>包含数据

the server response (See [settings](#datatype)) for more

服务器响应(见[设置](#数据类型))

````javascript

' ' ' ' javascript

onUploadSuccess: function(id, data){

onUploadSuccess:函数(id、数据){

console. log('Succefully upload #' + id);

控制台。日志(“Succefully上传#”+身份证);

console. log('Server response was:');

控制台。日志(“服务器响应是:”);

console.log(data);

console.log(数据);

}

}

````

' ' ' '

###onUploadError

# # # onUploadError

Triggers when some kind of connection problem happened(timeout, etc..)

一些连接问题发生时触发(超时等. .)

````javascript

' ' ' ' javascript

onUploadError: function(id, message){

onUploadError:函数(id、消息){

console. log('Error trying to upload #' + id + ': ' + message);

控制台。日志(的错误尝试上传# +身份证+‘:’+消息);

}

}

````

' ' ' '

###onFileTypeError

# # # onFileTypeError

Called when the mimetype pre-submit validation fails.

时调用mimetype pre-submit验证失败。

See (See [settings](#allowedtypes) for more.)

看到(见[设置](# allowedtypes)。)

````javascript

' ' ' ' javascript

onFileTypeError: function(file){

onFileTypeError:函数(文件){

console. log('File type of ' + file.name + ' is not allowed: ' + file.type);

控制台。日志(“文件类型”+ file.name + '是不允许的:' + file.type);

}

}

````

' ' ' '

###onFileSizeError

# # # onFileSizeError

Called when the file size pre-submit validation fails.

时调用文件大小pre-submit验证失败。

See (See [settings](#maxfilesize) for more.)

看到(见[设置](# maxfilesize)。)

````javascript

' ' ' ' javascript

onFileSizeError: function(file){

onFileSizeError:函数(文件){

console. log('File size of ' + file.name + ' exceeds the limit');

控制台。日志(“文件大小”+ file.name +“超过上限”);

}

}

````

' ' ' '

###onFileExtError

# # # onFileExtError

Called when the file extension pre-submit validation fails.

时调用文件扩展名pre-submit验证失败。

See (See [settings](#extfilter) for more.)

看到(见[设置](# extfilter)。)

````javascript

' ' ' ' javascript

onFileExtError: function(file){

onFileExtError:函数(文件){

console. log('File extension of ' + file.name + ' is not allowed');

控制台。日志(“文件扩展名”+ file.name +“不允许”);

}

}

````

' ' ' '

###onFilesMaxError

# # # onFilesMaxError

Called when the user reaches the upload limit (number of files).

当用户到达上传限制(文件)。

See (See [settings](#maxfiles) for more.)

看到(见[设置](# maxfiles)。)

````javascript

' ' ' ' javascript

onFilesMaxError: function(file){

onFilesMaxError:函数(文件){

console.log(file.name + ' cannot be added to queue due to upload limits.');

console.log(file.name +”不能被添加到队列由于上传限制。”);

}

}

````

' ' ' '

##Changelog

# #的更新日志

- [Nov 01 2013] Initial relase.

——初始relase[2013年11月01]。

- [Feb 08 2014] Project moved to Github.

——搬到Github(2014年2月08年)项目。

- [Feb 15 2014] Added option for pre-submit file extension validation. View: [extFilter](#extfilter)/[onFileExtError](#onfileexterror)

——(2014年2月15日)添加选择pre-submit文件扩展名验证。观点:[extFilter](# extFilter)/(onFileExtError)(# onFileExtError)
划词
双语对照
有道翻译——中国最大最稳定的免费在线翻译 添加书签
关于有道翻译|有道翻译API|有道首页|有道智选|关于有道|官方博客

© 2016 网易公司 京ICP证080268号

#JQuery File Uploader
JQuery plugin to drag and drop files, including ajax upload and progress bar. The idea for this plugin is to keep it very simple; other options/plugins i found mess up a lot with the markup and provide some really 'hacky' ways to make it available for prehistoric browsers.

The focus will be for **modern browsers**, but also providing a method to know when is the plugin is not supported; with an easy interface to use on **any design** you come up.

Basic Javascript/Jquery knowledge is necesary to use this plugin: how to set parameters, callbacks, etc.

As for new features im open to suggestions, but please before doing so read the TODO file to know what i've in mind :)

Dual licensed under the MIT and GPL licenses.
Created by Daniel Morales. [Contact Me](mailto:daniminas@gmail.com) for more info or anything you want :)

[View Changelog](#changelog)

##Demo
Using Bootstrap: http://danielm.herokuapp.com/demos/dnd/

Plain HTML: http://danielm.herokuapp.com/demos/dnd/simple.php

Image Upload w/Preview: http://danielm.herokuapp.com/demos/dnd/image-preview.php

##API
````javascript
$("#drop-area-div").dmUploader(options);
````
This way you can initialize the plugin. As parameter you can set all variables you want and the same goes for callbacks;
down bellow you can see a list of what [options](#options) and [callbacks](#callbacks) are availabe.

##Markup
This is the simple html markup. The file input is optional but it provides an alternative way to select files for the user(check the online demo to se how to hide/style it)
````html
<div id="drop-area-div" style="width:400px;height:300px;">
  Drag and Drop Files Here<br />
  or click to add files using the input<br />
  <input type="file" name="files[]" multiple="multiple" title="Click to add Files">
</div>
````
Even if you test all this in different browsers I recommend to add some kind of link to a basic uploader, this is still a new feature on several platforms.

##Options

###url
Server URL to handle file uploads.

###method
Form method used by the upload request. Default is <code>POST</code>

###extraData
Extra parameters to submit with each file. (Imagine these as 'hidden' inputs)
````javascript
extraData: {
  varName:1,
  varName:'string'
}
````

###maxFileSize
Max size of each individual file for pre-submit validation. Default is <code>0</code> (no limit)

###allowedTypes
Regular expression to match file types for pre-submit validation. Default is <code>'\*'</code>. Ej: <code>image/*</code>

###extFilter
Extension(s) comma separted for pre-submit validation. Default is <code>NULL</code>. Ej: <code>jpg;png;gif</code>

###maxFiles
Sets how many files can be uploaded by the user. Default is <code>0</code> (no limit)

###dataType
Data type corresponds to what the server is going to return after a successful upload.

Default is <code>null</code> which means Jquery will try to 'guess' depending of what the server returns.

Other values can be: <code>xml</code>, <code>json</code>, <code>script</code>, or <code>html</code>

Ref: http://api.jquery.com/jquery.ajax/

###fileName
Field name used to submit the files on each request. Default is <code>file</code>
````php
/* As example if you set this to 'file', on the server side code you will
be able to access to the file doing something like this(if you use PHP): */
$_FILES[fileName];
````

##Callbacks

###onInit
Called once plugin is loaded, browser checks passed and it's ready to use.
````javascript
onInit: function(){
  console.log('Plugin successfully initialized');
}
````

###onFallbackMode
This is called when the Ajax/File or Drag and Drop API isn't supported by the browser. It's
up to you to notify the user, change something on the UI, etc..
````javascript
onFallbackMode: function(message){
  console.log('Upload plugin can't be initialized: ' + message);
}
````
**Note**: Even when D&D isn't supported by the browser user may be able to upload via the
file input (*if you included that on the HTML markup*).

###onNewFile
Called every time a file is added to the upload queue. <code>id</code> is a number to identify
the upload.

**From now on other callbacks referring to this upload will use the same <code>id</code>**.
````javascript
onNewFile: function(id, file){
  /* Fields availabe are:
     - file.name
     - file.type
     - file.size (in bytes)
  */
}
````
**Note**: As example; if a user selects/drag two files this function will be called twice.

###onBeforeUpload
Called right before a upload request is sent.
````javascript
onBeforeUpload: function(id){
  console.log('Starting to upload #' + id);
}
````

###onComplete
Called after all pending upload been processed (this include error **and** successful uploads)
````javascript
onComplete: function(){
  console.log('We reach the end of the upload Queue!');
}
````

###onUploadProgress
If the browser supports upload progress this will be called when we have an update.
````javascript
onUploadProgress: function(id, percent){
  console.log('Upload of #' + id ' is at %' + percent);
  // do something cool here!
}
````

###onUploadSuccess
Called after a file upload was completed without errors. <code>data</code> contains
the server response (See [settings](#datatype)) for more
````javascript
onUploadSuccess: function(id, data){
  console.log('Succefully upload #' + id);
  console.log('Server response was:');
  console.log(data);
}
````

###onUploadError
Triggers when some kind of connection problem happened(timeout, etc..)
````javascript
onUploadError: function(id, message){
  console.log('Error trying to upload #' + id + ': ' + message);
}
````

###onFileTypeError
Called when the mimetype pre-submit validation fails.
See (See [settings](#allowedtypes) for more.)
````javascript
onFileTypeError: function(file){
  console.log('File type of ' + file.name + ' is not allowed: ' + file.type);
}
````

###onFileSizeError
Called when the file size pre-submit validation fails.
See (See [settings](#maxfilesize) for more.)
````javascript
onFileSizeError: function(file){
  console.log('File size of ' + file.name + ' exceeds the limit');
}
````

###onFileExtError
Called when the file extension pre-submit validation fails.
See (See [settings](#extfilter) for more.)
````javascript
onFileExtError: function(file){
  console.log('File extension of ' + file.name + ' is not allowed');
}
````

###onFilesMaxError
Called when the user reaches the upload limit (number of files).
See (See [settings](#maxfiles) for more.)
````javascript
onFilesMaxError: function(file){
  console.log(file.name + ' cannot be added to queue due to upload limits.');
}
````

##Changelog
- [Nov 01 2013] Initial relase.
- [Feb 08 2014] Project moved to Github.
- [Feb 15 2014] Added option for pre-submit file extension validation. View: [extFilter](#extfilter)/[onFileExtError](#onfileexterror)
