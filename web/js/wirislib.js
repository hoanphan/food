// Render script.
// This script renders non editable DOM objects.
var js = document.createElement("script");
js.type = "text/javascript";
js.src = "/generic_wiris/integration/WIRISplugins.js?viewer=image";
document.head.appendChild(js);

// Global variables. For demo purposes.
// This variables should be configurated on configuration.ini file.
// Fore more information about custom configuration see http://www.wiris.com/plugins/docs/resources/configuration-table
// We overwrite them in order to show the changes.

// Specifies how the formulas are stored in the database.
// On configuration.ini the name of the variable is wiriseditorsavemode.
var _wrs_conf_saveMode;

// Specifies how the images are displayed on the editor.
// On configuration.ini the name of variable is wiriseditoreditmode.
var _wrs_conf_editMode;

/**
 * This method simulates how the formula rendering on a non editable area using JsPluginViewer (Preview tab)
 * and formulas are stored in the database (HTML tab).
 */
 function updateFunction() {
 	updatePreview();
 	updateHTMLCode();
 }

 function updatePreview() {
	// Using plugin custom method for retreving data.
	// This data is a raw data with the format defined by save mode (xml, image or base64 images).
	var data = getEditorData();

	// This div simulates a render page without any editor.
	var preview_div = document.getElementById("preview_div");
	// Setting data on preview div.
	// Rendering data on preview using JsPluginViewer.
	if ('com' in window && 'wiris' in window.com && 'js' in window.com.wiris && 'JsPluginViewer' in window.com.wiris.js) {
		// With this method all non-editable objects are parsed.
		// com.wiris.js.JsPluginViewer.parseElement(element) can be used in order to parse a custom DOM element.
		// com.wiris.JsPluginViewer are called on page load so is not necessary to call it explicitly (I'ts called to simulate a custom render).
		com.wiris.js.JsPluginViewer.parseDocument();
	}
	// Set titles for images. For demo purposes.
	imgSetTitle(preview_div);
}

function updateHTMLCode(){
	var data = getEditorData();
	// Copy raw data to html view and formatting it. For demo porpouses.
	var data_code = (data.replace(/</g, "&lt;")).trim();;
	var htmlcode_div = document.getElementById("htmlcode_div");


	// This texts shows how WIRISplugins.js should be included.
	// Is text not javascript.
	// For demo purposes only.
	var jsExampleScript = '';
	if (_wrs_conf_saveMode == "xml") {
		jsExampleScript += 'var js = document.createElement("script");\n';
		jsExampleScript += 'js.type = "text/javascript";\n';
		jsExampleScript += 'js.src = "WIRISplugins.js?viewer=image";\n';
		jsExampleScript += 'document.head.appendChild(js);\n\n';
	}

	data_code =  jsExampleScript + data_code;
	htmlcode_div.innerHTML = htmlcode_div.innerHTML = "<pre class='wrs_inline'><code id='code_block' style='color:#e0e0e0'>" + data_code + "</code></pre>";
	highlightCode(data);
}






/**
 * Auxiliary function. Highlights demo technology logo. For demo purposes.
 */


/**
 * Format database data in HTML tab. For demo porpouses.
 */
 function highlightCode() {

 	var htmlcode_div = document.getElementById("htmlcode_div");
 	
 	var html_content = htmlcode_div.innerHTML;
 	var open_highlight = "<pre class='language-xml wrs_inline' style='word-wrap:break-word;background-color:white'><code>";
 	var close_highlight = "</code></pre>";

 	if (_wrs_conf_saveMode == "xml") {

 		/* Format the MATH tags */
 		
 		var indexs_end = html_content.getMatchIndices("&lt;/math&gt;");

 		for (var i = indexs_end.length - 1; i >= 0; i--) {
 			var actual_index_end = indexs_end[i] + 13;
 			html_content = html_content.splice(actual_index_end, 0, close_highlight);
 		}

 		var indexs_start = html_content.getMatchIndices("&lt;math");

 		for (var i = indexs_start.length - 1; i >= 0; i--) {
 			var actual_index_start = indexs_start[i];
 			html_content = html_content.splice(actual_index_start, 0, open_highlight);
 		}


 	}
 	else if (_wrs_conf_saveMode == "image" || _wrs_conf_saveMode == "base64") {

 		/* Format the IMG and BASE64 */
 		console.log("IMAGE MODE");

 		var indexs_start = html_content.getMatchIndices("&lt;img");
 		if (indexs_start == 0){
 			indexs_start = html_content.getMatchIndices("&lt;IMG");
 		}
 		var indexs_end = [];

 		for (var i = indexs_start.length - 1; i >= 0; i--) {
 			var actual_index_start = indexs_start[i];

 			for (var j = actual_index_start; j < html_content.length - 4; j++) {
 				if (html_content[j] == "&" && html_content[j+1] == "g" && html_content[j+2] == "t" && html_content[j+3] == ";"){
 					html_content = html_content.splice(j+4, 0, close_highlight);
 					break;
 				}
 			}
 			
 			html_content = html_content.splice(actual_index_start, 0, open_highlight);
 		}

 	}

 	htmlcode_div.innerHTML = html_content;

	// Prism library. For demo purposes.
	Prism.highlightAll();
}

/**
 * Set atitles for images. For demo purposes.
 * 
 */
 function imgSetTitle(preview_div) {
 	var imgs = preview_div.getElementsByTagName("img");
 	for (var i = 0; i < imgs.length; i++) {
 		imgs[i].title = imgs[i].alt;

 	}
 }

 String.prototype.splice = function splice (idx, rem, str) {
 	return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
 };

 String.prototype.getMatchIndices = function (find) {
 	var indices = [], data, exp = (typeof find == 'string' ? new RegExp(find, 'g') : find);

 	while ((data = exp.exec(this))) {
 		indices.push(data.index);
 	}

 	return indices.length ? indices : [];
 };




// function wrs_addEvent(element, event, func) {
// 	if (element.addEventListener) {
// 		element.addEventListener(event, func, false);
// 	}
// 	else if (element.attachEvent) {
// 		element.attachEvent('on' + event, func);
// 	}
// }
//
// wrs_addEvent(window, 'load', function () {
// 	// Hide the textarea
//
//
//
// 	//});
// });

/**
 * Getting data from editor.
 * Using WIRIS formulas are parsed to WIRIS save mode format (mathml, image or base64)
 * For more information see: http://www.wiris.com/es/plugins/docs/full-mathml-mode.
 * @return {string} Generic Plugin parsed data.
 */
 function getEditorData() {
 	var iframe = document.getElementById('example_iframe');
 	return wrs_endParse(iframe.contentWindow.document.body.innerHTML);
 }

/*
function getDataPreview(data) {
	return wrs_initParse(data);
}
*/

