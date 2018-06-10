var app = angular.module('clienteAngular', ['ngMaterial', 'ngMessages', 'ngMap']);

app.config(function($httpProvider, $mdDateLocaleProvider, $mdDateLocaleProvider) {
    $httpProvider.defaults.headers.post['Content-Type'] = undefined;
});

app.run(function($rootScope) {

});

app.controller('mainCtrl', function($scope, $rootScope, $http, $location, $mdDialog) {
    $scope.obtieneUsuarios = function() {
        $http.get("../examen/public/api/v1/usuario/getAll")
            .then(function(response) {
                console.log(response.data.datos);
                $scope.usuarios = response.data.datos;
            });
    }
    $scope.obtieneUsuarios();
    $scope.habilidades = [];
    $scope.agregaHabilidad = function(event, usuario) {
        console.log(formatDate($scope.user.fechanacimiento));
        $scope.habilidades.push({
            nombre: $scope.habilidad.nombre,
            calificacion: $scope.habilidad.calificacion
        });
    };
    $scope.muestraUsuario = function(event, usuario) {
        $mdDialog.show({
            controller: function($scope, $mdDialog, NgMap) {
                $http.get("../examen/public/api/v1/usuario/get/" + usuario.id)
                    .then(function(response) {
                        $scope.usuario = response.data.datos;
                    });
                NgMap.getMap().then(function(map) {
                    $scope.map = map;
                });
                $scope.cerrar = function() {
                    $mdDialog.hide();
                }
            },
            templateUrl: 'views/modal.usuario.php',
            parent: angular.element(document.body),
            clickOutsideToClose: true,
            fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
        });
    };

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }
    $scope.registraUsuario = function(event, usuario) {
        var formdata = new FormData();
        formdata.append("nombre", $scope.user.nombre);
        formdata.append("puesto", $scope.user.puesto);
        formdata.append("fechanacimiento", formatDate($scope.user.fechanacimiento));
        formdata.append("email", $scope.user.email);
        formdata.append("domicilio", $scope.user.domicilio);
        formdata.append("skills", JSON.stringify($scope.habilidades));
        $http.post("../examen/public/api/v1/usuario/create", formdata)
            .then(function(response) {
                var datos = response.data.datos;
                if (datos != null) {
                    $scope.obtieneUsuarios();
                } else {
                    alert('Error al crear usuario');
                }
            });
    };
});