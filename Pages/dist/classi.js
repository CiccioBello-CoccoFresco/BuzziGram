/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./js/classi.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./js/classi.js":
/*!**********************!*\
  !*** ./js/classi.js ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function calcolaAnnoScolastico() {\n  var d = new Date();\n  var y = d.getFullYear() - 2000;\n  var m = d.getMonth() + 1;\n\n  if (m >= 9) {\n    var y2 = y + 1;\n    var as = y + \"/\" + y2;\n  } else {\n    var y2 = y - 1;\n    var as = y2 + \"/\" + y;\n  }\n\n  return as;\n}\n\nfunction caricaAnni() {\n  var url = \"../php/getAnni.php\";\n  $.ajax({\n    url: url,\n    dataType: \"json\",\n    error: function error(XMLHttpRequest, textStatus, errorThrown) {\n      console.log(textStatus);\n    }\n  }).done(function (data) {\n    console.log(data);\n    var stringa = \"<option selected disabled value=''>Scegli...</option>\";\n\n    for (var i = 0; i < data.length; i++) {\n      var anno = data[i][\"anno_scolastico\"];\n      var stringa = stringa + \"<option value=\" + anno + \">\" + anno + \"</option>\";\n    }\n\n    $(\"#as\").find('option').remove().end().append(stringa);\n    var temp = calcolaAnnoScolastico();\n    $(\"#as\").val(temp);\n  }).fail(function () {\n    console.log(\"errore\");\n  });\n}\n\nfunction caricaClassiAnnuario(as, mode) {\n  var classe = document.getElementById(\"classe\");\n  var obj = {\n    as: as,\n    mode: mode\n  };\n  console.log(\"../login/getClassi.php?\" + $.param(obj));\n  var url = \"../php/getClassi.php?\" + $.param(obj);\n  $.ajax({\n    url: url,\n    dataType: \"json\",\n    error: function error(XMLHttpRequest, textStatus, errorThrown) {\n      console.log(textStatus);\n    }\n  }).done(function (data) {\n    console.log(data);\n    if (data[0] === 'norows') var stringa = \"<p>Nessuna classe trovata</p>\";else {\n      if (data[0]['anno'] < 3) var mode = \"BIENNIO\";else var mode = \"TRIENNIO\";\n      var stringa = \"<table id='tabella' border = '1px'><th colspan = 4>\" + mode + \"</th>\";\n      var rows = parseInt(data.length / 4);\n      var resto = parseInt(data.length % 4);\n      var i = 0;\n\n      for (var k = 0; k < rows; k++) {\n        var stringa = stringa + \"<tr>\";\n\n        for (var j = 0; j < 4; j++) {\n          var classeOttenuta = data[i][\"anno\"] + data[i][\"sezione\"];\n          var stringa = stringa + \"<td id='classe'><a href=Alunni.php?id=\" + data[i]['id'] + \">\" + classeOttenuta + \"</a></td> \";\n          var i = i + 1;\n        }\n\n        var stringa = stringa + \"</tr>\";\n      }\n\n      var stringa = stringa + \"<tr>\";\n\n      for (var j = 0; j < resto; j++) {\n        var classeOttenuta = data[i][\"anno\"] + data[i][\"sezione\"];\n        var stringa = stringa + \"<td id='classe'><a href=Alunni.html?id=\" + data[i]['id'] + \">\" + classeOttenuta + \"</a></td> \";\n        var i = i + 1;\n      }\n\n      var stringa = stringa + \"</tr>\";\n      var stringa = stringa + \"</table>\";\n    }\n    $(\"#annuario\").html(stringa);\n  }).fail(function () {\n    console.log(\"errore\");\n  });\n}\n\n//# sourceURL=webpack:///./js/classi.js?");

/***/ })

/******/ });