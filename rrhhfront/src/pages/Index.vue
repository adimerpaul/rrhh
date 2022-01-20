<template>
  <q-page class="q-pa-xs">
<!--    <img-->
<!--      alt="Quasar logo"-->
<!--      src="~assets/quasar-logo-vertical.svg"-->
<!--      style="width: 200px; height: 200px"-->
<!--    >-->
    <div class="row">
      <div class="col-12">
        <q-form @submit="guardar">
          <div class="row">
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.ci" label="ci" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.expedido" label="expedido" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.paterno" label="paterno" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.materno" label="materno" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.nombres" label="nombres" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.fechanac" label="fechanac" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.profesion" label="profesion" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.cargo" label="cargo" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.fechalimite" label="fechalimite" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.foto" label="foto" /></div>
            <div class="col-3"><q-input dense class="q-pa-xs" outlined v-model="persona.qr" label="qr" /></div>
            <div  class="col-3 flex flex-center">
              <q-btn label="crear" icon="add_circle" color="primary" type="submit"/>
            </div>
          </div>
        </q-form>
      </div>
      <div class="col-12">
        <table border="1" style="width: 100%">
          <tr>
            <th>ci</th>
            <th>expedido</th>
            <th>paterno</th>
            <th>materno</th>
            <th>nombres</th>
            <th>fechanac</th>
            <th>profesion</th>
            <th>cargo</th>
            <th>fechalimite</th>
            <th>foto</th>
            <th>qr</th>
          </tr>
          <tr v-for="p in personas" :key="p.id">
            <td>{{p.ci}}</td>
            <td>{{p.expedido}}</td>
            <td>{{p.paterno}}</td>
            <td>{{p.materno}}</td>
            <td>{{p.nombres}}</td>
            <td>{{p.fechanac}}</td>
            <td>{{p.profesion}}</td>
            <td>{{p.cargo}}</td>
            <td>{{p.fechalimite}}</td>
            <td>{{p.foto}}</td>
            <td>{{p.qr}}</td>
          </tr>
        </table>
      </div>
    </div>

  </q-page>
</template>

<script>
export default {
  data(){
    return{
      persona:{},
      personas:[]
    }
  },
  created() {
    this.misdatos()
  },
  methods:{
    misdatos(){
      this.$api.get('http://localhost:8000/api/persona').then(res=>{
        this.personas=res.data
      })
    },
    guardar(){
      // console.log(this.persona)
      this.$api.post('http://localhost:8000/api/persona',this.persona).then(res=>{
        this.persona={}
        // console.log(res.data)
        this.misdatos()
      })
    }
  }
}
</script>
