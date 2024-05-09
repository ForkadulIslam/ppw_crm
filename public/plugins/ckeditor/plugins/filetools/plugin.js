/*
 Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
(function(){function g(a){this.editor=a;this.loaders=[]}function h(a,c,b){var d=a.config.fileTools_defaultFileName;this.editor=a;this.lang=a.lang;"string"===typeof c?(this.data=c,this.file=m(this.data),this.loaded=this.total=this.file.size):(this.data=null,this.file=c,this.total=this.file.size,this.loaded=0);b?this.fileName=b:this.file.name?this.fileName=this.file.name:(a=this.file.type.split("/"),d&&(a[0]=d),this.fileName=a.join("."));this.uploaded=0;this.uploadTotal=null;this.status="created";this.abort=
function(){this.changeStatus("abort")}}function m(a){var c=a.match(l)[1];a=a.replace(l,"");a=atob(a);var b=[],d,e,f,k;for(d=0;d<a.length;d+=512){e=a.slice(d,d+512);f=Array(e.length);for(k=0;k<e.length;k++)f[k]=e.charCodeAt(k);e=new Uint8Array(f);b.push(e)}return new Blob(b,{type:c})}CKEDITOR.plugins.add("filetools",{lang:"cs,da,de,de-ch,en,eo,eu,fr,gl,id,it,km,ko,ku,nb,nl,pl,pt-br,ru,sv,tr,ug,uk,zh,zh-cn",beforeInit:function(a){a.uploadRepository=new g(a);a.on("fileUploadRequest",function(a){a=a.data.fileLoader;
a.xhr.open("POST",a.uploadUrl,!0)},null,null,5);a.on("fileUploadRequest",function(a){a=a.data.fileLoader;var b=new FormData;b.append("upload",a.file,a.fileName);b.append("ckCsrfToken",CKEDITOR.tools.getCsrfToken());a.xhr.send(b)},null,null,999);a.on("fileUploadResponse",function(a){var b=a.data.fileLoader,d=b.xhr,e=a.data;try{var f=JSON.parse(d.responseText);f.error&&f.error.message&&(e.message=f.error.message);f.uploaded?(e.fileName=f.fileName,e.url=f.url):a.cancel()}catch(k){e.message=b.lang.filetools.responseError,
CKEDITOR.warn("filetools-response-error",{responseText:d.responseText}),a.cancel()}},null,null,999)}});g.prototype={create:function(a,c){var b=this.loaders.length,d=new h(this.editor,a,c);d.id=b;this.loaders[b]=d;this.fire("instanceCreated",d);return d},isFinished:function(){for(var a=0;a<this.loaders.length;++a)if(!this.loaders[a].isFinished())return!1;return!0}};h.prototype={loadAndUpload:function(a){var c=this;this.once("loaded",function(b){b.cancel();c.once("update",function(a){a.cancel()},null,
null,0);c.upload(a)},null,null,0);this.load()},load:function(){var a=this,c=this.reader=new FileReader;a.changeStatus("loading");this.abort=function(){a.reader.abort()};c.onabort=function(){a.changeStatus("abort")};c.onerror=function(){a.message=a.lang.filetools.loadError;a.changeStatus("error")};c.onprogress=function(b){a.loaded=b.loaded;a.update()};c.onload=function(){a.loaded=a.total;a.data=c.result;a.changeStatus("loaded")};c.readAsDataURL(this.file)},upload:function(a){a?(this.uploadUrl=a,this.xhr=
new XMLHttpRequest,this.attachRequestListeners(),this.editor.fire("fileUploadRequest",{fileLoader:this})&&this.changeStatus("uploading")):(this.message=this.lang.filetools.noUrlError,this.changeStatus("error"))},attachRequestListeners:function(){function a(){"error"!=b.status&&(b.message=b.lang.filetools.networkError,b.changeStatus("error"))}function c(){"abort"!=b.status&&b.changeStatus("abort")}var b=this,d=this.xhr;b.abort=function(){d.abort()};d.onerror=a;d.onabort=c;d.upload?(d.upload.onprogress=
function(a){a.lengthComputable&&(b.uploadTotal||(b.uploadTotal=a.total),b.uploaded=a.loaded,b.update())},d.upload.onerror=a,d.upload.onabort=c):(b.uploadTotal=b.total,b.update());d.onload=function(){b.update();if("abort"!=b.status)if(b.uploaded=b.uploadTotal,200>d.status||299<d.status)b.message=b.lang.filetools["httpError"+d.status],b.message||(b.message=b.lang.filetools.httpError.replace("%1",d.status)),b.changeStatus("error");else{for(var a={fileLoader:b},c=["message","fileName","url"],k=b.editor.fire("fileUploadResponse",
a),g=0;g<c.length;g++){var h=c[g];"string"===typeof a[h]&&(b[h]=a[h])}!1===k?b.changeStatus("error"):b.changeStatus("uploaded")}}},changeStatus:function(a){this.status=a;if("error"==a||"abort"==a||"loaded"==a||"uploaded"==a)this.abort=function(){};this.fire(a);this.update()},update:function(){this.fire("update")},isFinished:function(){return!!this.status.match(/^(?:loaded|uploaded|error|abort)$/)}};CKEDITOR.event.implementOn(g.prototype);CKEDITOR.event.implementOn(h.prototype);var l=/^data:(\S*?);base64,/;
CKEDITOR.fileTools||(CKEDITOR.fileTools={});CKEDITOR.tools.extend(CKEDITOR.fileTools,{uploadRepository:g,fileLoader:h,getUploadUrl:function(a,c){var b=CKEDITOR.tools.capitalize;return c&&a[c+"UploadUrl"]?a[c+"UploadUrl"]:a.uploadUrl?a.uploadUrl:c&&a["filebrowser"+b(c,1)+"UploadUrl"]?a["filebrowser"+b(c,1)+"UploadUrl"]+"\x26responseType\x3djson":a.filebrowserUploadUrl?a.filebrowserUploadUrl+"\x26responseType\x3djson":null},isTypeSupported:function(a,c){return!!a.type.match(c)}})})();
