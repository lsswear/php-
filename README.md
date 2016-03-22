
jq插件下载地址：http://www.cnblogs.com/lhb25/p/drag-and-drop-jquery-file-uploader.html

dmuploader.js 改动 dmuploader.min.js 为改动后压缩文件

文件类型验证：142-148行

返回信息处理：260-265行

php文件根据swfupload修改

#JQuery File Uploader

# #演示

使用 Bootstrap: http://danielm.herokuapp.com/demos/dnd/

纯HTML:http://danielm.herokuapp.com/demos/dnd/simple.php

图像上传预览:http://danielm.herokuapp.com/demos/dnd/image-preview.php

##API

$("#drop-area-div").dmUploader(options);

##Markup

<div id="drop-area-div" style="width:400px;height:300px;">

  Drag and Drop Files Here<br />

  or click to add files using the input<br />

  <input type="file" name="files[]" multiple="multiple" title="Click to add Files">

</div>

##Options

###url

处理文件上传服务器URL。

###method

异步提交时的请求,默认是post。

###extraData

额外的参数与每个文件提交。(反正我没用)

extraData: {

    varName:1,

    varName:'string'
}

###maxFileSize

验证每个文件的大小。默认是0 (没有限制)。

###allowedTypes

正则表达式匹配验证的文件类型。默认是\*。例子'png|jpg|zip'。

###extFilter

扩展(s)逗号间隔。默认是0(零)。Ej:jpg,png、gif

###maxFiles

最大文件量。默认是0零(没有限制)

###dataType

成功后服务器返回上传数据的对应类型。


默认是null 根据服务器返回数据类型

其他值可以:xml,json,script,html

Ref: http://api.jquery.com/jquery.ajax/

###fileName

字段名称用于提交针对每个请求的文件。默认是file

/ *如果你设置这个文件,您将在服务器端代码

能够访问到文件做一些像这样的(如果你使用PHP):* /

$_FILES[fileName];

##Callbacks

# #回调

###onInit

一旦加载插件,浏览器检查通过了,可以使用了。

onInit: function(){

    console. log('Plugin successfully initialized');

}

###onFallbackMode

当Ajax /文件或拖拽API不支持的浏览器时，由程序来通知用户,改变一些UI,等。

onFallbackMode: function(message){

    console. log('Upload plugin can't be initialized: ' + message);

}

* *注意* *:即使D&D不支持的浏览器，用户也可以上传通过

###onNewFile

每次调用一个文件添加到上传队列中。id为上传标识。

**回调上传文件的相关操作使用这个id。

onNewFile: function(id, file){

/*file 属性:

- file.name

- file.type

- file. size (in bytes)

*/

}

* *注意* *:为例,如果用户选择/拖两个文件这个函数会调用两次。

###onBeforeUpload

发送上传请求前回调。

onBeforeUpload: function(id){

  console. log('Starting to upload #' + id);

}
###onComplete

上传回调后处理(包括错误和成功上传)

onComplete: function(){

  console. log('We reach the end of the upload Queue!');

}

###onUploadProgress

上传进度更新。

onUploadProgress: function(id, percent){

  console. log('Upload of #' + id ' is at %' + percent);

}

###onUploadSuccess

文件上传成功时调用

更多服务器响应见[settings](#datatype)

onUploadSuccess: function(id, data){

  console. log('Succefully upload #' + id);

  console. log('Server response was:');

  console.log(data);

}

###onUploadError

发生问题时触发(超时等. .)

onUploadError: function(id, message){

  console. log('Error trying to upload #' + id + ': ' + message);

}

###onFileTypeError

验证文件类型错误时调用
更多见[settings](# allowedtypes)

onFileTypeError: function(file){

  console. log('File type of ' + file.name + ' is not allowed: ' + file.type);

}

###onFileSizeError

验证文件大小错误时调用
更多见[settings](# maxfilesize)

onFileSizeError: function(file){

  console. log('File size of ' + file.name + ' exceeds the limit');

}

###onFileExtError

验证文件扩展名错误时调用。
更多见[settings](# extfilter)

onFileExtError: function(file){

  console. log('File extension of ' + file.name + ' is not allowed');

}

###onFilesMaxError

上传文件总量错误时调用。
更多见[设置](# maxfiles)

onFilesMaxError: function(file){

  console.log(file.name + ' cannot be added to queue due to upload limits.');

}

##Changelog

# #的更新日志

- [Nov 01 2013] Initial relase.

- [Feb 08 2014] Project moved to Github.

- [Feb 15 2014] Added option for pre-submit file extension validation. View: [extFilter](#extfilter)/[onFileExtError](#onfileexterror)
