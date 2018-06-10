<!DOCTYPE html>
<html ng-app="clienteAngular" ng-controller="mainCtrl">

<head>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta charset="UTF-8">
    <title data-lang="titulo-web">Cliente Angular</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="body">

    <form name="userForm" role="form">
        <h1>Registrando nuevo usuario</h1>
        <div layout-gt-sm="row">
            <md-input-container class="md-block" flex-gt-sm="">
                <label>Nombre del usuario</label>
                <input ng-model="user.nombre" required>
            </md-input-container>
            <md-input-container class="md-block" flex-gt-sm="">
                <label>Correo electronico</label>
                <input type="mail" ng-model="user.email" required>
            </md-input-container>
            <md-input-container class="md-block" flex-gt-sm="">
                <label>Fecha de nacimiento</label>
                <md-datepicker ng-model="user.fechanacimiento" md-placeholder="Nacimiento" required></md-datepicker>
            </md-input-container>
        </div>
        <div layout-gt-sm="row">
            <md-input-container class="md-block" flex-gt-sm="">
                <label>Puesto</label>
                <input ng-model="user.puesto" required>
            </md-input-container>
            <md-input-container class="md-block" flex-gt-sm="">
                <label>Domicilio</label>
                <input ng-model="user.domicilio" md-maxlength="150" rows="5" required>
            </md-input-container>
        </div>
        <div layout-gt-sm="row">
            <md-input-container class="md-block" flex-gt-sm="">
                <label>Nombre del la habilidad</label>
                <input ng-model="habilidad.nombre">
            </md-input-container>
            <md-input-container class="md-block" flex-gt-sm="">
                <md-slider-container>
                    <span class="md-body-1">Calificación</span>
                    <md-slider min="0" max="5" ng-model="habilidad.calificacion" aria-label="calificacion"></md-slider>
                    <md-input-container>
                        <input type="number" ng-model="habilidad.calificacion" aria-label="calificacion">
                    </md-input-container>
                </md-slider-container>
            </md-input-container>
            <button ng-click="agregaHabilidad()" ng-disabled="!habilidad.nombre || !habilidad.calificacion">Agregar habilidad</button>
        </div>
        <h4 ng-show="habilidades.length>0">Habilidades</h4>
        <md-list-item class="md-2-line" ng-repeat="habilidad in habilidades">
            <div class="md-list-item-text">
                <h3>{{ habilidad.nombre }}</h3>
                <h4>{{ habilidad.calificacion}}</h4>
            </div>
        </md-list-item>

        <button ng-click="registraUsuario()" ng-disabled="userForm.$invalid || habilidades.length<1">Registra nuevo usuario</button>
    </form>

    <md-list ng-show="usuarios.length>0">
        <h1>Lista de Usuarios</h1>
        <md-list-item class="md-2-line" ng-repeat="usuario in usuarios" ng-click="muestraUsuario($event, usuario)">
            <img alt="{{ usuario.nombre }}" src="http://parentsbrodeur.ca/wp-content/uploads/2016/11/No-headshot.png" class="md-avatar">
            <div class="md-list-item-text">
                <h3>{{ usuario.nombre }}</h3>
                <h4>{{ usuario.email}} | ( {{ usuario.puesto }} )</h4>
                <p>{{ usuario.domicilio }} </p>
            </div>
        </md-list-item>
    </md-list>
    <!--
         Copyright 2016 Google Inc. All Rights Reserved. 
         Use of this source code is governed by an MIT-style license that can be foundin the LICENSE file at http://material.angularjs.org/HEAD/license.
         -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-messages.min.js"></script>
    <!-- Angular Material Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=placeses,visualization,drawing,geometry,places&amp;key=AIzaSyAObyEnL4WQtx-nO_w6ijbwD_2uXpxyby0"></script>
    <script src="aplicacion/ng-map.js"></script>
    <script src="aplicacion/app.js"></script>
</body>

</html>