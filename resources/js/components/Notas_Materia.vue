<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
        </ol>
        <div class="container-fluid">
            <!--Tabla Listado -->
            <div class="card">
                <div class="card-header">
                    <h3> Notas por materia Inf-324</h3>                        
                </div>
                <div class="card-body"> 
                    <b-row>                        
                    <b-col lg="6" class="my-1">
                        <b-form-group
                        label="Filtrar"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="md"
                        label-for="filterInput"
                        class="mb-0"
                        >
                        <b-input-group size="md">
                            <b-form-input
                            v-model="filter"
                            type="search"
                            id="filterInput"
                            placeholder="Introduce la búsqueda"
                            ></b-form-input>
                            <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''" variant="info">Buscar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                        </b-form-group>
                    </b-col> 
                    <b-col sm="4" md="6" class="my-1">
                        <b-form-group
                        label="Mostrar registros"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-align-sm="right"
                        label-size="md"
                        label-for="perPageSelect"
                        class="mb-0"
                        >
                        <b-form-select
                            v-model="perPage"
                            id="perPageSelect"
                            size="md"
                            :options="pageOptions"
                        ></b-form-select>
                        </b-form-group>
                    </b-col>                   
                    </b-row>                                                                              
                    <b-table
                        show-empty striped
                        hover responsive 
                        stacked="md"
                        :items="arrayNotas_Materia"
                        :fields="columnas"
                        :current-page="currentPage"
                        :per-page="perPage"
                        :filter="filter"
                        :filterIncludedFields="filterOn"
                        :sort-by.sync="sortBy"
                        :sort-desc.sync="sortDesc"
                        :sort-direction="sortDirection"                     
                    >
                        <template v-slot:head(paterno)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>  
                        <template v-slot:head(materno)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>  
                        <template v-slot:head(nombre)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>  
                        <template v-slot:head(ci)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>
                        <template v-slot:head(departamento)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>
                        <template v-slot:head(materia)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>
                        <template v-slot:head(nota)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template> 
                        <template v-slot:head(acciones)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>   
                        <template v-slot:head(acciones)="data">
                            <span class="text-primary">{{ data.label }}</span>
                        </template>                         
                        <template v-slot:cell(acciones)="row">
                        <a href="#" @click="abrirModal('personas','actualizar',row.item)" v-b-tooltip.hover title="Actualizar">
                            <b-icon-pencil-square variant="info" font-scale="1.5"></b-icon-pencil-square>
                        </a>
                        <a href="#" @click="row.toggleDetails" v-b-tooltip.hover.d50 title="Detalles">
                            <b-icon-eye-fill variant="info" font-scale="1.5"></b-icon-eye-fill >
                        </a>                                        
                        </template>
                        <template v-slot:row-details="row">
                            <b-card>
                                <ul>
                                <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
                                </ul>
                            </b-card>
                        </template>
                        <h3> Aprobados</h3> 
                       <h4> {{lp}}</h4> 
                       <h4> {{oru}}</h4> 
                       <h4> {{stcz}}</h4> 
                       <h4> {{bn}}</h4> 
                       <h4> {{pnd}}</h4> 
                       <h4> {{cbba}}</h4> 
                       <h4> {{trj}}</h4> 
                       <h4> {{suc}}</h4> 
                       <h4> {{pts}}</h4> 
                    </b-table>
                    <b-row>
                    
                    <b-col sm="7" md="6" class="my-1">
                        <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        align="fill"
                        size="sm"
                        class="my-0"
                        ></b-pagination>
                    </b-col>
                    </b-row>
                    <div>
                        <h3> Aprobados</h3> 
                       <h4> {{lp}}</h4> 
                       <h4> {{oru}}</h4> 
                       <h4> {{stcz}}</h4> 
                       <h4> {{bn}}</h4> 
                       <h4> {{pnd}}</h4> 
                       <h4> {{cbba}}</h4> 
                       <h4> {{trj}}</h4> 
                       <h4> {{suc}}</h4> 
                       <h4> {{pts}}</h4> 
                    </div>
                </div>
            </div>
            <!-- Fin -->
        </div>    
  </main>
</template>

<script>

    export default {
        data (){            
            return {
                personas_id: 0,
                nombre:'',
                paterno:'',
                materno:'',
                ci:'',
                lp: 0,
                oru: 0,
                pts: 0,
                cbba: 0,
                suc: 0,
                trj: 0,
                pnd: 0,
                bn: 0,
                stcz: 0,               
                verificaCi:0,
                arrayNotas_Materia : [],
                arrayNotas_MateriaTab : [],
                tituloModal : '',

                modal : 0,                
                tipoAccion : 0,
                dismissSecs: 5,
                dismissCountDown: 0,
                show: true,
                columnas: [
                  { key: 'paterno', label: 'Paterno', sortable: true, sortDirection: 'desc' },
                  { key: 'materno', label: 'Materno', sortable: true, class: 'text-justify' },                 
                  { key: 'nombre', label: 'Nombre', sortable: true },                 
                  { key: 'ci', label: 'C.I.', sortable: true },                 
                  { key: 'departamento', label: 'Departamento', sortable: true },                 
                  { key: 'materia', label: 'Materia', sortable: true },                 
                  { key: 'nota', label: 'Nota', sortable: true },                 
                 
                ],
                perPage: 15,
                selectedID: null,
                totalRows: 1,
                currentPage: 1,
                pageOptions: [15, 20,50,100,200],
                sortBy: '',
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
                filterOn: [],
            }
        },

        computed:{

        },
        methods : {

            onFiltered(filteredItems) {
              // Trigger pagination to update the number of buttons/pages due to filtering
              this.totalRows = filteredItems.length;
              this.currentPage = 1
            },
            listarPersonas (){
                let me=this;
                var url= '/notas_materia';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    console.log(respuesta,'resp');
                    me.arrayNotas_Materia = respuesta.Notas_Materia.data;
                   // me.totalRows = me.arrayNotas_Materia.length;
                    console.log(me.arrayNotas_Materia,'me.arrayNotas_Materia...');
                    for (let i = 0; i < me.arrayNotas_Materia.length; i++) {
                    if (me.arrayNotas_Materia[i].nota >=51) {
                        const dep = me.arrayNotas_Materia[i].departamento;
                        console.log(dep,'dep');
                        if (dep == 'la paz') {
                            this.lp = this.lp+1;
                        }
                        if (dep == 'pando') {
                            this.pnd = this.pnd+1;
                        }                        
                        if (dep == 'santa cruz') {
                            this.stcz = this.stcz+1;
                        }
                        
                        if (dep == 'beni') {
                            this.bn = this.bn+1;
                        }
                        
                        if (dep == 'potosi') {
                            this.pts = this.pts+1;
                        }
                        
                        if (dep == 'cochabamba') {
                            this.cbba = this.cbba+1;
                        }
                        
                        if (dep == 'tarija') {
                            this.trj = this.trj+1;
                        }                        
                        if (dep == 'sucre') {
                            this.suc = this.suc+1;
                        }
                        if (dep == 'oruro') {
                            this.oru = this.oru+1;
                        }                          
                    }  
                }
                })
                .catch(function (error) {
                    console.log(error);
                });

            },          
           
            verificaAprobados(){
                console.log(this.arrayNotas_Materia,'notas');
                for (let i = 0; i < this.arrayNotas_Materia.length; i++) {
                    if (this.arrayNotas_Materia[i].nota >=51) {
                        const dep = this.arrayNotas_Materia[i].departamento;
                        console.log(dep,'dep');
                    }                
                }
            },

       
        },
        mounted() {            
            this.listarPersonas();    
                    
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }          
</style>
