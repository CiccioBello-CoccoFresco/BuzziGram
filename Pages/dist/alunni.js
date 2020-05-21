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
/******/ 	return __webpack_require__(__webpack_require__.s = "./js/alunni.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./js/alunni.js":
/*!**********************!*\
  !*** ./js/alunni.js ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function caricaAlunni(classe) {\n  var obj = {\n    classe: classe\n  };\n  console.log(\"../php/getAlunni.php?\" + $.param(obj));\n  var url = \"../php/getAlunni.php?\" + $.param(obj);\n  $.ajax({\n    url: url,\n    dataType: \"json\",\n    error: function error(XMLHttpRequest, textStatus, errorThrown) {\n      console.log(textStatus);\n    }\n  }).done(function (data) {\n    console.log(data);\n    var stringa = \"\";\n    console.log(stringa); //$(\"#prova\").attr(\"src\", caricaFoto(classe, data[1]['studente']));\n\n    for (var i = 0; i < data.length; i++) {\n      var idStud = data[i]['studente'];\n      var cognomeNomeStud = data[i]['cognome'] + \" \" + data[i]['nome'];\n      stringa = stringa + \"<div class='gallery'> <div class='desc'>\" + cognomeNomeStud + \"</div><a target='_blank'><img id ='f\" + idStud + \"' class = 'foto'></a> <div id = 'd\" + idStud + \"'class='desc'>Frase</div></div>\";\n      caricaFoto(classe, idStud);\n    }\n\n    $(\"#container\").append(stringa);\n  }).fail(function () {\n    console.log(\"errore\");\n  });\n}\n\nfunction caricaFoto(classe, studente) {\n  //ritorna la stringa da inserire in img src di uno studente di una classe\n  var obj = {\n    classe: classe,\n    studente: studente\n  };\n  var url = \"../php/getFoto.php?\" + $.param(obj);\n  $.ajax({\n    url: url,\n    dataType: \"json\",\n    error: function error(XMLHttpRequest, textStatus, errorThrown) {\n      console.log(textStatus);\n    }\n  }).done(function (data) {\n    if (data[0] === \"norows\") {\n      $(\"#f\" + studente).attr(\"src\", \"../img/Cicciobello.png\");\n      $(\"#d\" + studente).text(\"Foto non inserita\");\n    } else {\n      $(\"#f\" + studente).attr(\"src\", data[0]);\n      $(\"#d\" + studente).text(data[1]);\n    }\n  }).fail(function () {\n    console.log(\"errore\");\n  });\n}\n\n//# sourceURL=webpack:///./js/alunni.js?");

/***/ })

/******/ });