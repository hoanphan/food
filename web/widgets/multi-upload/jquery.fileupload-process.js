!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery","./jquery.fileupload"],a):a(window.jQuery)}(function(a){"use strict";var b=a.blueimp.fileupload.prototype.options.add;a.widget("blueimp.fileupload",a.blueimp.fileupload,{options:{processQueue:[],add:function(c,d){var e=a(this);d.process(function(){return e.fileupload("process",d)}),b.call(this,c,d)}},processActions:{},_processFile:function(b,c){var d=this,e=a.Deferred().resolveWith(d,[b]),f=e.promise();return this._trigger("process",null,b),a.each(b.processQueue,function(b,e){var g=function(b){return c.errorThrown?a.Deferred().rejectWith(d,[c]).promise():d.processActions[e.action].call(d,b,e)};f=f.pipe(g,e.always&&g)}),f.done(function(){d._trigger("processdone",null,b),d._trigger("processalways",null,b)}).fail(function(){d._trigger("processfail",null,b),d._trigger("processalways",null,b)}),f},_transformProcessQueue:function(b){var c=[];a.each(b.processQueue,function(){var d={},e=this.action,f=this.prefix===!0?e:this.prefix;a.each(this,function(c,e){"string"===a.type(e)&&"@"===e.charAt(0)?d[c]=b[e.slice(1)||(f?f+c.charAt(0).toUpperCase()+c.slice(1):c)]:d[c]=e}),c.push(d)}),b.processQueue=c},processing:function(){return this._processing},process:function(b){var c=this,d=a.extend({},this.options,b);return d.processQueue&&d.processQueue.length&&(this._transformProcessQueue(d),0===this._processing&&this._trigger("processstart"),a.each(b.files,function(e){var f=e?a.extend({},d):d,g=function(){return b.errorThrown?a.Deferred().rejectWith(c,[b]).promise():c._processFile(f,b)};f.index=e,c._processing+=1,c._processingQueue=c._processingQueue.pipe(g,g).always(function(){c._processing-=1,0===c._processing&&c._trigger("processstop")})})),this._processingQueue},_create:function(){this._super(),this._processing=0,this._processingQueue=a.Deferred().resolveWith(this).promise()}})});