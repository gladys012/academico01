    @extends('principal')
    @section('contenido')
    
    @if(Auth::check())
        @if(Auth::user()->idrol == 1)
        <!--template v-if="menu==0">
           <example-component></example-component>
        </template-->       
        <template v-if="menu==0">
                <notas_materia></notas_materia>
        </template>
        <template v-if="menu==30">
                <personas></personas>
        </template>
        <template v-if="menu==40">
                <rol></rol>
        </template>
        <template v-if="menu==41">
                <user></user>
        </template>           
        @elseif(Auth::user()->idrol == 2)
        <template v-if="menu==0">
                <example-component></example-component>
        </template>
        <template v-if="menu==26">
                <trazas_aa></trazas_aa>
        </template>
        <template v-if="menu==30">
                <personas></personas>
        </template>                   
        @endif    
      @endif

        
    @endsection