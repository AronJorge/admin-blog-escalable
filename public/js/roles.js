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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/roles/components/principal.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/roles/components/principal.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "principal",
  props: ['roles', 'privilegios_modulo'],
  data: function data() {
    return {
      items: [],
      fields: [{
        key: 'id',
        label: 'ID',
        sortable: true
      }, {
        key: 'nombre',
        label: 'Nombre',
        sortable: true
      }, {
        key: 'is_superadmin',
        label: 'Tipo de rol',
        sortable: true
      }, {
        key: 'actions',
        label: 'Actions'
      }],
      currentPage: 1,
      perPage: 5,
      totalRows: '',
      pageOptions: [5, 10, 15],
      sortBy: null,
      sortDesc: false,
      sortDirection: 'asc',
      filter: null,
      showCollapse: false
    };
  },
  computed: {
    sortOptions: function sortOptions() {
      return this.fields.filter(function (f) {
        return f.sortable;
      }).map(function (f) {
        return {
          text: f.label,
          value: f.key
        };
      });
    }
  },
  created: function created() {
    this.items = JSON.parse(this.roles);
    this.totalRows = this.roles.length;
  },
  methods: {
    onFiltered: function onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    onSubmit: function onSubmit(evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
    },
    onReset: function onReset(evt) {
      var _this = this;

      evt.preventDefault();
      /* Reset our form values */

      this.form.email = '';
      this.form.name = '';
      this.form.food = null;
      this.form.checked = [];
      /* Trick to reset/clear native browser form validation state */

      this.show = false;
      this.$nextTick(function () {
        _this.show = true;
      });
    },
    onDelete: function onDelete(item) {
      var _this2 = this;

      axios.delete("/admin/roles/".concat(item.id)).then(function (res) {
        _this2.items.splice(_this2.items.indexOf(item), 1);
      }).catch(function (fail) {
        Error('fail', fail);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/roles/components/principal.vue?vue&type=template&id=215e9205&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/roles/components/principal.vue?vue&type=template&id=215e9205&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "table-responsive" },
    [
      _c(
        "b-container",
        { attrs: { fluid: "" } },
        [
          _c(
            "b-row",
            [
              _c(
                "b-col",
                { staticClass: "my-1", attrs: { md: "6" } },
                [
                  _c(
                    "b-form-group",
                    {
                      staticClass: "mb-0",
                      attrs: { horizontal: "", label: "Buscar" }
                    },
                    [
                      _c(
                        "b-input-group",
                        [
                          _c("b-form-input", {
                            attrs: { placeholder: "Escriba para buscar" },
                            model: {
                              value: _vm.filter,
                              callback: function($$v) {
                                _vm.filter = $$v
                              },
                              expression: "filter"
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "b-input-group-append",
                            [
                              _c(
                                "b-btn",
                                {
                                  attrs: { disabled: !_vm.filter },
                                  on: {
                                    click: function($event) {
                                      _vm.filter = ""
                                    }
                                  }
                                },
                                [_vm._v("Limpiar")]
                              )
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "b-col",
                { staticClass: "my-1", attrs: { md: "6" } },
                [
                  _c(
                    "b-form-group",
                    {
                      staticClass: "mb-0",
                      attrs: { horizontal: "", label: "por pagina" }
                    },
                    [
                      _c("b-form-select", {
                        attrs: { options: _vm.pageOptions },
                        model: {
                          value: _vm.perPage,
                          callback: function($$v) {
                            _vm.perPage = $$v
                          },
                          expression: "perPage"
                        }
                      })
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c("b-table", {
            attrs: {
              "show-empty": "",
              stacked: "md",
              small: "",
              items: _vm.items,
              fields: _vm.fields,
              "current-page": _vm.currentPage,
              "per-page": _vm.perPage,
              filter: _vm.filter,
              "sort-by": _vm.sortBy,
              "sort-desc": _vm.sortDesc,
              "sort-direction": _vm.sortDirection
            },
            on: {
              "update:sortBy": function($event) {
                _vm.sortBy = $event
              },
              "update:sortDesc": function($event) {
                _vm.sortDesc = $event
              },
              filtered: _vm.onFiltered
            },
            scopedSlots: _vm._u([
              {
                key: "is_superadmin",
                fn: function(row) {
                  return [
                    row.value
                      ? _c("span", { staticClass: "badge badge-primary" }, [
                          _vm._v("Superadmin")
                        ])
                      : _c("span", { staticClass: "badge badge-secondary" }, [
                          _vm._v("Estandar")
                        ])
                  ]
                }
              },
              {
                key: "actions",
                fn: function(row) {
                  return [
                    JSON.parse(_vm.privilegios_modulo)["is_actualizar"]
                      ? _c(
                          "a",
                          {
                            staticClass:
                              "btn btn-brand btn-stack-overflow btn-sm",
                            attrs: {
                              href: "/admin/roles/" + row.item.id + "/edit"
                            }
                          },
                          [_c("i", { staticClass: "fa fa-user-edit" })]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    JSON.parse(_vm.privilegios_modulo)["is_eliminar"]
                      ? _c(
                          "a",
                          {
                            staticClass:
                              "btn btn-brand btn-youtube btn-sm text-white",
                            on: {
                              click: function($event) {
                                _vm.onDelete(row.item)
                              }
                            }
                          },
                          [_c("i", { staticClass: "fa fa-trash" })]
                        )
                      : _vm._e()
                  ]
                }
              }
            ])
          }),
          _vm._v(" "),
          _c(
            "b-row",
            [
              _c(
                "b-col",
                { staticClass: "my-1", attrs: { md: "6" } },
                [
                  _c("b-pagination", {
                    staticClass: "my-0",
                    attrs: {
                      "total-rows": _vm.totalRows,
                      "per-page": _vm.perPage
                    },
                    model: {
                      value: _vm.currentPage,
                      callback: function($$v) {
                        _vm.currentPage = $$v
                      },
                      expression: "currentPage"
                    }
                  })
                ],
                1
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/roles/components/principal.vue":
/*!*****************************************************!*\
  !*** ./resources/js/roles/components/principal.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _principal_vue_vue_type_template_id_215e9205_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./principal.vue?vue&type=template&id=215e9205&scoped=true& */ "./resources/js/roles/components/principal.vue?vue&type=template&id=215e9205&scoped=true&");
/* harmony import */ var _principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./principal.vue?vue&type=script&lang=js& */ "./resources/js/roles/components/principal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _principal_vue_vue_type_template_id_215e9205_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _principal_vue_vue_type_template_id_215e9205_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "215e9205",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/roles/components/principal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/roles/components/principal.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/roles/components/principal.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./principal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/roles/components/principal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/roles/components/principal.vue?vue&type=template&id=215e9205&scoped=true&":
/*!************************************************************************************************!*\
  !*** ./resources/js/roles/components/principal.vue?vue&type=template&id=215e9205&scoped=true& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_principal_vue_vue_type_template_id_215e9205_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./principal.vue?vue&type=template&id=215e9205&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/roles/components/principal.vue?vue&type=template&id=215e9205&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_principal_vue_vue_type_template_id_215e9205_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_principal_vue_vue_type_template_id_215e9205_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/roles/roles.js":
/*!*************************************!*\
  !*** ./resources/js/roles/roles.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('principal', __webpack_require__(/*! ./components/principal */ "./resources/js/roles/components/principal.vue").default);
var app = new Vue({
  el: '#roles'
});

/***/ }),

/***/ 2:
/*!*******************************************!*\
  !*** multi ./resources/js/roles/roles.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\LENOVO\PhpstormProjects\php-english\admin-escalable-blog\resources\js\roles\roles.js */"./resources/js/roles/roles.js");


/***/ })

/******/ });