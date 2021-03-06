angular.module('app', [
  'app.run',
  'app.filters',
  'app.services',
  'app.components',
  'app.routes',
  'app.config',
  'app.partials'
])

angular.module('app.run', [])
angular.module('app.routes', [])
angular.module('app.filters', [])
angular.module('app.services', [])
angular.module('app.config', [])
angular.module('app.components', [
  'ui.router', 'angular-loading-bar',
  'restangular', 'ngStorage','satellizer',
  'ui.bootstrap', 'mm.acl', 'datatables',
  'datatables.bootstrap','angularFileUpload',
  'toastr','nemLogging','ui-leaflet','openlayers-directive',
  'checklist-model','xeditable','ngAnimate','anim-in-out',
  'ui.select', 'ngSanitize','rzModule'
])
