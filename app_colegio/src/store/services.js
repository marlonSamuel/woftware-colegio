import Axios from 'axios'
import VueCookies from 'vue-cookies'
import store from './index'
import auth from '../auth'
import moment from 'moment'
import { isNullOrUndefined } from 'util';

import LoginService from '../services/LoginService'
import CursoService from '../services/CursoService'
import UsuarioService from '../services/UsuarioService'
import GradoService from '../services/GradoService'
import NivelEducativoService from '../services/NivelEducativoService'
import SeccionService from '../services/SeccionService'
import GradoNivelEducativoService from '../services/GradoNivelEducativoService'
import CicloService from '../services/CicloService'
import ConceptoPagoService from '../services/ConceptoPagoService'
import CuotaService from '../services/CuotaService'
import AlumnoService from '../services/AlumnoService'
import ApoderadoService from '../services/ApoderadoService'
import ApoderadoAlumnoService from '../services/ApoderadoAlumnoService'
import TelefonoApoderadoService from '../services/TelefonoApoderadoService'
import InscripcionService from '../services/InscripcionService'
import MunicipioService from '../services/MunicipioService'
import PagoService from '../services/PagoService'
import PagoParcialService from '../services/PagoParcialService'
import MesService from '../services/MesService'
import SerieFacturaService from '../services/SerieFacturaService'
import RolService from '../services/RolService'
import EmpleadoService from '../services/EmpleadoService'
import CargoService from '../services/CargoService'
import AsignacionSeccionService from '../services/AsignacionSeccionService'
import AsignacionCursoProfesorService from '../services/AsignacionCursoProfesor'
import PeriodoAcademicoService from '../services/PeriodoAcademicoService'
import AsignacionService from '../services/AsignacionService'
import SerieService from '../services/SerieService'
import AsignacionAlumnoService from '../services/AsignacionAlumnoService'
import PreguntaService from '../services/PreguntaService'
import MaterialService from '../services/MaterialService'
import NotaService from '../services/NotaService'
import AlumnoSerieService from '../services/AlumnoSerieService'

let baseUrl = 'http://143.198.156.48/demo-colegio/'
//let baseUrl = 'http://demo-colegio.com/' //base url desarrollo
    //let baseUrl = 'http://143.244.151.1/colegio-san-pablo/' //base url produccion san pablo
let token_data = JSON.parse(localStorage.getItem('token_data'))

// Axios Configuration
Axios.defaults.headers.common.Accept = 'application/json'
if (token_data !== null) {
    Axios.defaults.headers.common.Authorization = `Bearer ${token_data.access_token}`
}

const instance = Axios.create();
Axios.interceptors.response.use(response => {
    return response
}, error => {
    if (error.response.status === 401) {
        var token_data = JSON.parse(localStorage.getItem('token_data'))
        if (isNullOrUndefined(token_data)) { return error }
        var original_request = error.config
        return refreshToken().then(res => {
            auth.saveToken(res.data)
            original_request.headers['Authorization'] = 'Bearer ' + res.data.access_token
            return Axios.request(original_request)
        })
    }

    return error
});

function refreshToken() {
    var data = auth.getRefreshToken()
    return new Promise(function(resolve, reject) {
        instance.post(baseUrl + 'oauth/token', data)
            .then(r => {
                resolve(r)
            }).catch(e => {
                reject(r)
            })
    })
}

instance.interceptors.response.use(response => {
    return response
}, error => {
    if (error.response.status === 401) {
        auth.noAcceso()
    }

    return error
});


export default {
    loginService: new LoginService(Axios, baseUrl),
    cursoService: new CursoService(Axios, baseUrl),
    usuarioService: new UsuarioService(Axios, baseUrl),
    gradoService: new GradoService(Axios, baseUrl),
    nivelEducativoService: new NivelEducativoService(Axios, baseUrl),
    seccionService: new SeccionService(Axios, baseUrl),
    gradoNivelEducativoService: new GradoNivelEducativoService(Axios, baseUrl),
    cicloService: new CicloService(Axios, baseUrl),
    conceptoPagoService: new ConceptoPagoService(Axios, baseUrl),
    cuotaService: new CuotaService(Axios, baseUrl),
    alumnoService: new AlumnoService(Axios, baseUrl),
    apoderadoService: new ApoderadoService(Axios, baseUrl),
    apoderadoAlumnoService: new ApoderadoAlumnoService(Axios, baseUrl),
    telefonoApoderadoService: new TelefonoApoderadoService(Axios, baseUrl),
    inscripcionService: new InscripcionService(Axios, baseUrl),
    municipioService: new MunicipioService(Axios, baseUrl),
    pagoService: new PagoService(Axios, baseUrl),
    pagoParcialService: new PagoParcialService(Axios, baseUrl),
    mesService: new MesService(Axios, baseUrl),
    serieFacturaService: new SerieFacturaService(Axios, baseUrl),
    rolService: new RolService(Axios, baseUrl),
    empleadoService: new EmpleadoService(Axios, baseUrl),
    cargoService: new CargoService(Axios, baseUrl),
    periodoAcademicoService: new PeriodoAcademicoService(Axios, baseUrl),
    asignacionSeccionService: new AsignacionSeccionService(Axios, baseUrl),
    asignacionProfesorService: new AsignacionCursoProfesorService(Axios, baseUrl),
    asignacionService: new AsignacionService(Axios, baseUrl),
    serieService: new SerieService(Axios, baseUrl),
    asignacionAlumnoService: new AsignacionAlumnoService(Axios, baseUrl),
    preguntaService: new PreguntaService(Axios, baseUrl),
    materialService: new MaterialService(Axios, baseUrl),
    notaService: new NotaService(Axios, baseUrl),
    alumnoSerieService: new AlumnoSerieService(Axios, baseUrl)
}