<md-dialog aria-label="Mango (Fruit)">
    <form>
        <md-toolbar>
            <div class="md-toolbar-tools">
                <h2>{{usuario.nombre}}</h2>
                <span flex></span>
            </div>
        </md-toolbar>
        <md-dialog-content style="max-width:800px;max-height:810px; ">
            <div>
                <p>El usuario {{usuario.nombre}} se encuentra laborando en el puesto de <b>{{usuario.puesto}}</b>.</p>
                <p>Actualmente vive en el domicilio {{usuario.domicilio}} y su fecha de nacimiento es <b>{{usuario.fechanacimiento}}</b>. El usuario puede ser contactado a través de su correo {{usuario.email}}</p>
                <ng-map zoom="11" center="[40.74, -74.18]">
                    <marker position="{{usuario.domicilio}}" title="You are here" animation="Animation.BOUNCE" centered="true"></marker>
                </ng-map>
            </div>
        </md-dialog-content>

        <md-dialog-actions layout="row">
            <md-button ng-click="cerrar()" style="margin-right:20px;">
                Cerrar
            </md-button>
        </md-dialog-actions>
    </form>
</md-dialog>