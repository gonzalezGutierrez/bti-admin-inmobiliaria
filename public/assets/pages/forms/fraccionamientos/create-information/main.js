class FraccionamientoCreateInformation {

    constructor(idMunicipio,idEstado) {

        this.selectorEstados    = document.getElementById("selectorEstados");
        this.selectorMunicipios = document.getElementById("selectorMunicipios");
        this.idMunicipio        = idMunicipio;
        this.idEstado           = idEstado;

        this.buildEvents();

        if (this.idMunicipio !== undefined) {
            this.obtenerMunicipios(this.idEstado);
        }

    }

    buildEvents() {

        this.selectorEstados.addEventListener("change",(event) => {
            let idEstado = event.target.value;
            this.obtenerMunicipios(idEstado);
        });
    }

    async obtenerMunicipios (idEstado) {

        let endpoint = 'http://localhost:8000/fraccionamientos/obtener-municipios/'+idEstado;
        let resultado = await axios.get(endpoint);

        this.llenarComboMunicipios(resultado.data);

    }

    llenarComboMunicipios (municipios) {

        $("#selectorMunicipios").empty();

        let  tamArray = municipios.length;
        let option = this.crearElementoOpcion('Selecciona un elemento...','');

        this.selectorMunicipios.add(option);

        for ( let i = 0; i < tamArray; i++ ) {

            let option = this.crearElementoOpcion(municipios[i].nombre,municipios[i].id);
            this.selectorMunicipios.add(option);

        }

    }

    crearElementoOpcion(nombre,valor) {

        let option = document.createElement('option');
        option.text = nombre;
        option.value = valor;

        if (valor == this.idMunicipio) {
            option.selected = true;
        }

        return option;

    }


}
