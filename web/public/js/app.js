!function(t){var e={};function n(o){if(e[o])return e[o].exports;var r=e[o]={i:o,l:!1,exports:{}};return t[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=t,n.c=e,n.d=function(t,e,o){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:o})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=12)}([,,,function(t,e){t.exports=function(t){var e=[];return e.toString=function(){return this.map(function(e){var n=function(t,e){var n=t[1]||"",o=t[3];if(!o)return n;if(e&&"function"==typeof btoa){var r=(i=o,"/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(i))))+" */"),a=o.sources.map(function(t){return"/*# sourceURL="+o.sourceRoot+t+" */"});return[n].concat(a).concat([r]).join("\n")}var i;return[n].join("\n")}(e,t);return e[2]?"@media "+e[2]+"{"+n+"}":n}).join("")},e.i=function(t,n){"string"==typeof t&&(t=[[null,t,""]]);for(var o={},r=0;r<this.length;r++){var a=this[r][0];"number"==typeof a&&(o[a]=!0)}for(r=0;r<t.length;r++){var i=t[r];"number"==typeof i[0]&&o[i[0]]||(n&&!i[2]?i[2]=n:n&&(i[2]="("+i[2]+") and ("+n+")"),e.push(i))}},e}},function(t,e,n){var o="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!o)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var r=n(17),a={},i=o&&(document.head||document.getElementsByTagName("head")[0]),s=null,l=0,c=!1,d=function(){},u="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function p(t){for(var e=0;e<t.length;e++){var n=t[e],o=a[n.id];if(o){o.refs++;for(var r=0;r<o.parts.length;r++)o.parts[r](n.parts[r]);for(;r<n.parts.length;r++)o.parts.push(m(n.parts[r]));o.parts.length>n.parts.length&&(o.parts.length=n.parts.length)}else{var i=[];for(r=0;r<n.parts.length;r++)i.push(m(n.parts[r]));a[n.id]={id:n.id,refs:1,parts:i}}}}function f(){var t=document.createElement("style");return t.type="text/css",i.appendChild(t),t}function m(t){var e,n,o=document.querySelector('style[data-vue-ssr-id~="'+t.id+'"]');if(o){if(c)return d;o.parentNode.removeChild(o)}if(u){var r=l++;o=s||(s=f()),e=v.bind(null,o,r,!1),n=v.bind(null,o,r,!0)}else o=f(),e=function(t,e){var n=e.css,o=e.media,r=e.sourceMap;o&&t.setAttribute("media",o);r&&(n+="\n/*# sourceURL="+r.sources[0]+" */",n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(r))))+" */");if(t.styleSheet)t.styleSheet.cssText=n;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(n))}}.bind(null,o),n=function(){o.parentNode.removeChild(o)};return e(t),function(o){if(o){if(o.css===t.css&&o.media===t.media&&o.sourceMap===t.sourceMap)return;e(t=o)}else n()}}t.exports=function(t,e,n){c=n;var o=r(t,e);return p(o),function(e){for(var n=[],i=0;i<o.length;i++){var s=o[i];(l=a[s.id]).refs--,n.push(l)}e?p(o=r(t,e)):o=[];for(i=0;i<n.length;i++){var l;if(0===(l=n[i]).refs){for(var c=0;c<l.parts.length;c++)l.parts[c]();delete a[l.id]}}}};var g,h=(g=[],function(t,e){return g[t]=e,g.filter(Boolean).join("\n")});function v(t,e,n,o){var r=n?"":o.css;if(t.styleSheet)t.styleSheet.cssText=h(e,r);else{var a=document.createTextNode(r),i=t.childNodes;i[e]&&t.removeChild(i[e]),i.length?t.insertBefore(a,i[e]):t.appendChild(a)}}},function(t,e){t.exports=function(t,e,n,o,r,a){var i,s=t=t||{},l=typeof t.default;"object"!==l&&"function"!==l||(i=t,s=t.default);var c,d="function"==typeof s?s.options:s;if(e&&(d.render=e.render,d.staticRenderFns=e.staticRenderFns,d._compiled=!0),n&&(d.functional=!0),r&&(d._scopeId=r),a?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),o&&o.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},d._ssrRegister=c):o&&(c=o),c){var u=d.functional,p=u?d.render:d.beforeCreate;u?(d._injectStyles=c,d.render=function(t,e){return c.call(e),p(t,e)}):d.beforeCreate=p?[].concat(p,c):[c]}return{esModule:i,exports:s,options:d}}},,,,,,,function(t,e,n){n(13),n(25),t.exports=n(26)},function(t,e,n){window.bus=new Vue({}),Vue.component("identifier-component",n(14)),Vue.component("google-maps",n(20));window.app=new Vue({el:"#app",methods:{initMaps:function(){window.bus.$emit("loadMaps",!0)}}})},function(t,e,n){var o=n(5)(n(18),n(19),!1,function(t){n(15)},"data-v-34f088ce",null);t.exports=o.exports},function(t,e,n){var o=n(16);"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);n(4)("14994560",o,!0)},function(t,e,n){(t.exports=n(3)(!1)).push([t.i,".error img[data-v-34f088ce]{border-color:#aa3939}.error-box[data-v-34f088ce]{background-color:#aa3939;margin:5px}",""])},function(t,e){t.exports=function(t,e){for(var n=[],o={},r=0;r<e.length;r++){var a=e[r],i=a[0],s={id:t+":"+r,css:a[1],media:a[2],sourceMap:a[3]};o[i]?o[i].parts.push(s):n.push(o[i]={id:i,parts:[s]})}return n}},function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var o={headers:{"content-type":"multipart/form-data","Access-Control-Allow-Origin":"*"}};e.default={props:{action:{type:String,required:!0},method:{type:String,required:!0},csrf:{type:String,required:!0}},data:function(){return{vehicle_id:"",data:new FormData,image:null,hasError:!1,error_message:""}},methods:{onFileChange:function(t){var e=t.target.files||t.dataTransfer.files;e.length&&(this.createImage(e[0]),this.data.append("image",e[0]),this.onSubmit())},createImage:function(t){new Image;var e=new FileReader,n=this;e.onload=function(t){n.image=t.target.result},e.readAsDataURL(t)},onSubmit:function(){var t=this;axios.post(identity_server_uri,this.data,o).then(function(e){"true"===e.data.error?(t.hasError=!0,t.vehicle_id="",t.error_message=e.data.message):(t.hasError=!1,t.vehicle_id=e.data.payload)}).catch(function(e){alert("Server unavaliable"),t.reset()})},reset:function(){this.hasError=!1,this.error_message="",this.image=null,this.vehicle_id="",this.data=new FormData}}}},function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"card",staticStyle:{width:"20rem"}},[n("div",{staticClass:"card-header"},[t._v("\n\t\t\tIdentify vehicle\n\t\t")]),t._v(" "),n("form",{staticClass:"form",attrs:{action:t.action,method:t.method}},[n("input",{attrs:{type:"hidden",name:"_token"},domProps:{value:t.csrf}}),t._v(" "),n("div",{staticClass:"card-body"},[n("div",{staticClass:"card-text"},[n("div",{staticClass:"m-1",class:{error:t.hasError}},[t.image?n("div",[n("button",{staticClass:"btn btn-outline-danger btn-sm float-right m-1",attrs:{type:"button"},on:{click:t.reset}},[t._v("Remove")]),t._v(" "),n("img",{staticClass:"card-img-top img-thumbnail",attrs:{src:t.image,alt:"Image"}}),t._v(" "),t.hasError?n("div",{staticClass:"error-box text-center text-white"},[t._v(t._s(t.error_message))]):t._e()]):t._e(),t._v(" "),null===t.image?n("div",[n("label",{staticClass:"form-group"},[n("input",{staticClass:"form-control",attrs:{type:"file",name:"image"},on:{change:t.onFileChange}}),t._v(" "),n("span",{staticClass:"custom-file-control"})])]):t._e()]),t._v(" "),n("div",{staticClass:"form-group m-1 text-center"},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.vehicle_id,expression:"vehicle_id"}],staticClass:"form-control",attrs:{type:"text",name:"vehicle_id",placeholder:"or enter number manually"},domProps:{value:t.vehicle_id},on:{input:function(e){e.target.composing||(t.vehicle_id=e.target.value)}}}),t._v(" "),n("button",{staticClass:"btn btn-primary mt-1 align-content-center pt-1",attrs:{type:"submit",disabled:!t.vehicle_id}},[t._v("Proceed...")])])])])])])},staticRenderFns:[]}},function(t,e,n){var o=n(5)(n(23),n(24),!1,function(t){n(21)},"data-v-61f50a9f",null);t.exports=o.exports},function(t,e,n){var o=n(22);"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);n(4)("205d1542",o,!0)},function(t,e,n){(t.exports=n(3)(!1)).push([t.i,".google-map[data-v-61f50a9f]{background:gray}",""])},function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"google-maps",props:{name:{required:!0},width:{String:String,default:"100%"},height:{String:String,default:"600px"},addEntryEndpoint:{String:String},locs:{type:String},zoom:{default:8},token:{type:String,default:""}},data:function(){return{loaded:!1,infoWindow:null,map:null,markers:[],location_marker:!1,locationEntry:{},lat:null,lng:null,note:"",location:"Locating...",geocoder:null,styles:{height:this.get_height(),width:this.get_width()}}},computed:{map_name:function(){return this.name+"-map"},locations:function(){return JSON.parse(this.locs)}},created:function(){window.bus.$on("loadMaps",this.init)},methods:{init:function(){var t=document.getElementById(this.map_name),e={zoom:this.zoom,center:new google.maps.LatLng(7.292501,80.634192)};if(this.map=new google.maps.Map(t,e),this.infoWindow=new google.maps.InfoWindow,this.geocoder=new google.maps.Geocoder,this.addEntryEndpoint){var n=document.createElement("div");new this.CenterControl(n,this.map);n.index=1,this.map.controls[google.maps.ControlPosition.TOP_CENTER].push(n),this.geoLocation()}else this.renderAll()},get_width:function(){return this.width},get_height:function(){return this.height},CenterControl:function(t,e){var n=document.createElement("div");n.style.backgroundColor="#fff",n.style.border="2px solid #fff",n.style.borderRadius="3px",n.style.boxShadow="0 2px 6px rgba(0,0,0,.3)",n.style.cursor="pointer",n.style.margin="5px",n.style.textAlign="center",n.title="Click to find your location",t.appendChild(n);var o=document.createElement("div");o.style.color="rgb(25,25,25)",o.style.fontFamily="Roboto,Arial,sans-serif",o.style.fontSize="16px",o.style.lineHeight="38px",o.style.paddingLeft="5px",o.style.paddingRight="5px",o.innerHTML='<i class="fa fa-location-arrow" aria-hidden="true"></i> My Location',n.appendChild(o),n.addEventListener("click",this.geoLocation)},addEntry:function(){null!=this.lat&&null!=this.lng&&"Locating..."!=this.location||(alert("Please select the location"),event.preventDefault())},renderAll:function(){var t=this;this.locations&&this.locations.forEach(function(e){var n,o,r,a={lat:e.lat,lng:e.lng},i=t.renderMarker(a,e.created_at,!1),s='<div id="content"><h5>'+e.created_at+"</h5>"+e.note+"</div>",l=new google.maps.InfoWindow;google.maps.event.addListener(i,"click",(n=i,o=s,r=l,function(){r.setContent(o),r.open(this.map,n)}))})},geoLocation:function(){var t=this;navigator.geolocation?navigator.geolocation.getCurrentPosition(function(e){var n={lat:e.coords.latitude,lng:e.coords.longitude};if(t.map.setCenter(n),t.location_marker){var o=new google.maps.LatLng(n.lat,n.lng);return t.location_marker.setPosition(o),void t.getLocationName(n)}t.location_marker=t.renderMarker(n,"Current Location",!0),t.location_marker.addListener("dragend",function(e){var n={lat:e.latLng.lat(),lng:e.latLng.lng()};t.getLocationName(n)}),t.getLocationName(n)},function(t){alert("something went wrong")}):this.handleLocationError(!1,this.infoWindow,this.map.getCenter())},getLocationName:function(t){var e=this;this.lat=t.lat,this.lng=t.lng,this.location="Locating...",this.geocoder.geocode({location:t},function(t,n){"OK"===n?e.location=t[0].formatted_address:console.log(n)})},renderMarker:function(t,e,n){var o=new google.maps.Marker({position:t,map:this.map,draggable:n,animation:google.maps.Animation.DROP,title:e});return this.markers.push(o),o},handleLocationError:function(t,e,n){this.infoWindow.setPosition(n),this.infoWindow.setContent(t?"Error: The Geolocation service failed.":"Error: Your browser doesn't support geolocation."),e.open(this.map)},clear:function(){this.note="",this.location="Locating...",this.geoLocation()}}}},function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("div",{staticClass:"google-map",style:t.styles,attrs:{id:t.map_name}}),t._v(" "),t.addEntryEndpoint?n("div",[n("form",{staticClass:"form",attrs:{action:t.addEntryEndpoint,method:"post"},on:{submit:t.addEntry}},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.lat,expression:"lat"}],attrs:{type:"hidden",name:"lat",required:""},domProps:{value:t.lat},on:{input:function(e){e.target.composing||(t.lat=e.target.value)}}}),t._v(" "),n("input",{directives:[{name:"model",rawName:"v-model",value:t.lng,expression:"lng"}],attrs:{type:"hidden",name:"lng",required:""},domProps:{value:t.lng},on:{input:function(e){e.target.composing||(t.lng=e.target.value)}}}),t._v(" "),n("input",{attrs:{type:"hidden",name:"_token"},domProps:{value:t.token}}),t._v(" "),n("input",{directives:[{name:"model",rawName:"v-model",value:t.location,expression:"location"}],attrs:{type:"hidden",name:"location",required:""},domProps:{value:t.location},on:{input:function(e){e.target.composing||(t.location=e.target.value)}}}),t._v(" "),n("div",{staticClass:"p-1 m-1 text-center"},[n("h6",[t._v("Location : "),n("b",[t._v(" "+t._s(t.location)+" ")])])]),t._v(" "),n("textarea",{directives:[{name:"model",rawName:"v-model",value:t.note,expression:"note"}],staticClass:"form-control p-1",attrs:{name:"note",rows:"8",placeholder:"Take a note",required:""},domProps:{value:t.note},on:{input:function(e){e.target.composing||(t.note=e.target.value)}}}),t._v(" "),n("div",{staticClass:"text-center p-1 m-1"},[t._m(0),t._v(" "),n("button",{staticClass:"btn btn-danger",on:{click:function(e){e.preventDefault(),t.clear(e)}}},[n("i",{staticClass:"fa fa-eraser"}),t._v(" Clear")])])])]):t._e()])},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("button",{staticClass:"btn btn-primary"},[e("i",{staticClass:"fa fa-plus"}),this._v(" Add Entry")])}]}},function(t,e){},function(t,e){}]);